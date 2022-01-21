<?php

namespace App\Http\Controllers;

use App\Models\Noetic;
use Illuminate\Http\Request;

class NoeticSchoolController extends Controller
{
    
    public function search(){
        $data = Noetic::all();
        return response()->json(['data' => $data], 200);
    }
    public function create(Request $request){
        $data = $request->only('name','password');
        $created = Noetic::create($data);
        return response()->json(['data' => 'created'], 200);
     }

}
