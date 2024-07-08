@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">ToDo List</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New ToDo</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->category->name }}</td>
                        <td>
                            <a href="{{ route('todos.edit', $todo) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection