<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Phone;
use App\Camp;
use App\Requests;
use App\User;
use MercurySeries\Flashy\Flashy;
use Request;
use Datatables;
use Illuminate\Support\Facades\Input;

class AdminDataController extends Controller
{


    /**
     *   News Data Table
     **/
    public function news()
    {
        $data = Announcement::select(['id', 'message', 'created_at']);
        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return '<a href="' . url('/admin/news/edit/' . $data->id) . '" class="el-button el-button--primary  el-button--small"><i class="el-icon-edit"></i>
                 Edit</a> <a onclick="return confirm(\' Are you sure you want to delete this item ? \');" href="' . url('/admin/news/delete/' . $data->id) . '"  class="el-button el-button--danger  el-button--small"><i class="el-icon-delete"></i>
                  Delete</a> ';
            })->editColumn('created_at', function ($data) {
                return date('F d, Y h:m A', strtotime($data->created_at));
            })->rawColumns(['actions'])
            ->make(true);
    }


    /**
     *   Camp Data handle
     **/
    public function camps()
    {
        $data = Camp::select(['id', 'name', 'address', 'district']);
        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return '<a href="' . url('/admin/camp/edit/' . $data->id) . '" class="el-button el-button--primary  el-button--small"><i class="el-icon-edit"></i>
                 Edit</a> <a onclick="return confirm(\' Are you sure you want to delete this item ? \');" href="' . url('/admin/camp/delete/' . $data->id) . '"  class="el-button el-button--danger  el-button--small"><i class="el-icon-delete"></i>
                  Delete</a> ';
            })->editColumn('created_at', function ($data) {
                return date('F d, Y h:m A', strtotime($data->created_at));
            })->rawColumns(['actions'])
            ->make(true);
    }

    /**
     *   USers
     **/
    public function users()
    {
        $data = User::select(['id', 'name', 'email', 'phone', 'location', 'isAdmin', 'created_at']);
        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                if ($data->id != "1") {
                    if ($data->isAdmin == 1) $msg = "<i class=\"el-icon-arrow-down
                    \"></i> Remove Admin";
                    else $msg = "<i class=\"el-icon-arrow-up
                    \"></i> Make Admin";
                    return '<a href="' . url('/admin/user/super/' . $data->id) . '" class="el-button el-button--primary  el-button--small">
                     ' . $msg . '</a> <a onclick="return confirm(\' Are you sure you want to delete this item ? \');" href="' . url('/admin/user/delete/' . $data->id) . '"  class="el-button el-button--danger  el-button--small"><i class="el-icon-delete"></i>
                      Delete</a> ';
                } else {
                    return '<a  disabled  class=" text-white el-button el-button--primary  el-button--small  is-disabled"><i class="el-icon-arrow-down
                    "></i>                     Remove Admin</a> <a  disabled class=" text-white el-button el-button--danger  el-button--small  is-disabled "><i class="el-icon-delete"></i>
                      Delete</a> ';
                }

            })->editColumn('created_at', function ($data) {
                return date('F d, Y h:m A', strtotime($data->created_at));
            })->rawColumns(['actions'])
            ->make(true);

    }

    /**
     *   help requests
     **/
    public function requests()
    {
        $status = Input::get('status');

        if ($status)
            $data = Requests::select(['id', 'name', 'phone', 'location', 'district', 'lat', 'lon','created_at'])->where('status', '1');
        else
            $data = Requests::select(['id', 'name', 'phone', 'location', 'district', 'lat', 'lon','created_at'])->where('status', '0');


        return Datatables::of($data)->addColumn('map', function ($data) {
            return '<a target="BLANK" href="https://www.google.com/maps/?q=' . $data->lat . ',' . $data->lon . '"> ' . $data->location . '</a>';
        })
            ->addColumn('actions', function ($data) {
                return '<a href="' . url('/admin/request/' . $data->id) . '" class="el-button el-button--primary  el-button--small"><i class="el-icon-edit"></i>
                 View</a> <a onclick="return confirm(\' Are you sure you want to delete this item ? \');" href="' . url('/admin/requests/delete/' . $data->id) . '"  class="el-button el-button--danger  el-button--small"><i class="el-icon-delete"></i>
                  Delete</a> ';
            })->editColumn('created_at', function ($data) {
                return date('F d, Y h:m A', strtotime($data->created_at));
            })->rawColumns(['actions', 'map'])
            ->make(true);
    }

    /**
     *   Contact info 
     **/
    public function contacts()
    {
        $data = Phone::select(['id', 'name', 'number', 'location', 'position']);
        return Datatables::of($data)
            ->addColumn('actions', function ($data) {
                return '<a href="' . url('/admin/contact/edit/' . $data->id) . '" class="el-button el-button--primary  el-button--small"><i class="el-icon-edit"></i>
                 View</a> <a onclick="return confirm(\' Are you sure you want to delete this item ? \');" href="' . url('/admin/contact/delete/' . $data->id) . '"  class="el-button el-button--danger  el-button--small"><i class="el-icon-delete"></i>
                  Delete</a> ';
            })->rawColumns(['actions'])
            ->make(true);
    }
}
