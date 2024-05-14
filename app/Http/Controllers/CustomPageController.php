<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    public function showContactRequests()
    {

        $requests = ContactRequest::all();

        return view('twill.contacts', ['requests' => $requests]);
    }
}
