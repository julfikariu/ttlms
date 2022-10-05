
@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Assign Student To Course</h1>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5> Assign Student</h5>
                </div>
                <div class="card-body p-5">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('add-course-student-save') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $id }}">

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Course Price</label>
                            <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror">
                                <option value="{{ null }}">Select Student</option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
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