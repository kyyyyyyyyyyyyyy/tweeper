
@if(request()->routeIs('tweets.edit'))
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

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
                <form action="{{ route('liked.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                    <button class="btn btn-link">
                        @if(isset($likeCounts[$tweet->id]) && $likeCounts[$tweet->id] > 0)
                        <i class="bi bi-heart-fill"></i>
                        @else
                        <i class="bi bi-heart"></i>
                        @endif
                        {{ $likeCounts[$tweet->id] ?? 0 }} 
                    </button>
                </form>
            </div>
            <div class="col-4">
                <i class="bi bi-chat"></i> {{ $commentCounts[$tweet->id] ?? 0 }}
            </div>
        </div>
    </div>

@else

    @if(request()->routeIs('dashboard'))
    

    @endif

@endif
