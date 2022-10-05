
@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="rounded bg-light p-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h2 text-primary">Total Student</div>
                    <div class="h1 text-info">{{ $total_student }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="rounded bg-light p-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h2 text-primary">Total Course</div>
                    <div class="h1 text-info">{{ $total_course }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection