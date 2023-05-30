<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
         $projects = Project::with('type','technologies')->get();
         return response()->json([
             'success' => true,
             'results' => $projects
         ]);   
    }

    public function show($id){
        $projects = Project::where('id', $id)->with('type', 'technologies')->first();


        if ($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
