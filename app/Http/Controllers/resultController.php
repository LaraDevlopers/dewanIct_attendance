<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class resultController extends Controller
{
    //index
    public function index(){
        $results = Result::all();
        return view('result.index', compact('results'));
    }

    public function store(Request $request){
        // return response()->json(['success' => $request->all()]);

        $validator = Validator::make($request->all(),[
            'reg_number' => 'required',
            'roll_no' => 'required',
            's_name' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'cgpa' => 'required',
            'institute' => 'required',
            'institute_code' => 'required',
            'course_duration' => 'required',
            'passing_year' => 'required',
            'course_name' => 'required',
        ]);
        if($validator->passes()){
            // return response()->json(['test' => $request->course_name]);
            $result = new Result();
            $result->s_name = $request->s_name;
            $result->reg_number = $request->reg_number;
            $result->roll_no = $request->roll_no;
            $result->f_name = $request->f_name;
            $result->m_name = $request->m_name;
            $result->cgpa = $request->cgpa;
            $result->institute = $request->institute;
            $result->institute_code = $request->institute_code;
            $result->course_duration = $request->course_duration;
            $result->passing_year = $request->passing_year;
            $result->course_name = $request->course_name;
            $result->save();
            return response()->json(['success' => 'successfully add']);
        }
        else{
            return response()->json(['errors' => $validator->errors()]);
        }
    }
}








