<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){
        $leads = Lead::all();
        return view('admin.leads.index',compact('leads'));
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('admin.leads.index');
    }
}
