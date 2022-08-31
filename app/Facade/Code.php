<?php

namespace App\Facade;

use App\Facade\Accessor\CodeFacadeAccessor;
use Illuminate\Support\Facades\Facade;

class Code extends Facade
{

    protected static function getFacadeAccessor()
    {
        return CodeFacadeAccessor::class;
    }

}
