<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    // Ensure user logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

     // Display all messages if the authenticaed user is an Admin
     public function index()
     {
         if (auth()->check() && auth()->user()->is_admin == 1) {
             $arr['contacts'] = ContactUs::orderBy('created_at', 'asc')->paginate(3);
             return view('contactUs.index')->with($arr);
         } else {
             return abort(403);
         }
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('contactUs.create');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request, ContactUs $contact)
     {
         //Validate the inputs
         $request->validate([
 
             'message' => ['required', 'max:500'],
 
         ]);
 
         $contact->user_id = auth()->user()->id;
         $contact->firstName = auth()->user()->firstName;
         $contact->surname = auth()->user()->surname;
         $contact->email = auth()->user()->email;
         $contact->message = $request->message;
 
         $contact->save();
 
         return back()->with('success', 'Thank you for your message!');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         return view('contactUs.show', ['contacts' => ContactUs::findOrFail($id)]);
     }
 
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         ContactUs::destroy($id);
         return redirect()->back()->with('success', 'Message successfully deleted!');
     }

}
