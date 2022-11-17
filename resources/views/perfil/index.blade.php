@extends('layouts.app')

@section('titulo')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
        @csrf
     <div class="mb-5">
        <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username
        </label>
        <input
        id="username"
        name="username"
        placeholder="Repite tu password "
        class="border p-3 w-full rounded-lg @error('password_confirmation') bg-red-500 @enderror"
        type="text"
        value="{{ auth()->user()->username }}"
        >
              @error('username')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>
     <div class="mb-5">
        <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil
        </label>
        <input
        id="imagen"
        name="imagen"
        
        class="border p-3 w-full rounded-lg"
        type="file"
        value=""
        accept=".jpg,.png,.jpeg"
        >
    </div>
    <div class="mb-5">
        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email
        </label>
        <input
        id="email"
        name="email"
        placeholder="Tu email de registro"
        class="border p-3 w-full rounded-lg @error('email') bg-red-500 @enderror"
        type="email"
        value={{auth()->user()->email}}
        >
        @error('email')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

     <div class="mb-5">
        <label for="current_password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña Actual
        </label>
        <input
        id="current_password"
        name="current_password"
        placeholder="Tu Contraseña Actual"
        class="border p-3 w-full rounded-lg @error('current_password') bg-red-500 @enderror"
        type="password"
        >
          @error('current_password')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

 <div class="mb-5">
        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña Nueva
        </label>
        <input
        id="password"
        name="password"
        placeholder="Tu Contraseña nueva"
        class="border p-3 w-full rounded-lg @error('password') bg-red-500 @enderror"
        type="password"
        >
          @error('password')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>
      <div class="mb-5">
        <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña Nueva
        </label>
        <input
        id="password_confirmation"
        name="password_confirmation"
        placeholder="Repite Tu Contraseña Nueva "
        class="border p-3 w-full rounded-lg @error('password_confirmation') bg-red-500 @enderror"
        type="password"
        >
              @error('password_confirmation')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>
    
  <input
  type="submit"
  value="Guardar Cambios"
  class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
        </form>
    </div>
</div>

@endsection

