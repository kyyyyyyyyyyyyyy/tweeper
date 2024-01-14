    <div class="col-2">
        {{-- <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-circle tweet-avatar"> --}}
        @if(!empty($tweet->user->image))
            @php
                $path = 'image/' . $tweet->user->image;
                $url = asset($path);
            @endphp
            <img src="{{ $url }}" alt="User Avatar" class="rounded-circle tweet-avatar">
        @else
            <img src="https://via.placeholder.com/50" alt="User Avatar" class="rounded-circle tweet-avatar">
        @endif
    </div>

    <div class="col-10" ondblclick="redirectToDetail({{ $tweet->id }})">
        <h5>{{ $tweet->user->name }}</h5>
        <p>{{ $tweet->content }}</p>
        <div class="row">
            <div class="col-4">
                <a href="tweets/{{ $tweet->id }}" class="like-button"><i class="bi bi-heart"></i> 125</a>
            </div>
            <div class="col-4">
                <a href="tweets/{{ $tweet->id }}/edit"><i class="bi bi-chat"></i> {{ $commentCounts[$tweet->id] ?? 0 }}</a>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    function redirectToDetail(tweetId) {
        window.location.href = `/tweets/${tweetId}`;
    };

</script>