<?php

namespace App\Http\Controllers;

use App\Models\MsgReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Messages;

class MsgReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = MsgReply::orderBy('id', 'DESC')
            ->paginate(3);

        //  $message = DB::table('msgreplys')
        //  ->where()

        return view('msgreply.index', compact('messages'));
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
    public function store(Request $request, MsgReply $pm)
    {
        //Validate the inputs
        $request->validate([

            'FromUser_id' => ['required'],
            'message_id' => ['required'],
            'ToUser_id' => ['required'],
            'firstName' => ['required'],
            'ToUser_firstName' => ['required'],
            'report_id' => ['required'],
            'message' => ['required', 'max:500'],

        ]);

        //dd($request);

        // $pm->user_id = auth()->user()->id;
        $pm->FromUser_id = auth()->user()->id;
        $pm->message_id = $request->input('message_id');
        $pm->ToUser_id = $request->input('ToUser_id');
        $pm->report_id = $request->input('report_id');
        $pm->ToUser_firstName = $request->input('ToUser_firstName');
        $pm->firstName = auth()->user()->firstName;
        $pm->message = $request->message;


        $pm->save();

        //dd($pm);
        return back()->with('success', 'Message Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MsgReply  $msgReply
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*
        $id = DB::table('messages')->get();

        $messages = MsgReply::orderBy('id', 'DESC')
            ->where('message_id', $id)
            ->paginate(3);
*/
        $message = MsgReply::findOrFail($id);

        $msgid = $message->message_id;

        $messages = DB::table('messages')
            ->join('msgreplys', 'messages.id', '=', 'msgreplys.message_id')
            ->where('messages.id', $msgid)
            ->select('msgreplys.*', 'messages.id as messages_id')
            ->paginate(3);



        return view('msgreply.show', [
            'messages' => $messages,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MsgReply  $msgReply
     * @return \Illuminate\Http\Response
     */
    public function edit(MsgReply $msgReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MsgReply  $msgReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MsgReply $msgReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MsgReply  $msgReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(MsgReply $msgReply)
    {
        //
    }
}
