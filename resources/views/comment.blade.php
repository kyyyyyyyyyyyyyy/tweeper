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

        .comment {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
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

        .comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Twitter</a>
    </nav>

    <div class="row tweet">
       @include('layouts.tweet')
    </div>

<div class="container-fluid">
    <!-- Comments -->
    <div class="comment">
        <div class="row">
            <div class="col-2">
                @if(!empty(Auth::user()->image))
                @php
                    $path = 'image/' . Auth::user()->image;
                    $url = asset($path);
                @endphp
                <img src="{{ $url }}" alt="User Avatar" class="rounded-circle tweet-avatar">
                @else
                <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-circle tweet-avatar">
                @endif            </div>
            <div class="col-10">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="What's happening?"></textarea>
                    </div>
                    <input type="hidden" name="tweetId" value="{{ $tweet->id }}">
                    <button type="submit" class="btn btn-primary">Tweet</button>
                </form>
            </div>
        </div>
    </div>

    <!-- More comments go here... -->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
