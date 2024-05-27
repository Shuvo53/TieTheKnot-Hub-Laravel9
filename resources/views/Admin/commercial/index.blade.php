@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Commercial Projects</h4>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->projectID }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('commercial_projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('commercial_projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
