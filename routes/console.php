<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Database\Eloquent\Builder;
use App\Company;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('contact:company-clean', function () {
    $this->info('cleaning');
    Company::whereDoesntHave('customers')
        ->get() 
        ->each( function($company){
            $company->delete();
            $this->warn("Delete: ". $company->name);
    }) ;
    
})->describe('Clean Up unused Companies');

