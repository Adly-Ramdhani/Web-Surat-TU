@extends('layouts.index')

@section('content')
<ul>
    @foreach ($suratTertaut as $surat)
        <li>{{ $surat->judul }}</li>
    @endforeach
</ul>

@endsection