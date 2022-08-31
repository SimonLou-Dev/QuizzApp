<?php

namespace App\Facade;

use App\Facade\Accessor\NotifyFacadeAccessor;
use Illuminate\Support\Facades\Facade;

class Notify extends Facade
{

    protected static function getFacadeAccessor()
    {
       return NotifyFacadeAccessor::class;
    }

}
