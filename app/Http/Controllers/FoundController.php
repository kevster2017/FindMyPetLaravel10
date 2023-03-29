<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\Found;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class FoundController extends Controller
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



    public function foundDogsIndex()
    {


        $foundDogs = Found::where('petType', 'Dog')
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);


        return view('found/dogs.foundDogsIndex', [
            'foundDogs' => $foundDogs,

        ]);
    }

    // Show all found cats
    public function foundCatsIndex()
    {


        $foundCats = Found::where('petType', 'Cat')
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);

        // dd($foundCats);

        return view('found/cats.foundCatsIndex', [
            'foundCats' => $foundCats,

        ]);
    }

    public function foundPetsIndex()
    {


        $foundPets = Found::where('petType', 'Other')
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);

        // dd($foundCats);

        return view('found/otherPets.foundPetsIndex', [
            'foundPets' => $foundPets,

        ]);
    }

    public function index()
    {
        $foundPets = Found::where('id', '>', 0)
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);

        return view('found.index', [
            'foundPets' => $foundPets,

        ]);
    }

    public function myFoundIndex()
    {
        $foundPets = Found::where('id', '>', 0)
            ->where('reunited', 0)
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')->paginate(3);

        // dd($foundPets);

        return view('found/myFound.index', [
            'foundPets' => $foundPets,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('found.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Found $found)
    {
        $validatedData = $request->validate([

            'user_id' => 'required',
            'firstName' => 'required',
            'petName' => 'nullable',
            'petType' => 'required',
            'petAge' => 'nullable',
            'town' => 'required',
            'postCode' => 'required', 'min:3', 'max:4',
            'chipNum' => 'nullable',
            'description' => 'required',
            'img1' => 'required|mimes:jpg,jpeg,png,gif',
            'img2' => 'nullable|mimes:jpg,jpeg,png,gif',
            'img3' => 'nullable|mimes:jpg,jpeg,png,gif',
            'reunited' => 'required'

        ]);



        $imagePath = (request('img1')->store('images', 'public'));
        $imagePath2 = null;
        $imagePath3 = null;

        if ($request->hasFile('img1') == null) {
            $imagePath = "/uploads/profileImage.jpg
";
        } else {
            $imagePath = $request->file('img1')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }

        if ($request->hasFile('img2') == null) {
            $imagePath2 = "/uploads/profileImage.jpg
";
        } else {
            $imagePath2 = $request->file('img2')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }

        if ($request->hasFile('img3') == null) {
            $imagePath3 = "/uploads/profileImage.jpg
";
        } else {
            $imagePath3 = $request->file('img3')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }




        $found->user_id = auth()->user()->id;
        $found->firstName = auth()->user()->firstName;
        $found->surname = auth()->user()->surname;
        $found->petName = $request->petName;
        $found->petType = $request->petType;
        $found->petAge = $request->petAge;
        $found->description = $request->description;
        $found->town = $request->town;
        $found->postCode = $request->postCode;
        $found->chipNum = $request->chipNum;

        $found->img1 = $imagePath;
        $found->img2 = $imagePath2;
        $found->img3 = $imagePath3;

        $found->reunited = $request->reunited;



        $found->save();

        // dd($found);

        //return redirect()->route('found.show', $found->id)->with('success', 'Found Pet Successfully Uploaded!!');

        return redirect()->route('welcome')->with('success', 'Found Pet Successfully Uploaded!!');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        $found = Found::findOrFail($id);

        $chip = $found->chipNum;

        $founds = DB::table('missings')
            ->join('founds', 'missings.chipNum', '=', 'founds.chipNum')
            ->where('missings.chipNum', $chip)
            ->select('founds.*', 'missings.id as missings_id')
            ->get();


        return view('found.show', [
            'found' => $found,
            'founds' => $founds,


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

        $found = Found::find($id);

        $arr['found'] = $found;
        return view('found.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Found $found)
    {

        if (!empty($request->input('petType'))) {
            $found->petType = $request->petType;
        }
        if (!empty($request->input('description'))) {
            $found->description = $request->description;
        }
        if (!empty($request->input('town'))) {
            $found->town = $request->town;
        }
        if (!empty($request->input('postCode'))) {
            $found->postCode = $request->postCode;
        }
        if (!empty($request->input('chipNum'))) {
            $found->chipNum = $request->chipNum;
        }
        if (!empty($request->input('reunited'))) {
            $found->reunited = $request->reunited;
        }



        if (!empty($request->hasFile('img1'))) {

            $found->img1 = (request('img1')->store('uploads', 'public'));
            $image = Image::make(public_path("storage/{$found->img1}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }
        if (!empty($request->hasFile('img2'))) {

            $found->img2 = (request('img2')->store('uploads', 'public'));
            $image = Image::make(public_path("storage/{$found->img2}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }
        if (!empty($request->hasFile('img3'))) {

            $found->img3 = (request('img3')->store('uploads', 'public'));
            $image = Image::make(public_path("storage/{$found->img3}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }

        //dd($found);
        $found->save();
        return redirect()->route('found.show', $found->id)->with('success', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Found::destroy($id);
        return redirect()->route('welcome')->with('success', 'Found Profile successfully deleted!!');
    }
}
