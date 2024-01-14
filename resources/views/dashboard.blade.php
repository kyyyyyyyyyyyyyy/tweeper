<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Twitter-like Mobile UI</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .tweet-form {
            border-bottom: 1px solid #dee2e6;
            padding: 10px;
        }

        .tweet {
            border-bottom: 1px solid #dee2e6;
            padding: 15px;
        }

        .tweet-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Twitter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Tweet Form -->
    <div class="row tweet-form">
        <div class="col-2">
            {{-- <img src="" alt="Your Avatar" class="rounded-circle tweet-avatar"> --}}
            @if(!empty(Auth::user()->image))
            @php
                $path = 'image/' . Auth::user()->image;
                $url = asset($path);
            @endphp
            <img src="{{ $url }}" alt="User Avatar" class="rounded-circle tweet-avatar">
            @else
            <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-circle tweet-avatar">
            @endif
        </div>
        <div class="col-10">
            <form action="{{ route('tweets.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content" placeholder="What's happening?"></textarea>
                </div>
                <button type="submit"  class="btn btn-primary">Tweet</button>
            </form>
        </div>
    </div>

    <!-- Tweets -->
    <div class="row tweet mb-3">
        @foreach($tweets as $tweet)
        @include('layouts.tweet')
        @endforeach
    </div>


    <!-- More tweets go here... -->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    
</script>

</body>
</html>
