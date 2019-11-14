<?php

namespace App\Helpers;

use Image;

class ImageResize
{
    public static function Reduce($image)
    {
        $imagePath = public_path('storage/' . $image);
        $imageResize = Image::make($imagePath)->resizeCanvas(800, 600, 'center', false, '808080', function ($constraint) {
            $constraint->aspectRatio();
        });

        $imageResize->save($imagePath);
    }
}
