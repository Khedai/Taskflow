
{{-- inherit layout code --}}
@extends('layout')

{{-- Main Content Area --}}
@section('content')
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-4 border shadow-lg bg-light">

        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            {{-- Title and paragraph text --}}
            <h1 class="display-4 fw-bold lh-1 text-primary">Welcome to TaskFlow</h1>
            <p class="lead text-muted">Organize your tasks, stay productive, and track progress effortlessly with TaskFlow — your personal task management companion.</p>

            <div class="d-grid gap-3 d-md-flex justify-content-md-start mt-4">
                <a href="/login" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">
                    Log In
                </a>
                <a href="/register" class="btn btn-secondary btn-lg px-4 me-md-2 fw-bold">
                    Sign up
                </a>
            </div>
        </div> 
        {{-- Hero image --}}
        <div class="col-lg-4 p-0 overflow-hidden shadow-lg">
            <img src="images/bootstrap_logo.png" class="rounded-4 img-fluid" alt="TaskFlow Logo" width="100%">
        </div> 
    </div>
</div>
@endsection
