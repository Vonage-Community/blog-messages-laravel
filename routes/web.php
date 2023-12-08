<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Vonage\Client\Credentials\Keypair;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/message', static function() {
    return view('message');
});

Route::post('/message', static function(Request $request) {
    $number = $request->input('number');
    $fromNumber = config('vonage.from_number');
    $text = 'Hello from Vonage and Laravel :) Please reply to this message with a number between 1 and 100';
    $message = new Vonage\Messages\Channel\WhatsApp\WhatsAppText($number, $fromNumber, $text);

    $credentials = new Keypair(file_get_contents(config('vonage.private_key_path')), config('vonage.application_id'));
    $client = new Vonage\Client($credentials);
    $client->messages()->getAPIResource()->setBaseUrl('https://messages-sandbox.nexmo.com/v1/messages');
    $client->messages()->send($message);

    return view('thanks');
});

Route::post('/webhooks/status', static function(Request $request) {
    // if you need to do something with a status it goes here
});

Route::post('/webhooks/inbound', static function(Request $request) {
    $data = $request->all();
    $number = (int)$data['text'];

    if ($number > 0) {
        $randomNumber = random_int(1, 8);
        $respondNumber = $number * $randomNumber;
        $toNumber = $data['from'];
        $fromNumber = config('vonage.from_number');
        $text = "The answer is " . $respondNumber . ", we multiplied by " . $randomNumber . ".";
        $message = new Vonage\Messages\Channel\WhatsApp\WhatsAppText($toNumber, $fromNumber, $text);

        $credentials = new Keypair(file_get_contents(config('vonage.private_key_path')), config('vonage.application_id'));
        $client = new Vonage\Client($credentials);
        $client->messages()->getAPIResource()->setBaseUrl('https://messages-sandbox.nexmo.com/v1/messages');
        $client->messages()->send($message);
    }
});
