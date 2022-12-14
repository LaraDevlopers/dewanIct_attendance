<?php

namespace App\Http\Controllers;

use App\Exports\resultExport;
use App\Exports\student_result_export;
use App\Exports\testExport;
use App\Imports\resultImport;
use App\Imports\resultMultipleSheet;
use App\Imports\student_result_export as ImportsStudent_result_export;
use App\Imports\student_result_import;
use App\Models\Result;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Image;
use Maatwebsite\Excel\Facades\Excel;


// use Image;

class resultController extends Controller
{
    //index
    public function index(){
        $results = Result::all();
        return view('result.index', compact('results'));
    }

    //store
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
            'date_of_birth' => 'required',
        ]);
        if($validator->passes()){


            // if ($request->hasFile('s_image')) {
            //     $image = $request->file('s_image');
            //     $image_name = $request->s_name.'-'.uniqid(50).'-'.$image->getClientOriginalExtension();
            //     // if(!Storage::disk('public')->exists('student_image')){
            //     //     Storage::disk('public')->makeDirectory(('student_image'));
            //     // }

            //     $image_size = Image::make($image)->resize(800, 960)->stream();
            //     Storage::disk('public')->put('student_image/' . $image_name, $image_size);


                // $image-> move(public_path('public/image'), $image_name);
                // $image_name = $image_name;

                // return response()->json(['test' => $image_name]);
            // }
            // else{

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
                $result->date_of_birth = $request->date_of_birth;
                $result->save();
                return response()->json(['success' => 'successfully add']);
            }

        // }
        else{
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    //delete
    public function delete(Request $request){
         Result::find($request->id)->delete();
        return response()->json(['success' => "Deleted Successfully"]);
    }

    // Export
    public function export(){
        // return (new resultExport(2022))->download('student.xlsx');

        return Excel::download(new student_result_export, 'studentResult.xlsx');
        // return Excel::download(new testExport, 'test_export.xlsx');
        //   response()->json(['success', 'Successfully Download']);
    }
    //import
    public function import(Request $request){

        // Excel::import(new student_result_import, $request->file('s_result'));
        // return back();
        $validator = Validator::make($request->all(), [
            's_result' => 'required',
        ]);
        if($validator->passes()){
            // Excel::import(new resultImport, $request->file('s_result'));

            Excel::import(new student_result_import, $request->file('s_result'));
                return response()->json(['success' => 'Imported Successflly!']);
        }
        else{
            return response()->json(['errors' => $validator->errors()]);
        }
    }
}








