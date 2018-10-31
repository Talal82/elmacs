<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Toastr;
use Session;
use Mail;
use Validator;

class EmailController extends Controller
{
    public function contact(Request $request){

    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',  
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $data = array(
        	'name' => $request -> name,
        	'email' => $request -> email,
        	'phone' => $request -> phone,
        	'bodyMessage' => $request -> subject,
        );
    	
    	$token = $request -> input('g-recaptcha-response');

    	if(strlen($token) > 0){
    		Mail::send('emails.contact', $data, function($message) use ($data){
    			$message -> from($data['email']);
    			$message -> to('admin@gmail.com');
    			$message -> subject('Client contact email from Elmacs CO. LLC');
    		});

    		Session::flash('success', 'Your Email has been successfully sent. We will contact you soon.');
    		return redirect() -> back();
    	}
    	else{
    		Session::flash('error', 'Verify that you are not a robot');
    		return;
    	}
    }

    public function inquiry(Request $request){

    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',  
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'residence' => 'sometimes',
            'nationality' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $data = array(
        	'name' => $request -> name,
        	'email' => $request -> email,
        	'phone' => $request -> phone,
        	'subject' => $request -> subject,
        	'residence' => $request -> residence,
        	'nationality' => $request -> nationality,
        	'bodyMessage' => $request -> message,
        );
    	
    	$token = $request -> input('g-recaptcha-response');

    	if(strlen($token) > 0){
    		Mail::send('emails.inquiry', $data, function($message) use ($data){
    			$message -> from($data['email']);
    			$message -> to('admin@gmail.com');
    			$message -> subject($data['subject']);
    		});

    		Session::flash('success', 'Your Email has been successfully sent. We will contact you soon.');
    		return redirect() -> route('inquiry');
    	}
    	else{
    		Session::flash('error', 'Verify that you are not a robot');
    		return redirect() -> back();
    	}
    }

    public function apply(Request $request){

    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',  
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'company' => 'required|max:255',
            'address' => 'required|max:255',
            'nationality' => 'required',
            'cv' => 'required|mimes:jpeg,pdf',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect() -> back()
            ->withErrors($validator)
            ->withInput();
        }

        $data = array(
        	'job_title' => $request -> job_title,
        	'name' => $request -> name,
        	'email' => $request -> email,
        	'phone' => $request -> phone,
        	'company' => $request -> company,
        	'address' => $request -> address,
        	'nationality' => $request -> nationality,
        	'cv' => $request -> cv,
        	'bodyMessage' => $request -> message,
        );
    	
    	$token = $request -> input('g-recaptcha-response');

    	if(strlen($token) > 0){
    		Mail::send('emails.apply', $data, function($message) use ($data){
    			$message -> from($data['email']);
    			$message -> to('admin@gmail.com');
    			$message -> subject('Job Application from Elmacs CO. LLC');
    			$message -> attach($data['cv']->getRealPath(),
                [
                    'as' => $data['cv']->getClientOriginalName(),
                    'mime' => $data['cv']->getClientMimeType(),
                ]);
    		});

    		Session::flash('success', 'Your Email has been successfully sent. We will contact you soon.');
    		return redirect() -> back();
    	}
    	else{
    		Session::flash('error', 'Verify that you are not a robot');
    		return redirect() -> back();
    	}
    }
}
