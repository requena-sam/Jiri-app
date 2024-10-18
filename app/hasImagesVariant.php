<?php

namespace App;

use App\Http\Requests\ContactStoreRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

trait hasImagesVariant
{
    static public function imageStoreVariant(ContactStoreRequest $request): string
    {
        $path = $request->file('image')->store('images');
        $avatar = $request->file('image');
        $image = Image::read($avatar);

        //Récupérer les tailles d'images
        $sizes = Config::get('images.sizes');
        //Boucler sur les tailles d'images
        foreach ($sizes as $size => $value) {
            if (!is_int($value)) {
                continue;
            }
            //Créer un nom de fichier pour chaque taille
            $directory = public_path('storage/contacts/' . Auth::id() . '/' . $size . '/');
            //Verifie que le dossier existe
            if (!file_exists($directory)) {
                File::MakeDirectory($directory, 0775, true);
            }
            $image->cover($value, $value)->save($directory . $value . '-' . $avatar->hashName());
        }
        return $path;
    }
}
