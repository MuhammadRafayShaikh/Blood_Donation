<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Donor;
use App\Models\Group;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = City::all();
        $group = Group::all();
        return view('index', compact('city', 'group'));
    }

    public function search(Request $request)
    {
        // return $request;
        $group_id = $request->group_id;
        $city_id = $request->city_id;
        return view('donor', compact('group_id', 'city_id'));
    }


    public function searchDonor(Request $request)
    {
        $donor = Donor::with('group')->where(['city_id' => $request->city_id, 'group_id' => $request->group_id])->get();

        if ($donor->count() > 0) {

            return response()->json($donor);
        } else {
            return response()->json(['error' => 'No Record Found']);
        }
    }

    public function contact(string $id)
    {
        $donor = Donor::with('city', 'group')->findOrFail($id);
        // return $donor->group->name;
        return view('donor-profile', compact('donor'));
    }

    public function contactInfo(Request $request, string $id)
    {
        // return $request;
        $donor = Donor::with('city', 'group')->findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Single Donor Contact',
            'donor' => $donor
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
