<?php

namespace App\Helpers;

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class AccessLevel
{
    public static function isSimpleAdmin()
    {
        $admin = false;
        if (!Auth::guard('admin')->user()->manager){
            $admin = Auth::guard('admin')->user()->id;
        }
        return $admin;
    }
}
