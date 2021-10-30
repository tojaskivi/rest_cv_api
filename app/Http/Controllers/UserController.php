<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // the token is required and has to be confirmed
        $fields = $request->validate([
            'token' => 'required|confirmed'
        ]);


        // add the user to the db
        $user = User::create([
            'token' => bcrypt($fields['token'])
        ]);

        // create a token
        $token = $user->createToken('myapptoken')->plainTextToken;

        // return response
        $response = [
            'token' => $token,
        ];

        // return the response and status 201 - Created
        return response($response, 201);
    }

    public function logout()
    {
        // destroy the token
        auth()->user()->tokens()->delete();

        return [
            'message' => "You've been logged out!"
        ];
    }

    public function login(Request $request)
    {
        // make sure that the input is there and is a string
        $fields = $request->validate([
            'token' => 'required|string'
        ]);

        $result = User::all();

        foreach ($result as $token) {
            if (Hash::check($fields['token'], $token['token'])) {

                // create token and return it
                $user = User::where('id', $token['id'])->first();
                $token = $user->createToken('myapptoken')->plainTextToken;

                $response = [
                    'token' => $token
                ];

                // return the response and status 200 - ok
                return response($response, 200);
            }
        }
        return response([
            'message' => 'Invalid credits'
        ], 401);
    }

    /* request used during testing
    public function testRequest(Request $request)
    {
        return response($request, 418);
    }
    */
}
