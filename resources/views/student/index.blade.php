@extends('layouts.master')
@section('title')
student result
@endsection
@section('styles')
<style>
    .parent{
        border: 9px solid #f8e5c7;
         border-style: double;
         padding:30px;
         {{--  background-image: url('{{asset('/assets/img/certificateBg.png')}}');  --}}

    }
    .elder_child{
        border: 3px solid #f8e5c7;
         border-style: double;

    }

    .gradig_table{
        width: 100%;
    }
    .gradig_table, td, thead th{
        border:2px solid black;
    }

    .cgpa_table td, thead th{
        border:2px solid black;
        padding: 10px;
    }
    .cgpa_table{
        width: 100%;
    }




</style>
@endsection
@section('content')
<div class="content container-fluid">



    <div class="row">

        <div class="col-md-12 text-center">
            <div>
                <h1 class="text-primary">DewanICT Course Certificate</h1>
                Search on the form below with the given student id on certificate
            </div>

        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-3">
            <form  id="search_form">
                @csrf
                <input  type="text" class="form-control" placeholder="Enter your Registration No" name="reg_no" id="search_by_reg_no">
                <span class="text-danger" id="invalid_reg"></span>
            </form>
        </div>


        {{--  <div class="col-md-12 d-none" id="student_result">
            <div>

                <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center mt-5">

                            <th></th>
                            <th class="text-end">Print</th>

                    </thead>
                    <tbody id="t_body">
                        <tr class="text-center">
                            <td>Name</td>
                            <td id="s_name"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Father Name</td>
                            <td id="f_name"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Mother Name</td>
                            <td id="m_name"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Course Name</td>
                            <td id="course_name"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Course Dureation</td>
                            <td id="course_duration"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Passing Year</td>
                            <td id="passing_year"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Institute Name</td>
                            <td id="institute_name"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Institute Code</td>
                            <td id="institute_code"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Roll Number</td>
                            <td id="roll_no"></td>
                        </tr>
                        <tr class="text-center">
                            <td>Registration Number</td>
                            <td id="reg_no"></td>
                        </tr>
                        <tr class="text-center">
                            <td>CGPA</td>
                            <td id="cgpa"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  --}}


    </div>

     {{--  <div class="row mt-5 d-none" id="student_result">
        <div class="col-lg-3"></div>
        <div class="col-lg-6" >
            <div class="card mb-0" style="background:rgba(212,228,239,.91)">
                <div class="card-header">
                    <a href="" class="btn btn-sm btn-danger print_btn"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                </div>
                <div class="card-body result_body">
                    <form action="#">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Name :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="s_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Father Name :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="f_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Mother Name  :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="m_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Course Name :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="course_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Course Duration :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="course_duration">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Passing Year :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="passing_year">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Institute Name :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="institute_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Institute Code :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="institute_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Roll No :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="roll_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Registration No :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="reg_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">CGPA :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg"
                                   id="cgpa">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>   --}}

