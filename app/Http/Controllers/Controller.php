<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Donor;
use App\Models\Group;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $donors = Donor::count();
        $groups = Group::count();
        $city = City::count();
        $users = User::count();

        return view('admin.dashboard.dashboard', compact('donors', 'groups', 'city', 'users'));
    }

    public function city()
    {
        return view('admin.city.city');
    }

    public function addCity()
    {
        return view('admin.city.add-city');
    }

    public function editCity(string $id)
    {
        $city = City::findOrFail($id);
        return view('admin.city.edit-city', compact('city'));
    }

    public function group()
    {
        return view('admin.blood-group.blood');
    }

    public function addGroup()
    {
        return view('admin.blood-group.add-blood');
    }
    public function editGroup(string $id)
    {
        $city = City::all();
        $groups = Group::all();
        $donor = Donor::findOrFail($id);

        return view('admin.donor.edit-donor', compact('donor', 'city', 'groups'));
    }
    public function donor()
    {
        return view('admin.donor.donor');
    }

    public function addDonor()
    {
        return view('admin.donor.add-donor');
    }

    public function user()
    {
        return view('admin.users.user');
    }

    public function report()
    {
        $group = Group::all();
        return view('admin.reports.blood-group-report', compact('group'));
    }


    public function userPDF()
    {
        $user = User::all();

        $pdf = Pdf::loadView('pdf.userPDF', compact('user'));

        return $pdf->download('All_Users.pdf');
    }
}
