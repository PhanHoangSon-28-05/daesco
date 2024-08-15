<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Image;
use Session;
use Illuminate\Support\Facades\File;
use Auth;

class ImageController extends Controller
{

    public function __construct() {}

    public function getImage($folder = null, $size = null, $name = null)
    {

        $url = 'app/public/' . $folder . '/' . $size;
        return $this->getImageStorage($url, $name);
    }


    public function getImageStorage($url, $filename)
    {
        $path = storage_path($url);
        if (!File::exists($path)) {
            return 0;
        }
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
