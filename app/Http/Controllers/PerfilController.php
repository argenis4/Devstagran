<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request )
    {

    

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id . '', 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => ['required', 'unique:users,email,' . auth()->user()->id . '', 'email', 'max:60'],
          //  'current_password' => 'min:6',
         //   'password' => 'confirmed|min:6',
        ]);

         $usuario = User::find(auth()->user()->id);

        if ($request->current_password) { 
  if ( Hash::check($request->current_password, auth()->user()->password)) {

       $this->validate($request, [
          'password' => 'confirmed|min:6',
        ]);

         $usuario->password = hash::make($request->password);
    }
          
        }

        if ($request->imagen) {
            $imagen = $request->file('imagen');


            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            //asiganmos un tamaño cuadrado para todas las imagenes 1000x 1000
            $imagenServidor->fit(1000, 1000);

            // se va a subir a perfiles
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            // se guardar imagen  a perfiles
            $imagenServidor->save($imagenPath);
        }


        // Guardar Cambios

        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        // redirecionar
        return redirect()->route('posts.index', $usuario->username);
    }
}
