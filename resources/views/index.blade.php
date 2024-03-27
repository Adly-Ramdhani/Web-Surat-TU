@extends('layouts.index')

@section('container')
 <div class="flex justify-center">
    <h1 class="text-2x1 font-bold">Selamat Dtang{{ Auth::staff()->name }}!</h1>
 </div>
@endsection