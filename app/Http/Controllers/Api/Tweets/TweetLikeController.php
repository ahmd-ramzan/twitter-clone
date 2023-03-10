<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\TweetLikesWereUpdated;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet, Request $request) {
        if ($request->user()->hasLiked($tweet)) {
            return response(null, 409);
        }

        $request->user()->likes()->create([
            'tweet_id' => $tweet->id
        ]);

        TweetLikesWereUpdated::dispatch($request->user(), $tweet);
    }

    public function destroy(Tweet $tweet, Request $request) {
        $request->user()->likes->where('tweet_id', $tweet->id)->first()->delete();
        TweetLikesWereUpdated::dispatch($request->user(), $tweet);
    }
}
