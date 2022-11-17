@extends('layouts.app')

@section('titulo')
Inicia  sesión En Instagran
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center" >
<div class="md:w-6/12 p-5 ">
<img src="{{asset('img/login.jpg')}}" alt="Imagen Registro de Usuario">
</div>

<div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
<form  method="POST" action="{{ route('login') }}" novalidate>
@csrf
   
    @if(session('mensaje'))
     
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
   
    @endif

       <div class="mb-5">
        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email
        </label>
        <input
        id="email"
        name="email"
        placeholder="Tu email de registro"
        class="border p-3 w-full rounded-lg @error('email') bg-red-500 @enderror"
        type="email"
        value={{old('email')}}
        >
        @error('email')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>
       <div class="mb-5">
        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña
        </label>
        <input
        id="password"
        name="password"
        placeholder="Tu password "
        class="border p-3 w-full rounded-lg @error('password') bg-red-500 @enderror"
        type="password"
        >
          @error('password')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-5">
    <input type="checkbox" name="remember"/> <label class=" text-gray-500 text-sm">Mantener mi sesión abierta</label>

    </div>
  <input
  type="submit"
  value="Iniciar Sesión"
  class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
    
</form>
</div>

</div>


@endsection