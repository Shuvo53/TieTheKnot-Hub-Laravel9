@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Commercial Project</h4>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('commercial_projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="projectID">Project ID</label>
                    <input type="text" class="form-control border border-dark" name="projectID" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control border border-dark" name="title" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" rows="3" class="form-control border border-dark"></textarea>
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