<div id="student_result" class="d-none">

    <div class="col-md-12 text-center mt-5">
        <a href="" class="btn btn-sm btn-danger print_btn"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
    </div>
    <div class="row" id="certificate">
        <div class="col-md-1"></div>
        <div class="parent col-md-10  mt-5" >
            {{--  <p>This is div</p>  --}}
            <div  class="elder_child" style="padding: 10px;background-image: url({{asset('assets/img/certificateBg.png')}});">
                   <div class="row" >
                        <div class="col-md-12 text-center m-2">
                            <p > Govt. of the peoples  Republic Bagladesh TEchnical Education Board AFfiliated Institution</p>
                            <h1 style="font-weight: 500;">DEWAN ICT INSTITUTE </h1>
                            <H4 style="font-weight: bold;" class="text-danger">Institute Code : 50679</H4>
                            <p style="font-weight: bold">Address : 20-21, 374, Mukto Bangla Complex <br>
                                (3rd & 4th Floor) Mirpur-1, Dhaka-1216, Bangladesh</p>

                                <div class="btn btn-danger" style="margin-top:50px;margin-bottom:100px;">ACADEMIC TRANSCRIPT</div>
                        </div>

                        <div class="col-md-7 mx-auto" style="border:2px solid black" >

                            <div class="row mt-2" style="padding: 15px">
                                <div class="col-md-5">
                                    NAME OF STUDENT
                               </div>
                               <div class="col-md-7">
                                   : <span id="s_name" style="font-weight: 800"></span>
                               </div>

                            <div class="col-md-5">
                                FATHER&#8217S NAME
                            </div>
                            <div class="col-md-7">
                                : <span id="f_name"  style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                                MOTHER&#8217S NAME
                            </div>
                            <div class="col-md-7">
                                : <span id="m_name"  style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                               DATE OF BIRTH
                            </div>
                            <div class="col-md-7">
                                : <span id="date_of_birth"  style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                                ID NO.
                            </div>
                            <div class="col-md-7">
                                : <span id="roll_no" style="font-weight: 800></span">
                            </div>
                            <div class="col-md-5">
                            REG NO.
                            </div>
                            <div class="col-md-7">
                                : <span id="reg_no" style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                            NAME OF COURSE
                            </div>
                            <div class="col-md-7">
                                : <span class="course_name" style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                                DURATION OF COURSE
                            </div>
                            <div class="col-md-7">
                                : <span id="course_duration"  style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                               DURATION
                            </div>
                            <div class="col-md-7">
                                : <span id="passing_year"  style="font-weight: 800"></span>
                            </div>
                            <div class="col-md-5">
                               LETTER GRADE
                            </div>
                            <div class="col-md-7">
                                : <span class="letter_grade"  style="font-weight: 800"></span>
                            </div>
                           </div>
                        </div>

                        {{--  mark range   --}}
                        <div class="col-md-4 mx-auto">
                        <table  class="text-center gradig_table"  >
                                <thead>
                                  <tr>
                                    <th style="" width:'25%' scope="col">Range Of Mark</th>
                                    <th   scope="col">Grade</th>
                                    <th  scope="col">Point</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td   >80 to Avobe</td>
                                    <td  >A+</td>
                                    <td  >4.00</td>
                                  </tr>
                                  <tr>
                                    <td   >75 - below 80</td>
                                    <td  >A</td>
                                    <td  >3.75</td>
                                  </tr>
                                  <tr>
                                    <td   >70 - below 75</td>
                                    <td  >A-</td>
                                    <td  >3.50</td>
                                  </tr>
                                  <tr>
                                    <td   >65 - below 70</td>
                                    <td  >B+</td>
                                    <td  >3.25</td>
                                  </tr>
                                  <tr>
                                    <td   >60 - below 65</td>
                                    <td  >B</td>
                                    <td  >3.00</td>
                                  </tr>
                                  <tr>
                                    <td   >55 - below 60</td>
                                    <td  >B-</td>
                                    <td  >2.75</td>
                                  </tr>
                                  <tr>
                                    <td   >50 - below 55</td>
                                    <td  >C</td>
                                    <td  >2.50</td>
                                  </tr>
                                  <tr>
                                    <td   >45 - below 50</td>
                                    <td  >D</td>
                                    <td  >2.00</td>
                                  </tr>
                                  <tr>
                                    <td   > below 40</td>
                                    <td  >F</td>
                                    <td  >0.00</td>
                                  </tr>


                                </tbody>
                              </table>
                        </div>

                        {{--  grade point  --}}
                        <div class="col-md-12" style="margin-top: 50px">
                            <table class="cgpa_table text-center">
                                <thead>
                                    <th>SL NO</th>
                                    <th>COURSE NAEM</th>
                                    <th>POINT</th>
                                    <th>GRADE POINT</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="course_name"></td>
                                        <td id="cgpa"></td>
                                        <td rowspan="3" class="letter_grade"></td>
                                    </tr>
                                    {{--  <tr>
                                        <td>2</td>
                                        <td>Graphics Design </td>
                                        <td>4.00</td>

                                    </tr>  --}}
                                </tbody>
                            </table>
                        </div>


                   </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>



