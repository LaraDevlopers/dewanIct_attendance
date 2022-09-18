@extends('layouts.master')
@section('title')
student result store
@endsection

@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">All results</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">results</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn"data-toggle="modal" data-target="#insert"><i
                        class="fa fa-plus"></i> Add results</a>
            </div>

        </div>
    </div>

    <div class="row">
        {{--  <div class=" col-sm-4 form-group form-focus select-focus focused" data-select2-id="select2-data-23-24uk">
            <select id="class_box" class="select floating select2-hidden-accessible" data-select2-id="select2-data-1-nf6t"
                tabindex="-1" aria-hidden="true">
                <option value="view_all">View All</option>
             @foreach ($classes as $class )
             <option value="{{$class->id}}">{{$class->class_name}}</option>

             @endforeach
            </select>
        </div>  --}}
        <div class="col-md-12">
            <div>

                <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center">
                    <thead>
                        <tr>
                            <th style="width: 30px;">#</th>
                            <th>Name</th>
                            <th>Course Name</th>
                            <th>Passing Year</th>
                            <th>Institute</th>
                            <th>CGPA</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $result->s_name }}</td>
                                <td>{{ $result->course_name }}</td>
                                <td>{{ $result->passing_year }}</td>
                                <td>{{ $result->institute }}</td>
                                <td>{{ $result->cgpa }}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a id="{{ $result->id }}" class="dropdown-item edit" href="#"
                                                data-toggle="modal" data-target="#edit"><i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a id="{{ $result->id }}" class="dropdown-item delete" href="#"
                                                data-toggle="modal" data-target="#delete"><i
                                                    class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">

    </div>
</div>


<div id="insert" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="insert_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Student  Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="s_name" id="s_name">
                                <span class="text-danger error s_name_error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Father Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="f_name" id="f_name">
                                <span class="text-danger error f_name_error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mother Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="m_name" id="m_name">
                                <span class="text-danger error m_name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Registration Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="reg_number" id="reg_number">
                                <span class="text-danger error reg_number_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Roll Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="roll_no" id="roll_no">
                                <span class="text-danger error roll_no_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> CGPA <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="cgpa" id="cgpa">
                                <span class="text-danger error cgpa_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Course Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="course_name" id="course_name">
                                <span class="text-danger error course_name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Course Duration <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="course_duration" id="course_duration">
                                <span class="text-danger error course_duration_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Institute Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="institute" id="institute">
                                <span class="text-danger error institute_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Institute Code <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="institute_code" id="institute_code">
                                <span class="text-danger error institute_code_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Passing Year <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="passing_year" id="passing_year">
                                <span class="text-danger error passing_year_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="edit" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_form">
                    @csrf
                    <input type="hidden" name="edit_id" value="" id="edit_id">
                    <div class="form-group">
                        <label>results Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="result_name" id="edit_result_name">

                        <span class="text-danger error result_name_error"></span>

                    </div>
                    <div class="form-group">
                        <label>results Mark <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="result_mark" id="edit_result_mark">
                        <span class="text-danger error result_mark_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Select Class <span class="text-danger">*</span></label>
                        <select class=" form-control" name="ClassModel_id" id="edit_ClassModel_id">
                            {{--  @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach  --}}
                        </select>
                        <span class="text-danger error ClassModel_id_error"></span>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal custom-modal fade" id="delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" name="delete_id" value="" id="delete_id">
                <div class="form-header">
                    <h3>Delete results</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a id="delete_btn" href="javascript:void(0);"
                                class="btn btn-primary continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
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
        $('#insert_form').submit(function(e) {
            e.preventDefault();
            let insert_data = new FormData($('#insert_form')[0]);
            $.ajax({
                type: 'post',
                url: "{{ route('result.store') }}",
                data: insert_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $('#insert').modal('hide');
                        $('#insert').find('input').val('');
                        $('.error').text('');
                        toastr.success(response.success);
                        $('#data_table').load(location.href + ' #data_table');
                    }
                    if (response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                }
            });
        });
        // show data in edit form
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            $('#edit_id').val(id);
            $.ajax({
                type: 'get',
                url: "{{ route('result.show') }}",
                data: {
                    'id': id
                },
                success: function(response) {
                    $('#edit_result_name').val(response.result.result_name);
                    $('#edit_result_mark').val(response.result.result_mark);
                    $('#edit_ClassModel_id option[value=' + response.result.ClassModel_id +
                        ']').attr('selected', 'selected');
                }
            });
        });
        //edit
        $('#edit_form').submit(function(e) {
            e.preventDefault();
            let edit_data = new FormData($('#edit_form')[0]);
            var id = $('#edit_id').val();
            $.ajax({
                type: 'post',
                url: "{{ route('result.update') }}",
                data: edit_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $('#edit').modal('hide');
                        $('#edit').find('input').val('');
                        $('.error').text('');
                        toastr.success(response.success);
                        $('#data_table').load(location.href + ' #data_table');
                    }
                    if (response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                    }
                }
            });
        });
        // add delete id
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            $('#delete_id').val(id);
        });
        // delete
        $(document).on('click', '#delete_btn', function(e) {
            e.preventDefault();
            var id = $('#delete_id').val();
            $.ajax({
                type: 'get',
                url: "{{ route('result.delete') }}",
                data: {
                    'id': id
                },
                success: function(response) {
                    $('#delete').modal('hide');
                    $('#delete').find('input').val('');
                    toastr.success(response.success);
                    $('#data_table').load(location.href + ' #data_table');
                }
            });
        });
        //serch using class
        $(document).on('change', '#class_box',function(){
            var id = $(this).val();
            $.ajax({
                type:'get',
                url:"{{route('result.search')}}",
                data:{'id':id},
                success:function(response){
                    $('#data_table').html(response);
                    if(response.not_found){
                            $('#data_table').html("<span class='text-danger'>" + response
                            .not_found + "</span>");
                    }
                }
            });
        });
    });
</script>
@endsection
