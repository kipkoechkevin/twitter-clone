<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Inertia::render('Welcome', [
            'tweets' => Tweet::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = null;
        $extension = null;
        $fileName = null;
        $path = null;

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png,mp4|max:2048'
            ]);

            $extension = $file->getClientOriginalExtension();

            $fileName = time() . '.' . $extension;

            $extension === 'mp4' ? $path = '/videos/' : $path = '/pics/';
        }

        $tweet = new Tweet;

        $tweet->name = 'Kevin Koech';
        $tweet->handle = '@kevinkoech';
        $tweet->image = 'https://pbs.twimg.com/profile_images/1412724388397824000/5Q2Z3X8-_400x400.jpg';
        $tweet->tweet = $request->input('tweet');
        if ($fileName) {

            $tweet->file = $path . $fileName;
            $tweet->is_video = $extension === 'mp4';
            $file->move(public_path() . $path, $fileName);
        }
        $tweet->comments = rand(10, 9000);
        $tweet->retweets = rand(10, 9000);
        $tweet->likes = rand(10, 9000);
        $tweet->analytics = rand(10, 9000);

        $tweet->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $tweet = Tweet::find($id);

       if(!is_null($tweet->file) && file_exists(public_path() . $tweet->file)) {
           unlink(public_path() . $tweet->file);
       }

       $tweet->delete();

       return redirect()->route('tweets.index');
    }
}
