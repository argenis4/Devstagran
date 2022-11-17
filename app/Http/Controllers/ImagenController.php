<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){

 $imagen = $request->file('file');


 $nombreImagen = Str::uuid() .".". $imagen->extension();

 $imagenServidor = Image::make($imagen);
 //asiganmos un tamaño cuadrado para todas las imagenes 1000x 1000
 $imagenServidor->fit(1000,1000);

// se va a subir a uploads
$imagenPath = public_path('Uploads').'/'. $nombreImagen;
$imagenServidor->save($imagenPath);
 return response()->json(['imagen'=> $nombreImagen]);


    }
    //
}
