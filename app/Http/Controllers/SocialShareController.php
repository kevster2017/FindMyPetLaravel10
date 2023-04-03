<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missing;

class SocialShareController extends Controller
{
    public function index()
    {
        $shareButtons = \Share::page(
            'https://www.itsolutionstuff.com',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        $posts = Missing::get();

        return view('socialshare', compact('shareButtons', 'posts'));
    }
}
