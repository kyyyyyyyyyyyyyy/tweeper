<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::latest()->get();
    
        // Ambil jumlah komentar untuk setiap tweet
        $commentCounts = DB::table('comments')
            ->select('tweet_id', DB::raw('count(*) as comment_count'))
            ->groupBy('tweet_id')
            ->get()
            ->pluck('comment_count', 'tweet_id');
    
        return view('tweeper', compact('tweets', 'commentCounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Tweet::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('tweets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::find($id);
        return view ('post',
        ['tweet' => $tweet],
        ['comments' => Comment::where('tweet_id', $id)->latest()->get()]
    );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('comment', [
            'tweet' => Tweet::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tweet = Tweet::findOrFail($id);
        $user = auth()->user();
    
        if ($user->hasLiked($tweet)) {
            $user->unlike($tweet);
            $liked = false;
        } else {
            $user->like($tweet);
            $liked = true;
        }
    
        return response()->json(['liked' => $liked]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
