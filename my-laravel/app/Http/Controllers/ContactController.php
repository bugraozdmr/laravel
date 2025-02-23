<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index() {

        return view('contact');
    }

    function handlesubmit(ContactStoreRequest $request) {
        // dd($request->all());
        // dd(request());

        /**bu kullanımda dogru
        $request = request();
        $request->name
         */
        // echo $request->name;
    
        /*$request->validate([
            //'name' => 'required|max:20|min:2',
            'name' => ['required','max:20','min:2'],
            'email' => 'required|max:30|min:2',
        ],
    [
        'name.required' => 'WTF MAN fill this fucking area',
        'name.max' => 'What are you !?'
        ]);*/

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        
        $contact->save();

        dd('success');
    }
}
