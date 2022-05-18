<?php

use Illuminate\Support\Facades\Route;

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

# redirect automatically on the open domain 

Route::resources(['events' => EventController::class]);

Route::get('/', function(){
    return redirect('open.'.env('APP_URL'));
});

# Default domain route for all common user operations
Route::domain('open.'.env('APP_URL'))->group(function(){
    # default url index
    Route::get('/', [CustomerFrontOffice::class,'index'])->name('open.index');
    Route::post('/fetch', [CustomerFrontOffice::class,'fetch'])->name('open.fetch');
    Route::get('/event/{event_ulid}', [CustomerFrontOffice::class,'show_event'])->name('open.show_event');

    Route::get('/contact', [CustomerFrontOffice::class,'contact'])->name('open.contact');
    Route::get('/faq', [CustomerFrontOffice::class,'faq'])->name('open.faq');

    Route::get('/login', [CustomerFrontOffice::class,'login'])->name('open.login');
    Route::get('/register', [CustomerFrontOffice::class,'register'])->name('open.register');
    
    # all other authenticate route for user
    // Route::middleware('authenticate_user')->group(function () {
       Route::get('/dashboard', [CustomerFrontOffice::class,'dashboard'])->name('open.dashboard');
       Route::get('/my_events', [CustomerFrontOffice::class,'my_event'])->name('open.my_event');
       Route::get('/my_profile', [CustomerFrontOffice::class,'my_profile'])->name('open.my_profile');
       Route::post('/my_profile', [CustomerFrontOffice::class,'post_my_profile'])->name('open.post_my_profile');
       Route::get('/events/{event_ulid}/detail', [CustomerFrontOffice::class,'my_event_detail'])->name('open.my_event_detail');
       Route::get('/my_tickets', [CustomerFrontOffice::class,'my_tickets'])->name('open.my_tickets');
       Route::get('/tickects/{ticket_ulid}/detail', [CustomerFrontOffice::class,'my_ticket_detail'])->name('open.my_ticket_detail');
    // });
});

# Route for administration operations
Route::domain('owners.' . env('APP_URL'))->group(function () {
    # default url index, for admin user there is not register page
    Route::get('/login', function(){
        echo 'Login Admin';
    })->name('owner.login');

    # all other authenticate route for owner
    // Route::middleware('authenticate_owner')->group(function () {
    //    Route::get('/dashboard', 'OwnerDashboardController@index')->name('owner.dashboard');
    // });
});

# Route for all event organizer operations
Route::domain('event_organizer.' . env('APP_URL'))->group(function () {
    Route::get('/', [OrganizerFrontOffice::class,'index'])->name('organizer.index');
    Route::get('/login', [OrganizerFrontOffice::class,'login'])->name('organizer.login');
    Route::get('/register', [OrganizerFrontOffice::class,'register'])->name('organizer.register');
    
    # all other authenticate route for event_organizer
    // Route::middleware('authenticate_organizer')->group(function () {
        Route::get('/events/create', [OrganizerFrontOffice::class,'my_event'])->name('organizer.event_create');
        Route::get('/my_events/{event_ulid}/update', [OrganizerFrontOffice::class,'my_event'])->name('organizer.event_update');
        Route::get('/events/update', [OrganizerFrontOffice::class,'my_event'])->name('organizer.event_update');
        Route::get('/my_events', [OrganizerFrontOffice::class,'my_event'])->name('organizer.my_event');
        Route::get('/my_profile', [OrganizerFrontOffice::class,'my_profile'])->name('organizer.my_profile');
        Route::post('/my_profile', [OrganizerFrontOffice::class,'post_my_profile'])->name('organizer.post_my_profile');
        Route::get('/events/{event_ulid}/detail', [OrganizerFrontOffice::class,'my_event_detail'])->name('organizer.my_event_detail');
        Route::get('/my_tickets', [OrganizerFrontOffice::class,'my_tickets'])->name('organizer.my_tickets');
        Route::get('/tickects/{ticket_ulid}/detail', [OrganizerFrontOffice::class,'my_ticket_detail'])->name('organizer.my_ticket_detail');
    // });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');








Route::resource('orderStatuses', App\Http\Controllers\OrderStatusController::class);


Route::resource('eventCategories', App\Http\Controllers\EventCategoryController::class);


Route::resource('ticketStatuses', App\Http\Controllers\TicketStatusController::class);


Route::resource('reservedTickets', App\Http\Controllers\ReservedTicketController::class);


Route::resource('accounts', App\Http\Controllers\AccountController::class);


Route::resource('admins', App\Http\Controllers\AdminController::class);


Route::resource('organisers', App\Http\Controllers\OrganiserController::class);


Route::resource('events', App\Http\Controllers\EventController::class);
