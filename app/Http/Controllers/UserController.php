<?php

namespace App\Http\Controllers;

use Request;
use App\Announcement;
use App\Phone;
use App\Camp;
use App\Requests;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     *   Page for request help
     **/
    public function request()
    {
        return view('pages.request');
    }

    /**
     *   Store Request
     **/
    public function saveRequest()
    {
        $request = Request::all();
        Requests::create($request);
        Flashy::success('We have received your request.');
        return redirect('/');

    }


    /**
     *   Announcements
     **/
    public function announcements()
    {
        $news = Announcement::orderBy('id', 'DESC')->paginate(10);
        return view('pages.announcements', compact('news'));
    }

    /**
     *   Camps
     **/
    public function camps()
    {
        $dist = Input::get('district');
        if ($dist)
            $camps = Camp::where('location', 'LIKE', '%' . $dist . '%')->paginate(10);
        else
            $camps = Camp::paginate(10);

        return view('pages.camps', compact('camps'));
    }

    /**
     *   Contacts
     **/
    public function contacts()
    {
        $dist = Input::get('district');
        if ($dist)
            $phones = Phone::where('location', 'LIKE', '%' . $dist . '%')->paginate(10);
        else
            $phones = Phone::paginate(10);

        return view('pages.phone', compact('phones'));
    }

    /**
     *   Request details
     **/
    public function requestDetails($id)
    {
        $req = Requests::findOrFail($id);
        return view('pages.viewRequest', compact('req'));
    }

}
