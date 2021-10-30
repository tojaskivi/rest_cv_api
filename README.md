# CV med REST API

Skapa ett nytt projekt med composer; `composer create-project laravel/laravel api`

Sedan skapas en ny användare och databas i MariaDB. Den skapade användaren ges rättigheter för den skapade databasen och i Laravels inställningar läggs användaren till i .env-filen.

Tre modeller (tabeller i databasen) skapas med kommandot `php artisan make:model [modellnamn] --migration`. Modellerna som skapades är Courses, Jobs och Websites. Under database/migrations/ definieras det vilka kolumner som ska finnas i vardera tabell. För att sedan faktiskt skapa tabellerna körs kommandot `php artisan migrate`.

Controllers skapas för samtliga modeller med följande kommando. `php artisan make:controller [modellnamn]Controller --api`. Genom att lägga till `--api` genereras även skelett för metoder för CRUD i varje controller. Dessa metoder måste sedan fyllas på med funktionalitet.

Under app/Models ska det fyllas i vilka kolumner som värden ska få läggas till i.
```php
     // Kolumner som en användare kan fylla i
     // Detta är för courses
     protected $fillable = [
         'name',
         'school',
         'startDate',
         'endDate'
     ];
}
```

I routes/api.php definieras endpoints, som är sökvägen för att nå APIt.

För autentisering används Sanctum, och det installeras med kommandot `composer require laravel/sanctum` följt av `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`