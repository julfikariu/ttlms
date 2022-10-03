
@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Student</h1>
    </div>

    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5> Add New Student</h5>
                </div>
                <div class="card-body p-5">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('student.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" >
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" >
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="registration_no" class="form-label">Registration No.</label>
                            <input type="text" name="registration_no" class="form-control @error('registration_no') is-invalid @enderror" id="registration_no" >
                            @error('registration_no')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection