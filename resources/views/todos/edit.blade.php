@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit ToDo</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $todo->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $todo->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $todo->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection