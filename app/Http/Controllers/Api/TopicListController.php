<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;

class TopicListController extends Controller
{
    public function search()
    {
        //TODO: add algolia and search
    }

    public function list(): JsonResponse
    {



        $topics = Topic::where('public', true)
            ->where('validate', true)
            ->where('ended_at', '>', now())
            ->cursorPaginate();

        return response()->json([
            'topics' => $topics
        ]);
    }

}
