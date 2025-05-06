{{-- main layout file --}}
@extends('layout')

{{-- content section --}}
@section('content')
<main class="d-flex align-items-center form-signin w-100 m-auto">
  {{-- Registration form --}}
  <form>
    {{-- Logo displayed above the form --}}
    <img class="mb-4 mx-auto d-block" src="images/bootstrap_logo.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal text-center">Create an account</h1>

    {{-- Name input field --}}
    <div class="form-floating mb-2">
      <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
      <label for="floatingName">Name</label>
    </div>
    {{-- Password input field --}}
    <div class="form-floating mb-2">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    {{-- Confirm Password input field --}}
    <div class="form-floating mb-3"> {{-- Increased bottom margin slightly --}}
      <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password">
      <label for="floatingPasswordConfirm">Confirm Password</label>
    </div>

    {{-- Submit button for registration --}}
    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>

    <p class="mt-4 mb-3 text-body-secondary text-center">© {{ date('Y') }} Company, Inc</p>
  </form>
</main>
@endsection
