<?php

namespace App\Helpers;

use Carbon\Carbon as CarbonCarbon;
use DateTime;
use Illuminate\Support\Carbon;
use Image;

class FormatDate
{
    public static function dateToPtBr($date)
    {
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $date->format('d/m/Y H:i:s');
    }

    public static function dateDefault($date)
    {
        $date = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $date->format('Y-m-d H:i:s');
    }
}
