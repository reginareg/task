<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignUp;

class MailController extends Controller
{
    public function sendMail() {
        $name = 'bob';
        Mail::to('regina.bogde@gmail.com')->send(new SignUp());
        return view ('welcome');
    }
}
