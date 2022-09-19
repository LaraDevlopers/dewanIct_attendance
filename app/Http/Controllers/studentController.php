<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //index
    public function index(){
        return view('student.index');
    }

    //sutdent result serach
    public function search(Request $request){
        // $result = Result::where('reg_number', $request->reg_no)->first();
        // if($result->exists()){
        if(Result::where('reg_number', $request->reg_no)->exists()){
            $result = Result::where('reg_number', $request->reg_no)->first();
            return response()->json(['success' => $result]);
        }else{
            return response()->json(['invalid' => 'Registration number is Invalid']);
        }
    }

    //search by key up
    public function search_by_keyup(Request $request){
        if($request->reg_no){
            if(Result::where('reg_number', $request->reg_no)->exists()){
                $result = Result::where('reg_number', $request->reg_no)->first();
                return response()->json(['success' => $result]);
            }else{
                return response()->json(['invalid' => 'Registration number is Invalid']);
            }
        }
    }
}
