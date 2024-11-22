{{-- resources/views/owner/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Owner Dashboard</h1>

        <div class="card mt-4">
            <div class="card-header">
                Dashboard
            </div>
            <div class="card-body">
                <h5 class="card-title">Hello, {{ Auth::guard('web')->user()->name }}</h5>
                <p class="card-text">Here you can manage your account and other resources.</p>
                <a href="{{ route('owner.logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="btn btn-primary">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
