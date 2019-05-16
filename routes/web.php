<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
 * Misc "static" pages
 */
Route::view('/', 'welcome');
Route::view('/login', 'login');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

/*
 * Wine forms
 */
Route::get('/wine/create', 'WineController@create');
Route::get('/wine/edit', 'WineController@edit');
Route::post('/wine/process', 'WineController@searchProcess');
Route::get('/wine/show', 'WineController@show');
Route::get('/wine/store', 'WineController@store');

# Show the search form
Route::get('/wine/search', 'WineController@search');


Route::get('/wine', 'WineController@index');

# Update functionality
# Show the form to edit a specific book
Route::get('/wines/{id}/edit', 'WineController@edit');

# Process the form to edit a specific book
Route::put('/wines/{id}', 'WineController@update');

# DELETE
# Show the page to confirm deletion of a book
Route::get('/wines/{id}/delete', 'WineController@delete');

# Process the deletion of a book
Route::delete('/wines/{id}', 'WineController@destroy');


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

