<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{



    // Show all users - only if admin
    public function index()
    {

       // $users = User::all();
       // return view ('users.index')->with('users', $users);

        if (auth()->check() && auth()->user()->is_admin == 1) {
            $users = User::where('id', '>', 0)
                ->orderBy('created_at', 'ASC')->paginate(3);;
            return view('users.index', compact('users'));
        } else {
            return abort(403);
        }
    }

    // Show single user - only if the authenticated user
    public function show($id)
    {

        if ($id != auth()->id()) {
            abort(403);
        }
        return view('users.show', ['users' => User::findOrFail($id)]);
    }

    // Edit user profiles details
    public function edit(User $user)
    {

        if ($user->id != auth()->id()) {
            abort(403);
        }

        $arr['users'] = $user;
        return view('users.edit')->with($arr);
    }

    // Update user profile details
    public function update(Request $request, User $user)
    {

        //dd($request);

        // Only update details if field is not empty
        if (!empty($request->hasFile('image'))) {

            $user->image = (request('image')->store('uploads', 'public'));

            $image = Image::make(public_path("storage/{$user->image}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }
        if (!empty($request->input('firstName'))) {
            $user->firstName = $request->firstName;
        }
        if (!empty($request->input('surname'))) {
            $user->surname = $request->surname;
        }
       
        if (!empty($request->input('town'))) {
            $user->town = $request->town;
        }
        if (!empty($request->input('postCode'))) {
            $user->postCode = $request->postCode;
        }

        $user->save();

       // dd($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Profile successfully updated!!');
    }

    // Store the user's details
    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image' => ['required', 'image'],
            'firstName' => ['required'],
            'surname' => ['required'],
                        

        ]);

        $imagePath = (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
        $image->save();

        $user->image = $imagePath;
        $user->firstName = $request->firstName;
        $user->surname = $request->surname;
      
        $user->save();
        return redirect()->route('users.show', $user->id)->with('success', 'Profile successfully registered');;
    }

    // Delete user profile
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('welcome')->with('success', 'Profile successfully deleted');
    }
}
