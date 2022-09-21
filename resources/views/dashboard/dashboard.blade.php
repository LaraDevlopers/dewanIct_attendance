@extends('layouts.master')
@section('title')
Dashboard
@endsection

@section('styles')
<style>
    .eaBhby {
        width: 160px;
        height: 150px;
        margin: 18px 10px 5px;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        position: relative;
        display: inline-block;
        background-color: initial;
        border: none;
        font-size: inherit;
    }

    .rounded {
        border-radius: 0.42rem !important;
    }

    .border {
        border: 1px solid #ff9b44 !important;
    }

    .shortcuts-title {
        color: black;
        font-weight: bolder;
    }
</style>

@section('content')
<div class="content container-fluid">




    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Set Up</h3>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('result.index') }}" style="position:relative;"
                                class="sc-gPEVay eaBhby border rounded  ">
                                <div style=""><i
                                        style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                        class="fa fa-home fa-3x"></i></div>
                                <div style="margin-top:15px " class="shortcuts-title  text-black">Student Result</div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('course.session.index') }}" style="position:relative;"
                                class="sc-gPEVay eaBhby border rounded  ">
                                <div style=""><i
                                        style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                        class="fa fa-home fa-3x"></i></div>
                                <div style="margin-top:15px " class="shortcuts-title  text-black">Course Sssion</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
