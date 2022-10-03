
@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Student</h1>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Students</h5>
                </div>
                <div class="card-body p-5">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">first_name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Registration No</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->last_name }}</td>
                                    <td>{{ $student->registration_no }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>

            </div>
        </div>
    </div>
@endsection