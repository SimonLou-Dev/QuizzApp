<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\AnswerOption;
use App\Models\question;
use App\Models\QuestionOption;
use App\Models\Topic;
use App\Models\TopicTry;
use App\Policies\AnswerOptionPolicy;
use App\Policies\AnswerPolicy;
use App\Policies\QuestionOptionPolicy;
use App\Policies\questionPolicy;
use App\Policies\TopicPolicy;
use App\Policies\TopicTryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Topic::class => TopicPolicy::class,
        question::class => questionPolicy::class,
        QuestionOption::class => QuestionOptionPolicy::class,
        TopicTry::class => TopicTryPolicy::class,
        Answer::class => AnswerPolicy::class,
        AnswerOption::class => AnswerOptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
