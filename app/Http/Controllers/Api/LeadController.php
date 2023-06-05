<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'author' => 'nullable|string|max:100',
            'content' => 'string'
        ]);


        $lead = new Lead();
        $lead->author = $data['author'];
        $lead->content = $data['content'];
        $lead->save();

        Mail::to('info@projects.it')->send(new NewLead($lead));

        return $lead;
    }

}
