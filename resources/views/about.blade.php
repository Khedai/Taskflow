{{-- Use main layout file --}}
@extends('layout')

{{-- content section --}}
@section('content')
<div class="container my-5">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-5">
            {{-- Main heading for the About page --}}
            <h1 class="display-5 fw-bold text-primary">About TaskFlow</h1>
            <p class="col-md-8 fs-4 text-muted">
                TaskFlow is designed to help you manage your daily tasks efficiently.
                Built with simplicity and productivity in mind, it allows you to organize, track,
                and complete your goals seamlessly.
            </p>
            <p class="col-md-8 fs-5 text-secondary">
                Whether you're managing personal projects or collaborating with a team,
                TaskFlow provides the tools you need to stay on top of your workload.
            </p>
            {{-- Button to navigate back to the home page --}}
            <a href="/home" class="btn btn-primary btn-lg mt-3" type="button">Back to Home</a>
        </div>
    </div>
</div>
@endsection
