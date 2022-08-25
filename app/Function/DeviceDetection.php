<?php

namespace App\Function;

use DeviceDetector\DeviceDetector;
use Illuminate\Http\Request;

class DeviceDetection
{
    public static function getDeviceName(Request $request): string{
        $dd = new DeviceDetector($request->userAgent());
        $device= $dd->getDeviceName();

        return ($device == '') ? 'Unknown' : $device;
    }

}

