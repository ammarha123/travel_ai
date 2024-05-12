@extends('layout.admin')

@section('title', 'Discover Cities')

@section('content')
<div class="container">
    <h2>Discover Cities</h2>
    <a href="{{ route('discover.create') }}" class="btn btn-primary mb-3">Add New City</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Slang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->image }}</td>
                <td>{{ $city->description }}</td>
                <td>{{ $city->slang }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('discover.edit', $city->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    
                    <!-- Delete Button -->
                    <form id="deleteForm-{{ $city->id }}" action="{{ route('discover.destroy', $city->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $city->id }})">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(cityId) {
        if (confirm('Are you sure you want to delete this city?')) {
            document.getElementById('deleteForm-' + cityId).submit();
        }
    }
</script>
@endsection
