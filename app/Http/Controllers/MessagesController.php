<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;
use App\Models\MsgReply;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Ensure user logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display all messages if the authenticaed user is an Admin
    public function index()
    {

        $messages = Messages::orderBy('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->paginate(3);

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Messages $message)
    {
        //Validate the inputs

        //dd($request);
        $request->validate([

            'user_id' => ['required'],
            'ToUser_id' => ['required'],
            'firstName' => ['required'],
            'report_id' => ['required'],
            'ToUser_firstName' => ['required'],
            'message' => ['required', 'max:500'],


        ]);



        // $message->user_id = auth()->user()->id;
        $message->user_id = auth()->user()->id;
        $message->ToUser_id = $request->input('ToUser_id');
        $message->report_id = $request->input('report_id');
        $message->firstName = auth()->user()->firstName;
        $message->ToUser_firstName = $request->input('ToUser_firstName');
        $message->message = $request->message;

        $message->save();

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

        $messages = Messages::orderBy('id', 'DESC')
            ->where('report_id', $id)
            ->paginate(3);

        $return = Messages::orderBy('id', 'DESC')
            ->where('report_id', $id)
            ->first();

        //dd($return);


        return view('messages.show', [
            'messages' => $messages,
            'return' => $return


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Messages::destroy($id);
        return redirect()->back()->with('success', 'Message successfully deleted!');
    }
}
