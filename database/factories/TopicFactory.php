<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    protected $model = Topic::class;

    private $timed = ["false", 'question', 'topic'];

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'random_order' => $this->faker->boolean,
            'display_result' => $this->faker->boolean,
            'timed' => $this->timed[array_rand($this->timed)],
            'correction_available' => $this->faker->dateTime->format('Y-m-d H:i'),
            'can_retry' => $this->faker->boolean,
            'negative_point' => $this->faker->boolean,
            'public' => $this->faker->boolean,
            'ended_at' => $this->faker->dateTime->format('Y-m-d H:i'),
            'validate' => false,
            'validated_by' => null,
            'timer' => $this->faker->numberBetween(1, 10),
        ];
    }
}
