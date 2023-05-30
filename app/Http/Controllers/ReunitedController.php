<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Found;
use App\Models\Missing;




class ReunitedController extends Controller
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
    // Show all reunited cats
    public function reunitedCatsIndex()
    {

        $reunitedCatsFound = DB::table('missings')
            ->where('petType', 'Cat')
            ->where('reunited', 1);

        $reunitedCatsMissing = DB::table('founds')
            ->where('petType', 'Cat')
            ->where('reunited', 1)
            ->union($reunitedCatsFound)
            ->orderBy('created_at', 'ASC')->paginate(3);

        return view('reunited/cats.reunitedCatsIndex', [

            'reunitedCatsMissing' => $reunitedCatsMissing,

        ]);
    }

    public function reunitedDogsIndex()
    {


        $reunitedDogsFound = DB::table('missings')
            ->where('petType', 'Dog')
            ->where('reunited', 1);
        // ->orderBy('created_at', 'ASC')->paginate(3);
        $reunitedDogsMissing = DB::table('founds')
            ->where('petType', 'Dog')
            ->where('reunited', 1)
            ->union($reunitedDogsFound)
            ->orderBy('created_at', 'ASC')->paginate(3);


        return view('reunited/dogs.reunitedDogsIndex', [

            'reunitedDogsMissing' => $reunitedDogsMissing,


        ]);
    }
    public function reunitedPetsIndex()
    {


        $reunitedPetsFound = DB::table('missings')
            ->where('petType', 'Other')
            ->where('reunited', 1);
        // ->orderBy('created_at', 'ASC')->paginate(3);
        $reunitedPetsMissing = DB::table('founds')
            ->where('petType', 'Other')
            ->where('reunited', 1)
            ->union($reunitedPetsFound)
            ->orderBy('created_at', 'ASC')->paginate(3);

        // dd($foundCats);

        return view('reunited/otherPets.reunitedPetsIndex', [
            // 'reunitedPetsFound' => $reunitedPetsFound,
            'reunitedPetsMissing' => $reunitedPetsMissing,

        ]);
    }

    public function index()
    {

        $reunitedPetsMissing = DB::table('missings')
            ->where('reunited', 1);

        $reunitedPets = DB::table('founds')

            ->where('reunited', 1)
            ->union($reunitedPetsMissing)
            ->orderBy('created_at', 'ASC')->paginate(3);

        //dd($reunitedPets);
        return view('reunited.index', [
            'reunitedPets' => $reunitedPets,

        ]);
    }

    public function show($id)
    {
        $reunitedPet = Missing::findOrFail($id);

        if (!empty($reunitedPet)) {
            return view('reunited.show', [
                'reunitedPet' => $reunitedPet,
            ]);
        } else {
            $reunitedPet = Found::findOrFail($id);

            return view('reunited.show', [
                'reunitedPet' => $reunitedPet,


            ]);
        }
    }
}
