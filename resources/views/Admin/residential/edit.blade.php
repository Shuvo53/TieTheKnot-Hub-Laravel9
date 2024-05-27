@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Residential Project</h4>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('residential_projects.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="projectID">Project ID</label>
                    <input type="text" class="form-control border border-dark" name="projectID" value="{{ $project->projectID }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control border border-dark" name="title" value="{{ $project->title }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" rows="3" class="form-control border border-dark">{{ $project->description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control border border-dark">
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
