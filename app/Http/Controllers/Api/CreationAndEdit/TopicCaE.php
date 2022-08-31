<?php

namespace App\Http\Controllers\Api\CreationAndEdit;

use App\Facade\Code;
use App\Facade\Notify;
use App\Http\Controllers\Controller;
use App\Http\Request\Creation\CreateValidatorRequest;
use App\Http\Request\Creation\UpdateValidatorRequest;
use App\Models\Topic;

class TopicCaE extends Controller
{

    public function createTopic(CreateValidatorRequest $request)
    {

        $topic = new Topic();
        $topic->title = $request->validated('title');
        $topic->description = $request->validated('description');
        $topic->random_order = (bool)$request->validated('random_order');
        $topic->display_result = (bool)$request->validated('display_result');
        $topic->timed = $request->validated('timed');
        $topic->correction_available = $request->validated('correction_available');
        $topic->can_retry = (bool)$request->validated('can_retry');
        $topic->negative_point = (bool)$request->validated('negative_point');
        $topic->public = (bool)$request->validated('public');
        $topic->ended_at = $request->validated('ended_at');
        $topic->user_id = $request->user()->id;
        $topic->save();

        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' - 5 seconds'));

        $topic = Topic::where('user_id', $request->user()->id)->where('created_at', '>', $date)->first();


        $topic->code = Code::generateTopicCode($topic->id);
        $topic->save();

        Notify::newTopicCreated($topic->code);

        return response()->json([
            'topic' => $topic
        ], 201);
    }

    public function updateTopic(string $code, UpdateValidatorRequest $request)
    {
        dd('ici');

        $topic = Topic::where('code', $code)->first();

        $this->authorize('update', $topic);

        $topic->title = $request->validated('title');
        $topic->description = $request->validated('description');
        $topic->random_order = (bool)$request->validated('random_order');
        $topic->display_result = (bool)$request->validated('display_result');
        $topic->timed = $request->validated('timed');
        $topic->correction_available = $request->validated('correction_available');
        $topic->can_retry = (bool)$request->validated('can_retry');
        $topic->negative_point = (bool)$request->validated('negative_point');
        $topic->public = (bool)$request->validated('public');
        $topic->ended_at = $request->validated('ended_at');
        $topic->user_id = $request->user()->id;
        $topic->save();

        return response()->json([
            'topic' => $topic
        ], 201);
    }

    public function deleteTopic(string $code)
    {
        $topic = Topic::where('code', $code)->first();

        $this->authorize('update', $topic);

        //TODO : delete all questions and answers associated to the topic

        $topic->delete();
        return response()->json([
            'topic' => $topic
        ], 204);
    }


}
