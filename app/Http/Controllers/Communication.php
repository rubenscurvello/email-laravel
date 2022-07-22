<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;
use App\Events\SendEmailEvent;
class Communication extends Controller
{
    //
    public function send(SendEmailRequest $request){
        event(new SendEmailEvent($request->input('to'), $request->input('subject'), $request->input('body')));
        return response()->json('E-mail enviado com sucesso', 202);
    }
}
