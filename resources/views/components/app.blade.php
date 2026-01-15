<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dev Quest</title>

    {{-- Stlye sheet link --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- bootstrap style link  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- fontawesome link  --}}
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
</head>
<body>
    <nav class=""> 
        <ul>
            @if(Auth::check())
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="">Profile</a></li>
            @endif
            @if(Auth::check())
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0; border: none; background: none; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </li>
            @endif

            @if(! Auth::check())
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0; border: none; background: none; cursor: pointer;">
                        Login
                    </button>
                </form>
            @endif
        </ul>
    </nav>
    {{ $slot  }}

   
    {{-- Bootstrap script link --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    {{-- Jquery Script Link --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>