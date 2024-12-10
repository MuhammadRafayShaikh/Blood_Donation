<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Group;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function report()
    {
        $group = Group::all();
        return view('admin.reports.blood-group-report', compact('group'));
    }

    public function reportInfo(Request $request, string $id)
    {
        // return $request;
        if ($request->group_id != "all") {

            $donors = Donor::with('group', 'city')->where('group_id', $id)->get();
        } else {
            $donors = Donor::with('group', 'city')->get();
        }
        // return $donor;
        if ($donors->count() > 0) {

            return response()->json([
                'status' => true,
                'message' => 'Donors',
                'donors' => $donors
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No Records Found',
            ], 400);
        }
    }

    public function groupPDF(Request $request)
    {
        if ($request->group_id != "all") {

            $donors = Donor::with('group', 'city')->where('group_id', $request->group_id)->get();
        } else {
            $donors = Donor::with('group', 'city')->get();
        }
        // return view('pdf.group', compact('donors'));
        $pdf = Pdf::loadView('pdf.group', compact('donors'));

        return $pdf->download('Blood_Group_Report.pdf');
    }
}
