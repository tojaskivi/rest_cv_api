<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // search function
    public function search($searchTerm)
    {
        $result = [];

        // gets all the search results from each controller
        $result['courses'] = (new CoursesController)->search($searchTerm);
        $result['jobs'] = (new JobsController)->search($searchTerm);
        $result['websites'] = (new WebsitesController)->search($searchTerm);
        return $result;
    }

    public function sanitize($haystack)
    {
        // replaces every " with ', so it doesn't break the JavaScript of the client
        foreach ($haystack as $key => $string) {
            $string = str_replace('"', "'", $string);
            $string = htmlspecialchars($string);
            $haystack[$key] = $string;
        }
        return $haystack;
    }

    public function dateCheck($request)
    {
        // test if startDate is larger than endDate
        if (strtotime($request->startDate) > strtotime($request->endDate)) {
            return 1;
        }
        return 0;
    }
}