</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // insert data
        $('#search_form').submit(function(e) {
            e.preventDefault();
            let insert_data = new FormData($('#search_form')[0]);
            $.ajax({
                type: 'post',
                url: "{{route('student.result.search')}}",
                data: insert_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.success){
                        $('#student_result').removeClass('d-none');
                        $('#invalid_reg').addClass('d-none');
                        $('#s_name').text(response.success.s_name);
                        $('#m_name').text(response.success.m_name);
                        $('#f_name').text(response.success.f_name);
                        $('#course_name').text(response.success.course_name);
                        $('#course_duration').text(response.success.course_duration);
                        $('#passing_year').text(response.success.passing_year);
                        $('#institute_name').text(response.success.institute);
                        $('#institute_code').text(response.success.institute_code);
                        $('#roll_no').text(response.success.roll_no);
                        $('#reg_no').text(response.success.reg_number);
                        $('#cgpa').text(response.success.cgpa);
                    }
                    if(response.invalid){
                        $('#invalid_reg').text(response.invalid);
                    }
                }
            });
        });

        $(document).on('keyup', '#search_by_reg_no', function(e){
            e.preventDefault();
            var reg_no = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{route('student.result.search_by_keyup')}}",
                data: {'reg_no':reg_no},
                success: function(response) {
                    console.log(response)
                    if(response.success){
                        $('#student_result').removeClass('d-none');
                        $('#invalid_reg').addClass('d-none');
                        $('#s_name').text(response.success.s_name);
                        $('#m_name').text(response.success.m_name);
                        $('#f_name').text(response.success.f_name);
                        $('.course_name').text(response.success.course_name);
                        $('#course_duration').text(response.success.course_duration);
                        $('#passing_year').text(response.success.passing_year);
                        $('#institute_name').text(response.success.institute);
                        $('#date_of_birth').text(response.success.date_of_birth);
                        $('#roll_no').text(response.success.roll_no);
                        $('#reg_no').text(response.success.reg_number);
                        $('#cgpa').text(response.success.cgpa);

                        if(response.success.cgpa == 4 ) {
                            $('.letter_grade').text('A+');
                        }
                        else if(response.success.cgpa < 4 && response.success.cgpa >=3.75){
                            $('.letter_grade').text('A');
                        }
                        else if(response.success.cgpa <3.75 && response.success.cgpa >=3.50){
                            $('.letter_grade').text('A-');
                        }
                        else if(response.success.cgpa <3.50 && response.success.cgpa >=3.25){
                            $('.letter_grade').text('B+');
                        }
                        else if(response.success.cgpa <3.25 && response.success.cgpa >=3){
                            $('.letter_grade').text('B');
                        }
                        else if(response.success.cgpa <3 && response.success.cgpa >=2.75){
                            $('.letter_grade').text('B-');
                        }
                        else if(response.success.cgpa <2.75 && response.success.cgpa >=2.50){
                            $('.letter_grade').text('C');
                        }
                        else if(response.success.cgpa <2.50 && response.success.cgpa >=2){
                            $('.letter_grade').text('D');
                        }
                        else{
                            $('.letter_grade').text('F');
                        }
                    }
                    if(response.invalid){
                        $('#invalid_reg').text(response.invalid);
                        $('#student_result').addClass('d-none');
                    }
                }
            });
            });

            $(document).on('click', '.print_btn', function(e){
                e.preventDefault();
                $("#certificate").print({
                     //Use Global styles
                     globalStyles : true,
                     //Add link with attrbute media=print
                     mediaPrint : false,
                     //Custom stylesheet
                     stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                     //Print in a hidden iframe
                     iframe : false,
                     //Don't print this
                     noPrintSelector : ".avoid-this",
                     //Add this at top
                     prepend : "",
                     //Add this on bottom
                     append : "",
                     pageTitle:"Dewan ICT",
                     //Log to console when printing is done via a deffered callback
                     deferred: $.Deferred().done(function() { console.log('Printing done', arguments);
                })

            });
            });


    });
</script>
@endsection
