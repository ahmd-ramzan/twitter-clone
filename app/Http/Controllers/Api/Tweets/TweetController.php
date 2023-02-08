<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;

class TweetController extends Controller
{
    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create($request->only('body'));

        TweetWasCreated::dispatch($tweet);
    }
}
