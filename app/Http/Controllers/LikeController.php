<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Pemeriksaan apakah pengguna sudah menyukai tweet tersebut
        $existingLike = Like::where('tweet_id', $request->tweet_id)
        ->where('user_id', Auth::user()->id)
        ->first();

        if ($existingLike) {
            // Jika sudah menyukai, hapus like
            $existingLike->delete();
            $likeCount = Like::where('tweet_id', $request->tweet_id)->count();
    
            // Mengembalikan respons JSON
        return redirect()->back();
        }
    
        // Jika belum menyukai, simpan data pada tabel 'liked'
        Like::create([
            'tweet_id' => $request->tweet_id,
            'user_id' => Auth::user()->id    
        ]);
        // Redirect atau kembalikan respons sesuai kebutuhan Anda
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
