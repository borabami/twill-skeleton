<?php

namespace App\Http\Controllers;

use A17\Twill\Models\Block;
use App\Mail\ContactFormRequest;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    /**
     * 
     */
    public function submitContactForm(Request $request)
    {

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

        Bus::chain([
            Mail::to($mail_settings['to'])->send(new ContactFormRequest($mail_settings, $form_data)),

        ]);


        return ['message'=> $mail_settings["success_message"]];
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
