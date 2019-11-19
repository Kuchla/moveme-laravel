<?php

namespace App\Helpers;

class DeleteImage
{
   public static function unlink($image_path)
   {
        unlink(storage_path('app/public/'.$image_path));
   }
}
