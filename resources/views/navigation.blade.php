<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="images/bootstrap_logo.png" width="50" class="d-inline-flex link-body-emphasis text-decoration-none">
            
        </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
         {{--If authenticated get dashboard straight--}}
        @auth
            <li><a href="/dashboard" class="nav-link px-2 link-secondary">Dashboard</a></li>
        @else
            <li><a href="/home" class="nav-link px-2 link-secondary">Home</a></li>
        @endauth
        <li><a href="#" class="nav-link px-2">Features</a></li>
        <li><a href="/about" class="nav-link px-2">About</a></li>
    </ul>

    <div class="col-md-3 text-end">
        {{--If authenticated show logout--}}
        @auth
            <form action="/logout" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        @else
            <a href="/login" type="button" class="btn btn-outline-primary me-2">Login</a>
        @endauth
    </div>
</div>
