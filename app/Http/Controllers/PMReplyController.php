<?php

namespace App\Http\Controllers;

use App\Models\PMReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PMReplyController extends Controller
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


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PMReply $pm)
    {
        //Validate the inputs
        $request->validate([

            'FromUser_id' => ['required'],
            'private_message_id' => ['required'],
            'ToUser_id' => ['required'],
            'firstName' => ['required'],
            'ToUser_firstName' => ['required'],
            'report_id' => ['required'],
            'message' => ['required', 'max:500'],

        ]);

        //dd($request);

        // $pm->user_id = auth()->user()->id;
        $pm->FromUser_id = auth()->user()->id;
        $pm->private_message_id = $request->input('private_message_id');
        $pm->ToUser_id = $request->input('ToUser_id');
        $pm->report_id = $request->input('report_id');
        $pm->firstName = auth()->user()->firstName;
        $pm->ToUser_firstName = $request->input('ToUser_firstName');
        $pm->message = $request->message;

        // dd($pm);
        $pm->save();

        return back()->with('success', 'Thank you for your message!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PMReply  $pMReply
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*
        $id = auth()->user()->id;

        $messages = PMReply::orderBy('created_at', 'asc')
            ->where('ToUser_ID', $id)
            //->get();
            ->paginate(3);
        //dd($messages);
        */

        $message = PMReply::findOrFail($id);

        dd($message);

        $msgid = $message->private_message_id;

        $messages = DB::table('private_messages')
            ->join('pmreplys', 'private_messages.id', '=', 'pmreplys.private_message_id')
            ->where('private_messages.id', $msgid)
            ->select('pmreplys.*', 'private_messages.id as private_messages_id')
            ->paginate(3);



        return view('PMReply.show', [
            'messages' => $messages,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PMReply  $pMReply
     * @return \Illuminate\Http\Response
     */
    public function edit(PMReply $pMReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PMReply  $pMReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PMReply $pMReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PMReply  $pMReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(PMReply $pMReply)
    {
        //
    }
}
