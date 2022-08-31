<?php

namespace App\Facade\Accessor;

class CodeFacadeAccessor
{

    public function generateTopicCode(string $topicId):string
    {
        return self::generateCode($topicId);
    }

    public function generateTentativeCode(string $topicId, string $userId, int $try = 1):string
    {
        return $topicId . '-' . self::generateTopicCode($userId) . '-' . $try;
    }

    private function generateCode(string $input):string
    {
        $explosedId = explode('-', $input);

        return substr($explosedId[0], 0, 2) . substr($explosedId[1], 0, 1) . substr($explosedId[2], 0, 1) . substr($explosedId[3], 0, 3);
    }

}
