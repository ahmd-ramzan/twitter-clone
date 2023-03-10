<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use Illuminate\Http\Request;

class TimeLineController extends Controller
{
    public function index(Request $request)
    {
        $tweets = $request->user()->tweetsFromFollowing()->latest()->with(['user', 'likes'])->paginate(8);

        return new TweetCollection($tweets);
    }
}
