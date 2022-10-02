
@extends('layouts.master')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Course</h1>
    </div>

    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5> Add New Course</h5>
                </div>
                <div class="card-body p-5">

                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" name="name" class="form-control" id="name" >
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Last Name</label>
                            <input type="text" name="code" class="form-control" id="code" >
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection