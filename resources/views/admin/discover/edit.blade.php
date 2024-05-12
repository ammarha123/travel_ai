@extends('layout.admin')

@section('title', 'Edit City')

@section('content')
    <div class="container">
        <h2>Edit City</h2>
        <form action="{{ route('discover.update', $city->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $city->image }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $city->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="slang" class="form-label">Slang</label>
                <input type="text" class="form-control" id="slang" name="slang" value="{{ $city->slang }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
