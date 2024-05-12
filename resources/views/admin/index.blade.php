@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="me-md-3 me-xl-5">
            <h2>Welcome back, {{ Auth::user()->name }}</h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
            <a href="{{ url('/') }}" class="btn btn-dark my-2 text-white">View User Page</a>
            <hr>
            <h2 class="text-end me-md-3"></h2>
        </div>
        
        <div class="row me-md-3 me-xl-5">
            <div class="col-md-3">
                <div class="card card-body bg-dark text-white mb-3">
                    <label class="mb-3">Total Discover</label>
                    <h1>3</h1>
                    <a href="{{ route('admin.discover.index') }}" class="text-white text-decoration-none">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3">
                    <label class="mb-3">Total User</label>
                    <h1>21</h1>
                    <a href="{{ url('admin/dashboard/user') }}" class="text-white text-decoration-none">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label class="mb-3">Total Message</label>
                    <h1>4</h1>
                    <a href="{{ url('admin/dashboard/message') }}" class="text-white text-decoration-none">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label class="mb-3">Total FAQ</label>
                    <h1>3</h1>
                    <a href="{{ url('admin/dashboard/support-center') }}" class="text-white text-decoration-none">View</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
