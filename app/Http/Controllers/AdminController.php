<?php

namespace App\Http\Controllers;

use Request;

use App\Announcement;
use App\Phone;
use App\Camp;
use App\Requests;
use App\User;
use MercurySeries\Flashy\Flashy;

class AdminController extends Controller
{
    /**
     *   Verify the authentication
     **/
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    /**
     *   Admin panel - homepage
     **/
    public function index()
    {
        $pending = Requests::where('status', '0')->count();
        $camps = Camp::select('id')->count();
        $users = User::count();


        return view('admin.index', compact('pending', 'camps', 'users'));
    }

    /**
     *   View Request
     **/
    public function viewRequest($id)
    {
        $req = Requests::findOrFail($id);
        return view('admin.viewRequest', compact('req'));
    }

    /**
     *   Update status of request
     **/
    public function updateStatus($id)
    {
        $req = Requests::findOrFail($id);
        $req->update(['status' => '1']);
        Flashy::success('Marked as complete');
        return redirect('admin/requests');
    }

    /**
     *   Update status to pending
     **/
    public function updateStatusPending($id)
    {

        $req = Requests::findOrFail($id);
        $req->update(['status' => '0']);
        Flashy::success('Marked as pending');
        return redirect('admin/requests');

    }

    /**
     *   News
     **/
    public function news()
    {
        return view('admin.news');
    }

    /**
     *   Add News
     **/
    public function addNews()
    {
        return view('admin.addNews');
    }

    /**
     *   Store News
     **/
    public function storeNews()
    {
        $request = Request::all();
        Announcement::create($request);
        Flashy::success('News Added successfully');

        return redirect('admin/news');
    }

    /**
     *   Edit News
     **/
    public function editNews($id)
    {
        $news = Announcement::findOrFail($id);
        return view('admin.editNews', compact('news'));
    }

    /**
     *   Update News
     **/
    public function updateNews($id)
    {
        $news = Announcement::findOrFail($id);
        $request = Request::all();
        $news->update($request);
        Flashy::success('News updated successfully');
        return redirect('admin/news');
    }

    /**
     *   Delete News
     **/
    public function deleteNews($id)
    {
        $data = Announcement::findOrFail($id);
        $data->delete();
        Flashy::success('Announcement Removed Successfully');
        return redirect('admin/news');
    }


    /**
     *   Camps
     **/
    public function camps()
    {
        return view('admin.camps');
    }

    /**
     *   New Camp
     **/
    public function newCamp()
    {
        return view('admin.addCamp');
    }

    /**
     *   Store Camp
     **/
    public function storeCamp()
    {
        $request = Request::all();
        Camp::create($request);

        Flashy::success('Camp added succesfully');
        return redirect('admin/camps');
    }

    /**
     *   Edit Camp
     **/
    public function editCamp($id)
    {
        $camp = Camp::findOrFail($id);
        return view('admin.editCamp', compact('camp'));
    }

    /**
     *   Update Camp
     **/
    public function updateCamp($id)
    {
        $camp = Camp::findOrFail($id);
        $request = Request::all();
        $camp->update($request);
        Flashy::success('Camp updated successfully');
        return redirect('admin/camps');
    }

    /**
     *   Delete Camp
     **/
    public function deleteCamp($id)
    {
        $camp = Camp::findOrFail($id);
        $camp->delete();
        Flashy::success('Camp Removed Successfully');
        return redirect('admin/camps');
    }

    /**
     *   volunteers
     **/
    public function volunteers()
    {
        return view('admin.users');
    }

    /**
     *   Make super admin
     **/
    public function superUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == 1) {
            Flashy::error('You cant remove admin permission for this user');
            return redirect('admin/volunteers');
        }
        if ($user->isAdmin == 1) {
            $user->update(['isAdmin' => '0']);
            Flashy::success('Removed Admin Access');
            return redirect('admin/volunteers');
        }
        $user->update(['isAdmin' => '1']);
        Flashy::success('Added Admin Access');
        return redirect('admin/volunteers');

    }

    /**
     *   Delete User
     **/
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == 1) {
            Flashy::error('You cant remove admin permission for this user');
            return redirect('admin/volunteers');
        }
        $user->delete();
        Flashy::success('User Removed Successfully');
        return redirect('admin/volunteers');
    }

    /**
     *   Contact info
     **/
    public function contacts()
    {
        return view('admin.contact');
    }

    /**
     *   Add Contact
     **/
    public function addContact()
    {
        return view('admin.addContact');
    }

    /**
     *   Store Contact
     **/
    public function storeContact()
    {
        $request = Request::all();
        $request['location'] = $request['district'];
        Phone::create($request);
        Flashy::success('Contact info added successfully');
        return redirect('admin/contacts');
    }
    /**
     *   Edit Contact
     **/
    public function editContact($id)
    {
        $phone = Phone::findOrFail($id);
        return view('admin.editContact', compact('phone'));
    }

    /**
     *   Update Contact
     **/
    public function updateContact($id)
    {
        $phone = Phone::findOrFail($id);
        $request = Request::all();
        $request['location'] = $request['district'];
        $phone->update($request);
        Flashy::success('Contact update successfully');
        return redirect('admin/contacts');
    }

    /**
     *   Delete Contact
     **/
    public function deleteContact($id)
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();
        Flashy::success('Contact removed successfully');
        return redirect('admin/contacts');
    }

    /**
     *   Requests
     **/
    public function requests()
    {
        return view('admin.requests');
    }

    /**
     *   Processed Requests
     **/
    public function processedRequest()
    {
        return view('admin.processedRequests');

    }

    public function deleteRequest($id)
    {
        $requests = Requests::findOrFail($id);
        $requests->delete();
        Flashy::success('Help Request Removed Successfully');
        return redirect('admin/requests');
    }
}
