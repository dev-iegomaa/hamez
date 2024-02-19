<?php

namespace App\Http\Traits;

trait ImageTrait
{
    private function uploadImage(object $file, string $path, string $oldImage = null): string
    {
        $imageName = time() . "_$path." . $file->extension();
        if ($oldImage) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path("uploaded/$path"), $imageName);
        return $imageName;
    }
}
