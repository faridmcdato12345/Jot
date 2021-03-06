<?php

namespace App\Http\Controllers;
use App\Http\Resources\Contact;
use Illuminate\Http\Request;

class ContactsBirthday extends Controller
{
    public function index(){
        $contacts=request()->user()->contacts()->birthday()->get();
        return Contact::collection($contacts);
    }
}
