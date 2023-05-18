<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateMessage;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PrivateMessageController extends Controller
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

        if (auth()->check() && auth()->user()->is_admin == 1) {
            $arr['messages'] = PrivateMessage::orderBy('created_at', 'asc')->paginate(10);
            return view('privateMessage.index')->with($arr);
            // dd($arr);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PrivateMessage $pm)
    {
        //Validate the inputs
        $request->validate([

            'user_id' => ['required'],
            'ToUser_id' => ['required'],
            'firstName' => ['required'],
            'report_id' => ['required'],
            'ToUser_firstName' => ['required'],
            'message' => ['required', 'max:500'],

        ]);

        //dd($request);

        // $pm->user_id = auth()->user()->id;
        $pm->user_id = auth()->user()->id;
        $pm->ToUser_id = $request->input('ToUser_id');
        $pm->report_id = $request->input('report_id');
        $pm->firstName = auth()->user()->firstName;
        $pm->ToUser_firstName = $request->input('ToUser_firstName');
        $pm->message = $request->message;

        $pm->save();

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

        $message = PrivateMessage::findOrFail($id);

        $user = $message->user_id;



        $images = DB::table('users')
            ->join('private_messages', 'users.id', '=', 'private_messages.user_id')
            ->where('users.id', $user)
            ->select('private_messages.*', 'users.id as users_id ')
            ->first();

        // dd($images);

        $messages = User::select('users.*')->selectSub(
            PrivateMessage::selectRaw('MAX(created_at)')->whereRaw('user_id = users.id'),
            'latest_message'
        )->orderBy('latest_message', 'desc')
            ->get();

        // dd($messages);

        $privmessages = PrivateMessage::where('ToUser_id', auth()->user()->id)
            ->paginate(3);


        // dd($privmessages);



        /*
         $messages = DB::table('private_messages')
            ->where('ToUser_id', auth()->user()->id)
            ->groupBy('user_id')->paginate(5);
            
     $messages = PrivateMessage::orderBy('id', 'DESC')
            ->where('ToUser_id', auth()->user()->id)
            ->distinct('user_id')->paginate(3);

              $messages = DB::table('private_messages')
            ->where('ToUser_id', auth()->user()->id)
            ->distinct()->get();
       
        $messages = PrivateMessage::where('ToUser_id', auth()->user()->id)
            ->select(['user_id', 'ToUser_id'])
            ->selectRaw('MAX(created_at) AS last_date')
            ->groupBy(['user_id', 'ToUser_id'])
            ->orderBy('last_date', 'DESC')
            ->paginate(3);
*/

        //dd($messages);
        //  $messages->setCollection($messages->groupBy('user_id'));;
        //dd($messages);

        // dd($images);

        return view('privateMessage.show', [
            'messages' => $messages,
            'images' => $images,
            'privmessages' => $privmessages,

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
        PrivateMessage::destroy($id);
        return redirect()->back()->with('success', 'Private Message successfully deleted!!');
    }
}
