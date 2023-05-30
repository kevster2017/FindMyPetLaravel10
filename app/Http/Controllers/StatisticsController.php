<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Missing;
use App\Models\Messages;
use App\Models\Found;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function stats()
    {

        $users = DB::table('users')->count();
        $registrations = User::whereDay('created_at', today())->count();
        $messages = DB::table('contact_us')->count();


        $missingDog = DB::table('missings')
            ->where('petType', 'Dog')
            ->count();
        $missingCat = DB::table('missings')
            ->where('petType', 'Cat')
            ->count();
        $missingPet = DB::table('missings')
            ->where('petType', 'Other')
            ->count();

        $foundDog = DB::table('founds')
            ->where('petType', 'Dog')
            ->count();
        $foundCat = DB::table('founds')
            ->where('petType', 'Cat')
            ->count();
        $foundPet = DB::table('founds')
            ->where('petType', 'Other')
            ->count();


        $reunitedDog = DB::table('missings')
            ->where('petType', 'Dog')
            ->where('reunited', 1)
            ->count();
        $reunitedCat = DB::table('missings')
            ->where('petType', 'Cat')
            ->where('reunited', 1)
            ->count();
        $reunitedPet = DB::table('missings')
            ->where('petType', 'Other')
            ->where('reunited', 1)
            ->count();




        return view('viewStatistics', [
            'users' => $users,
            'missingDog' => $missingDog,
            'missingCat' => $missingCat,
            'missingPet' => $missingPet,
            'messages' => $messages,
            'foundDog' => $foundDog,
            'foundCat' => $foundCat,
            'foundPet' => $foundPet,
            'reunitedDog' => $reunitedDog,
            'reunitedCat' => $reunitedCat,
            'reunitedPet' => $reunitedPet,
            'registrations' => $registrations,
        ]);
    }
}
