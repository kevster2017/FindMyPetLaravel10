<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;
use App\Models\Found;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class MissingController extends Controller
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


    public function missingDogsIndex()
    {


        $missingDogs = Missing::where('petType', 'Dog')
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);

        // dd($missingCats);

        return view('missing/dogs.missingDogsIndex', [
            'missingDogs' => $missingDogs,

        ]);
    }

    // Show all missing cats
    public function missingCatsIndex()
    {


        $missingCats = Missing::where('petType', 'Cat')
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);

        // dd($missingCats);

        return view('missing/cats.missingCatsIndex', [
            'missingCats' => $missingCats,

        ]);
    }

    public function missingPetsIndex()
    {


        $missingPets = Missing::where('petType', 'Other')
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(3);

        return view('missing/otherPets.missingPetsIndex', [
            'missingPets' => $missingPets,

        ]);
    }

    /* All Missing Pets Index */

    public function index()
    {
        $missingPets = Missing::where('id', '>', 0)
            ->where('reunited', 0)
            ->orderBy('created_at', 'DESC')->paginate(2);

        //dd($missingPets);

        return view('missing.index', [
            'missingPets' => $missingPets,

        ]);
    }

    public function myMissingIndex()
    {
        $missingPets = Missing::where('id', '>', 0)
            ->where('reunited', 0)
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')->paginate(2);

        //dd($missingPets);

        return view('missing/myMissing.index', [
            'missingPets' => $missingPets,

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('missing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Missing $missing)
    {

        $validatedData = $request->validate([

            'user_id' => 'required',
            'firstName' => 'required',
            'surname' => 'required',
            'petName' => 'required',
            'petAge' => 'required',
            'petType' => 'required',
            'town' => 'required',
            'postCode' => 'required', 'min:3', 'max:4',
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
            $imagePath = "/public/images/profileImage.jpg
";
        } else {
            $imagePath = $request->file('img1')->store('images', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }

        if ($request->hasFile('img2') == null) {
            $imagePath2 = "/public/images/profileImage.jpg
";
        } else {
            $imagePath2 = $request->file('img2')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }

        if ($request->hasFile('img3') == null) {
            $imagePath3 = "/public/images/profileImage.jpg
";
        } else {
            $imagePath3 = $request->file('img3')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }




        $missing->user_id = auth()->user()->id;
        $missing->firstName = auth()->user()->firstName;
        $missing->surname = auth()->user()->surname;
        $missing->petName = $request->petName;
        $missing->petType = $request->petType;
        $missing->petAge = $request->petAge;
        $missing->description = $request->description;
        $missing->town = $request->town;
        $missing->postCode = $request->postCode;
        $missing->chipNum = $request->chipNum;

        $missing->img1 = $imagePath;
        $missing->img2 = $imagePath2;
        $missing->img3 = $imagePath3;

        $missing->reunited = $request->reunited;



        $missing->save();

        //return redirect()->route('missing.show', $missing->id)->with('success', 'Missing Pet Successfully Uploaded!!');

        return redirect()->route('welcome')->with('success', 'Missing Pet Successfully Uploaded!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $shareButtons = \Share::page(
            'https://www.findmypet.com',
            'Help reunite this pet with its owner',
        )
            ->facebook()
            ->whatsapp();


        $missing = Missing::findOrFail($id);

        $chip = $missing->chipNum;

        $founds = DB::table('founds')
            ->join('missings', 'founds.chipNum', '=', 'missings.chipNum')
            ->where('founds.chipNum', $chip)
            ->select('missings.*', 'founds.id as founds_id')
            ->get();
        // dd($missings);
        return view('missing.show', [
            'shareButtons' => $shareButtons,
            'missing' => $missing,
            'founds' => $founds,

        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Missing $missing)
    {
        if ($missing->user_id !== auth()->user()->id) {
            abort(403);
        }

        $arr['missing'] = $missing;
        return view('missing.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Missing $missing)
    {

        if (!empty($request->input('petName'))) {
            $missing->petName = $request->petName;
        }
        if (!empty($request->input('petType'))) {
            $missing->petType = $request->petType;
        }
        if (!empty($request->input('petAge'))) {
            $missing->petAge = $request->petAge;
        }
        if (!empty($request->input('chipNum'))) {
            $missing->chipNum = $request->chipNum;
        }
        if (!empty($request->input('description'))) {
            $missing->description = $request->description;
        }

        if (!empty($request->input('town'))) {
            $missing->town = $request->town;
        }
        if (!empty($request->input('postCode'))) {
            $missing->postCode = $request->postCode;
        }
        if (!empty($request->input('reunited'))) {
            $missing->reunited = $request->reunited;
        }
        if (!empty($request->hasFile('img1'))) {

            $missing->img1 = (request('img1')->store('uploads', 'public'));
            $image = Image::make(public_path("storage/{$missing->img1}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }
        if (!empty($request->hasFile('img2'))) {

            $missing->img2 = (request('img2')->store('uploads', 'public'));
            $image = Image::make(public_path("storage/{$missing->img2}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }
        if (!empty($request->hasFile('img3'))) {

            $missing->img3 = (request('img3')->store('uploads', 'public'));
            $image = Image::make(public_path("storage/{$missing->img3}"))->orientate()->fit(180, 180); //Save updated image as 180 x 180 px
            $image->save();
        }

        $missing->save();
        return redirect()->route('missing.show', $missing->id)->with('success', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Missing::destroy($id);
        return redirect()->route('welcome')->with('success', 'Missing Profile successfully deleted!!');
    }
}
