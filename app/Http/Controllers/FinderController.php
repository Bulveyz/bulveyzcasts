<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class FinderController extends Controller
{
    public function load($folder, $subfolder, $filename)
    {
        $path = storage_path('app/'.$folder .'/'. $subfolder .'/'. $filename);

        if (!File::exists($path)) {
            abort(404);
        }


        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
