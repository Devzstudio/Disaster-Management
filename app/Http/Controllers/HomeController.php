<?php

namespace App\Http\Controllers;

use MercurySeries\Flashy\Flashy;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Request;
use App\User;
use App\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     *   Help Requests
     **/
    public function requests()
    {
        $data = Requests::select(['id', 'name', 'phone', 'location', 'district', 'lat', 'lon'])->where('status', '0')->where('location', 'LIKE', '%' . Auth::user()->location . '%');
        return Datatables::of($data)->addColumn('map', function ($data) {
            return '<a target="BLANK" href="https://www.google.com/maps/?q=' . $data->lat . ',' . $data->lon . '"> ' . $data->location . '</a>';
        })
            ->addColumn('actions', function ($data) {
                return '<a href="' . url('/user/request/' . $data->id) . '" class="el-button el-button--primary"><i class="el-icon-edit"></i>
                 View</a>  ';
            })->editColumn('created_at', function ($data) {
                return date('F d, Y h:m A', strtotime($data->created_at));
            })->rawColumns(['actions', 'map'])
            ->make(true);

    }



    /**
     *   Update status of request
     **/
    public function updateStatus($id)
    {
        $req = Requests::findOrFail($id);
        $req->update(['status' => '1']);
        Flashy::success('Marked as complete');
        return redirect('home');
    }

    /**
     *   Profile Page
     **/
    public function profile()
    {
        return view('pages.profile');
    }

    /**
     *   update profile
     **/
    public function updateProfile()
    {
        $request = Request::all();
        $data['phone'] = $request['phone'];
        $data['location'] = $request['district'];
        $user = User::findOrFail(Auth::user()->id);
        $user->update($data);
        Flashy::success('Profile updated successfully');
        return redirect('home');

    }
}
