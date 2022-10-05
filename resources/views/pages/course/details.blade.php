
@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Course Detail</h1>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $course->name }} </h5>
                </div>
                <div class="card-body p-5">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        @if($course->students->count()>0)
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Registration No</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($course->students as $student)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->last_name }}</td>
                                    <td>{{ $student->regi_no }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h4> No student found.</h4>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection