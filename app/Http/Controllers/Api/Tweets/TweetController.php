<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Tweets\TweetType;

class TweetController extends Controller
{
    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetType::TWEET
        ]));

        TweetWasCreated::dispatch($tweet);
    }
}
