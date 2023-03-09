<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\TweetRetweetsWereUpdated;
use App\Events\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetRetweetController extends Controller
{
    public function store(Tweet $tweet, Request $request) {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::RETWEET,
            'original_tweet_id' => $tweet->id
        ]);

        TweetWasCreated::dispatch($retweet);
        TweetRetweetsWereUpdated::dispatch($request->user(), $tweet);
    }

    public function destroy(Tweet $tweet, Request $request) {
        $tweet->retweetedTweet()->where('user_id', $request->user()->id)->delete();
    }
}
