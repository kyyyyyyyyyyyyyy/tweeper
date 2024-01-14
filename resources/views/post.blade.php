<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .profile-cover {
            height: 200px;
            background-color: #1da1f2;
            color: #ffffff;
            text-align: center;
            padding-top: 20px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #ffffff;
            margin-top: -50px;
        }

        .comment {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Twitter</a>
    </nav>

    <!-- Tweets -->
    <div class="row tweet">
        @include('layouts.tweet')
    </div>


    <!-- Comments -->
    @foreach($comments as $comment)
    <div class="comment">
        <div class="row">
            <div class="col-2">
                @if(!empty($tweet->user->image))
                @php
                    $path = 'image/' . $tweet->user->image;
                    $url = asset($path);
                @endphp
                <img src="{{ $url }}" alt="User Avatar" class="rounded-circle tweet-avatar">
                @else
                <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-circle tweet-avatar">
                @endif            </div>
                <div class="col-10">
                <h6>{{ $comment->user->name }}</h6>
                <p>{{ $comment->message }}</p>
            </div>
        </div>
    </div>
    @endforeach

    <!-- More comments go here... -->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
