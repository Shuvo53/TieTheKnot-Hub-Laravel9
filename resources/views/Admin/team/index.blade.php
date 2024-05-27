@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Team Members</h4>
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
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Post</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teamMembers as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->employee_id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->post }}</td>
                        <td>
                            @if ($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('team_members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('team_members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
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
