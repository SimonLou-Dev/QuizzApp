<?php

namespace Tests\Feature\Api\Auth;

use App\Facade\Code;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\TestUtils;

class TopicCaETest extends TestCase
{
    use WithFaker;

    public function testCreateTopic()
    {

        $topic = Topic::factory()->make();
        $response = $this->postJson('/api/topic', [
            'title' => $topic->title,
            'description' => $topic->description,
            'random_order'=> $topic->random_order,
            'display_result'=> $topic->display_result,
            'timed'=> $topic->timed,
            'correction_available'=> $topic->correction_available,
            'can_retry'=> $topic->can_retry,
            'negative_point'=> $topic->negative_point,
            'public'=> $topic->public,
            'ended_at'=> $topic->ended_at,
            'timer'=> $topic->timer,
        ], TestUtils::getAuthHeader());


        $response->assertStatus(201);
    }

    public function testUpdateTopic(){
        $user = User::factory()->create();
        $user = User::where('email', $user->email)->first();
        $topic = Topic::factory()->for($user)->make();
        $topic->save();
        $topic = Topic::where('user_id', $user->id)->first();
        $topic->code = Code::generateTopicCode($topic->id);
        $topic->save();


        $response = $this->putJson('/api/topic/'.$topic->code, [
            'title' => $topic->title,
            'description' => $topic->description,
            'random_order'=> $topic->random_order,
            'display_result'=> $topic->display_result,
            'timed'=> $topic->timed,
            'correction_available'=> date('Y-m-d H:i', strtotime($topic->correction_available)),
            'can_retry'=> $topic->can_retry,
            'negative_point'=> $topic->negative_point,
            'public'=> $topic->public,
            'ended_at'=> date('Y-m-d H:i', strtotime($topic->ended_at)),
            'timer'=> $topic->timer,
        ], TestUtils::getAuthHeader($user));
        $response->assertStatus(201);
    }
}
