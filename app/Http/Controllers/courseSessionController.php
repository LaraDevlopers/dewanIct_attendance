<?php

namespace App\Http\Controllers;

use App\Models\Course_session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class courseSessionController extends Controller
{
    //index
    public function index(){

        return view('course_session.index');
    }
    //store
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'course_session_start' => 'required',
            'course_session_end' => 'required',
        ]);

        if($validator->passes()){
            $course_session = new Course_session();
            $course_session->course_session_start = $request->course_session_start;
            $course_session->course_session_end = $request->course_session_end;
            $course_session->save();
            return response()->json(['success' => 'Added Successfully!']);
        }
        else{
            return response()->json(['errors' => $validator->errors()]);
        }
    }
    //Delete
    public function delete(Request $request){
        course_session::find($request->id)->delete();
        return response()->json(['test', $request->id]);
        return response()->json(['success', 'Delete Successfully!']);
    }

}
