<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletterService;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{

    public function __invoke(NewsletterService $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);
        try{
            $newsletter->subscribe(request()->input('email'));
        }catch (\Exception $e){
            throw ValidationException::withMessages(
                ['email' => "this email cann't be added to our newsletter as contact email"]
            );
        }
        return redirect('/posts')->with('messege','your subscribe to newsletter in succesfully done');

    }

}
