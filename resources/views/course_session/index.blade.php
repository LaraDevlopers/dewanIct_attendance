@extends('layouts.master')
@section('title')
student course_session store
@endsection

@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">All course_sessions</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">course_sessions</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#insert"><i
                        class="fa fa-plus"></i> ADD NEW</a>
            </div>

        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div>
                <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center">
                    <thead>
                        <tr>
                            <th style="width: 30px;">#</th>
                            <th>Session Start</th>
                            <th>Session End</th>
                            <th>Session</th>
                            <th>Duration</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course_sessions as $course_session)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                             <td>{!! date('d M Y', strtotime($course_session->course_session_start)) !!}</td>
                             <td>{!! date('d M Y', strtotime($course_session->course_session_end)) !!}</td>
                             <td>{!! date('d M Y', strtotime($course_session->course_session_start)) !!} - {!! date('d M y', strtotime($course_session->course_session_end)) !!}</td>

                             @if($diff = Carbon\Carbon::parse($course_session->course_session_start)->diffInMonths($course_session->course_session_end) >=12 && $diff = Carbon\Carbon::parse($course_session->course_session_start)->diffInMonths($course_session->course_session_end)%12 == 0)
                                 <td>{{ $diff = Carbon\Carbon::parse($course_session->course_session_start)->diffInMonths($course_session->course_session_end)/ 12 }}  <span>Year</span></td>
                                @else
                                <td>{{ $diff = Carbon\Carbon::parse($course_session->course_session_start)->diffInMonths($course_session->course_session_end) }}  <span>Month</span></td>
                             @endif

                           <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a id="{{ $course_session->id }}" class="dropdown-item edit" href="#"
                                                data-toggle="modal" data-target="#edit"><i
                                                    class="fa fa-pencil m-r-5"></i>
                                                Edit</a>
                                            <a id="{{ $course_session->id }}" class="dropdown-item delete" href="#"
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
</div>




<div id="insert" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit course_sessions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="insert_form">
                    @csrf
                    <div class="form-group">
                        <label>Course Session Start <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="course_session_start" id="course_session_start">
                        <span class="text-danger error course_session_start_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Course Session End <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="course_session_end" id="course_session_end">
                        <span class="text-danger error course_session_end_error"></span>
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
                <h5 class="modal-title">Edit course_sessions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_form">
                    @csrf
                    <input type="hidden" name="edit_id" value="" id="edit_id">
                    <div class="form-group">
                        <label>Course Session Start <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="course_session_start" id="edit_course_session_start">
                        <span class="text-danger error course_session_start_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Course Session End <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="course_session_end" id="edit_course_session_end">
                        <span class="text-danger error course_session_end_error"></span>
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
                    <h3>Delete course_sessions</h3>
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
                url: "{{ route('course.session.store') }}",
                data: insert_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $('#insert').modal('hide');
                        $('#insert_form').find('input').val('');
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
                url: "{{ route('course.session.show') }}",
                data: {
                    'id': id
                },
                success: function(response) {
                    $('#edit_course_session_name').val(response.course_session.course_session_name);
                    $('#edit_course_session_mark').val(response.course_session.course_session_mark);
                    $('#edit_ClassModel_id option[value=' + response.course_session.ClassModel_id +
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
                url: "{{ route('course.session.update') }}",
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
                url: "{{ route('course.session.delete') }}",
                data: {
                    'id': id
                },
                success: function(response) {
                    if(response.success){

                        $('#delete').modal('hide');
                        $('#delete').find('input').val('');
                        toastr.success(response.success);
                        $('#data_table').load(location.href + ' #data_table');
                    }
                }
            });
        });
        //serch using class
        $(document).on('change', '#class_box',function(){
            var id = $(this).val();
            $.ajax({
                type:'get',
                url:"{{route('course.session.search')}}",
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
