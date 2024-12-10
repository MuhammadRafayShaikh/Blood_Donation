<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Donor;
use App\Models\Group;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donors = Donor::with('group', 'city')->get();

        return response()->json([
            'status' => true,
            'message' => 'All Donors',
            'donors' => $donors
        ], 200);
    }

    public function donorPDF()
    {
        $donors = Donor::all();

        $pdf = Pdf::loadView('pdf.donorPDF', compact('donors'));

        return $pdf->download('All_Donors.pdf');
    }

    public function create()
    {
        // $city = City::all();
        $cities = new City();
        $city = $cities->all();

        $groups = new Group();
        $group = $groups->all();

        return view('admin.donor.add-donor', compact('city', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $donorValidation = validator($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'pin_code' => 'required|numeric',
            'city_id' => 'required',
            'state' => 'required',
            'country' => 'required',
            'group_id' => 'required',
            'email' => 'required|email',
        ]);

        if ($donorValidation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'error' => $donorValidation->errors()->all()
            ], 400);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $imageExtension;
            $image->move(public_path('uploads/'), $imagename);
        } else {
            $imagename = null;
        }
        $donor = Donor::create([
            'name' => $request->name,
            'image' => $imagename,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'pin_code' => $request->pin_code,
            'city_id' => $request->city_id,
            'state' => $request->state,
            'country' => $request->country,
            'group_id' => $request->group_id,
            'email' => $request->email,
        ]);

        if ($donor) {
            return response()->json([
                'status' => true,
                'message' => 'Donor Added Successfully',
                'donor' => $donor
            ], 200);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Donor Not Added',
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $city = City::all();
    //     $groups = Group::all();
    //     $donor = Donor::findOrFail($id);

    //     return view('admin.donor.edit-donor', compact('donor', 'city', 'groups'));
    // }
    public function editDonor(string $id)
    {
        $city = City::all();
        $groups = Group::all();
        $donor = Donor::findOrFail($id);

        return view('admin.donor.edit-donor', compact('donor', 'city', 'groups'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $donorValidation = validator($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'pin_code' => 'required|numeric',
            'city_id' => 'required',
            'state' => 'required',
            'country' => 'required',
            'group_id' => 'required',
            'email' => 'required|email',
        ]);

        if ($donorValidation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'error' => $donorValidation->errors()->all()
            ], 400);
        }

        $donor = Donor::findOrFail($id);

        if ($request->hasFile('new_image')) {
            $path = public_path('uploads/');
            if ($donor->image && file_exists($path . $donor->image)) {
                unlink($path . $donor->image);
            }
            $image = $request->file('new_image');
            $imageExtension = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $imageExtension;
            $image->move(public_path('uploads/'), $imagename);
        } else {
            $imagename = $donor->image;
        }

        $donor->update([
            'name' => $request->name,
            'image' => $imagename,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'pin_code' => $request->pin_code,
            'city_id' => $request->city_id,
            'state' => $request->state,
            'country' => $request->country,
            'group_id' => $request->group_id,
            'email' => $request->email,
        ]);

        if ($donor) {
            return response()->json([
                'status' => true,
                'message' => 'Donor Updated Successfully',
                'donor' => $donor
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Donor Not Update',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
