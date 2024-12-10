<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();

        return response()->json([
            'status' => true,
            'message' => 'All Groups',
            'groups' => $groups
        ], 200);
    }
    public function allgroupPDF()
    {
        $group = Group::all();

        $pdf = Pdf::loadView('pdf.groupPDF', compact('group'));

        return $pdf->download('All_Blood_Group.pdf');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groupValidation = validator($request->all(), [
            'name' => 'required'
        ]);

        if ($groupValidation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'error' => $groupValidation->errors()->all()
            ], 400);
        }

        $group = Group::create([
            'name' => $request->name
        ]);
        if ($group) {
            return response()->json([
                'status' => true,
                'message' => 'Group Added Successfully',
                'group' => $group
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Group Not Added',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $group = Group::findOrFail($id);

    //     return view('admin.blood-group.edit-blood', compact('group'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupValidation = validator($request->all(), [
            'name' => 'required'
        ]);

        if ($groupValidation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'error' => $groupValidation->errors()->all()
            ], 400);
        }

        $group = Group::findOrFail($id);

        $group->update([
            'name' => $request->name
        ]);

        if ($group) {
            return response()->json([
                'status' => true,
                'message' => 'Group Updated Successfully',
                'group' => $group
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Group Not Update'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::findOrFail($id);

        $group->delete();

        return response()->json([
            'status' => true,
            'message' => 'Group Deleted Successfully',
            'group' => $group
        ]);
    }
}
