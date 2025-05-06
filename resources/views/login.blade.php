{{--main layout file --}}
@extends('layout')

{{--content section --}}
@section('content')
{{-- Apply specific body styling for the login page --}}
<body class="py-4 bg-body-tertiary">

<main class="d-flex align-items-center form-signin w-100 m-auto ms-5 ps-5">
  {{-- Login form --}}
  <form class="ms-5">
    <img class="mb-4" src="images/bootstrap_logo.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    {{-- Email input field --}}
    <div class="form-floating mb-2">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    {{-- Password input field --}}
    <div class="form-floating mb-2" >
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" fdprocessedid="9k30mo">
      <label for="floatingPassword">Password</label>
    </div>

    {{-- "Remember me" checkbox --}}
    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
      <label class="form-check-label" for="checkDefault">
        Remember me
      </label>
    </div>
    {{-- Submit button for login --}}
    <button class="btn btn-primary w-100 py-2" type="submit" >Log in</button>
    <p class="mt-5 mb-3 text-body-secondary">© {{ date('Y') }} Company, Inc</p>
  </form>
</main>
<script  src="/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
@endsection
