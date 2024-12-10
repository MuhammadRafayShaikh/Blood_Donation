<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = City::all();

        return response()->json([
            'status' => true,
            'message' => 'All Cities',
            'city' => $city
        ], 200);
    }

    public function cityPDF()
    {
        $city = City::all();

        $pdf = Pdf::loadView('pdf.cityPDF', compact('city'));

        return $pdf->download('city.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->name;
        $cityValidation = validator($request->all(), [
            'name' => 'required'
        ]);

        if ($cityValidation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'error' => $cityValidation->errors()->all()
            ]);
        }

        $city = City::create([
            'name' => $request->name
        ]);

        if ($city) {
            return response()->json([
                'status' => true,
                'message' => 'City Added Successfully',
                'city' => $city
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'City Not Added',
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $city = City::findOrFail($id);
        
    //     return view('admin.city.edit-city', compact('city'));
        
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cityValidation = validator($request->all(), [
            'name' => 'required'
        ]);

        if ($cityValidation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'error' => $cityValidation->errors()->all()
            ], 400);
        }

        $city = City::findOrFail($id);

        $city->update([
            'name' => $request->name
        ]);

        if ($city) {
            return response()->json([
                'status' => true,
                'message' => 'City Updated Successfully',
                'city' => $city
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'City Not Update'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return response()->json([
            'status' => true,
            'message' => 'City Deleted Successfully',
            'city' => $city
        ], 200);
    }


    public function users()
    {
        $users = User::with('city')->get();

        return response()->json([
            'status' => true,
            'message' => 'All Users',
            'users' => $users
        ], 200);
    }
}
