@extends('layouts.master')
@section('title')
student result store
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

    <div class="row mt-5 d-none" id="student_result">
        <div class="col-lg-3"></div>
        <div class="col-lg-6" >
            <div class="card mb-0" style="background:rgba(212,228,239,.91)">
                <div class="card-header">
                    <a href="" class="btn btn-sm btn-danger print_btn">print</a>
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
                        $('#s_name').val(response.success.s_name);
                        $('#m_name').val(response.success.m_name);
                        $('#f_name').val(response.success.f_name);
                        $('#course_name').val(response.success.course_name);
                        $('#course_duration').val(response.success.course_duration);
                        $('#passing_year').val(response.success.passing_year);
                        $('#institute_name').val(response.success.institute);
                        $('#institute_code').val(response.success.institute_code);
                        $('#roll_no').val(response.success.roll_no);
                        $('#reg_no').val(response.success.reg_number);
                        $('#cgpa').val(response.success.cgpa);
                    }
                    if(response.invalid){
                        $('#invalid_reg').text(response.invalid);
                        $('#student_result').adddClass('d-none');
                    }
                }
            });
            });

            $(document).on('click', '.print_btn', function(e){
                e.preventDefault();
                $(".result_body").print();
     
            })


    });
</script>
@endsection
