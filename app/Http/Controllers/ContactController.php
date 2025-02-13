<?php

namespace App\Http\Controllers;

use A17\Twill\Models\Block;
use App\Mail\ContactFormRequest;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{

    /**
     * 
     */
    public function submitContactForm(Request $request)
    {

        // Define rate limiting parameters
        $key = 'send-contact-request:' . $request->ip(); // You may want to use a unique identifier for each user
        $maxAttempts = 3; // Maximum number of attempts allowed
        $decayMinutes = 1; // Time period for rate limiting (in minutes)

        // Check if the user has exceeded the rate limit
        if (RateLimiter::tooManyAttempts($key, $maxAttempts, $decayMinutes)) {

            $seconds = RateLimiter::availableIn($key);

            return response()->json(['message' => 'Too many requests. You may try again in ' . $seconds . ' seconds.'], 429);
        }

        // Increment the attempt counter
        RateLimiter::increment($key);

        // Validate the request data
        $request->validate([
            'privacy-disclaimer' => ['accepted'], // Ensure privacy-disclaimer checkbox is checked
        ], [
            'privacy-disclaimer.accepted' => 'Please agree to the privacy disclaimer before submitting.'
        ]);

        $block = Block::findOrfail($request->block_id);

        $mail_settings = [
            "to" => $block->input("to"),
            "subject" => $block->translatedInput("subject"),
            "success_message" => $block->translatedInput("success_message"),
            "privacy_disclaimer" => $block->translatedInput("privacy_disclaimer"),
        ];


        $fields = $block->children->where('type', 'fields');

        $form_data = $this->removeKeyValuePair($request->all(), ['_token', 'block_id']);

        // Save the contact request to database
        $contactRequest = ContactRequest::create([
            'to' =>  $mail_settings["to"],
            'subject' =>  $mail_settings["subject"],
            'success_message' =>  $mail_settings["success_message"],
            'privacy_disclaimer' =>  $mail_settings["privacy_disclaimer"],
            'form_data' => $form_data,
            'contact_block_id' => $request->block_id,
        ]);

        Mail::to($mail_settings['to'])->send(new ContactFormRequest($mail_settings, $form_data));

        return ['message' => $mail_settings["success_message"]];
    }

    /**
     * 
     */
    function removeKeyValuePair($myArray, $keysToRemove)
    {

        $modifiedArray = array_filter($myArray, function ($key) use ($keysToRemove) {
            return !in_array($key, $keysToRemove);
        }, ARRAY_FILTER_USE_KEY);

        return  $modifiedArray;
    }
}
