@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Team Member</h4>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('team_members.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="employee_id">Employee ID</label>
                    <input type="text" class="form-control border border-dark" name="employee_id" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control border border-dark" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="post">Post</label>
                    <input type="text" class="form-control border border-dark" name="post" required>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control border border-dark">
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
