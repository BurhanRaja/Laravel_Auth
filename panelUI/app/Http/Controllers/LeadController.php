<?php

namespace App\Http\Controllers;

use App\Exports\LeadExport;
use App\Lead;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LeadController extends Controller
{
    public function index() {
        $leads = Lead::all();
        return view('pages.leads.allLeads', [
            'leads' => $leads
        ]);
    }

    public function search(Request $request) {
        $leads = Lead::all();

        if ($request->keyword != '') {
            $leads = Lead::where('name' , 'like' , '%' . request('keyword') . '%')->orWhere('email' , 'like' , '%' . request('keyword') . '%')->orWhere('mobile' , 'like' , '%' . request('keyword') . '%')->orWhere('country' , 'like' , '%' . request('keyword') . '%')->orWhere('state' , 'like' , '%' . request('keyword') . '%')->orWhere('city' , 'like' , '%' . request('keyword') . '%')->orWhere('subject' , 'like' , '%' . request('keyword') . '%')->get();
        }

        return response()->json([
            'leads' => $leads
        ]);
    }

    public function create() {

        return view('pages.leads.leadsCreate');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:leads',
            'country_code' => 'required',
            'mobile' => 'required',
            'subject' => 'required|min:20',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ]);

        $lead = Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city
        ]);

        if ($lead) {
            return redirect('/dashboard/create/leads')->with('successMessage', 'Lead Successfully Created.');
        } else {
            return back()->with('errorMessage', 'Some Error Occurred.');
        }
    }

    public function edit($id) {
        $lead = Lead::find($id);

        return view('leadscrud.edit', [
            'lead' => $lead
        ]);
    }

    public function update(Request $request, Lead $lead) {
        $validate = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'country_code' => 'required',
            'mobile' => 'required',
            'subject' => 'required|min:20',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ]);

        $leadUpdate = $lead->update([
            'name' => $request->name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city
        ]);

        if($leadUpdate) {
            return redirect('/dashboard/leads')->with('successMessge', 'Lead Successfully Updated.');
        } else {
            return back()->with('successMessge', 'Some Error Occurred.');
        }

    }

    public function delete(Lead $lead) {
        $leadDelete = $lead->delete();
        if ($leadDelete) {
            return redirect('/dashboard/leads')->with('successMessage', 'Lead Successfully Deleted.');
        } else {
            return redirect('/dashboard/leads')->with('errorMessage', 'Some Error Occurred.');
        }
    }

    public function getExcel()
    {
        return Excel::download(new LeadExport, 'leads.xlsx');
    }

    public function getPdf() {
        $leads = Lead::all();
        view()->share('leads', $leads);
        $pdf = Pdf::loadView('downloadFiles.samplePdf', ['leads' => $leads])->setPaper(array(0, 0, 750, 1000));
        return $pdf->download('leads.pdf');
    }
}
