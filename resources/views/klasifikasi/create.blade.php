@extends('layouts.index')

@section('content')
<br>
    <form action="{{ route('klasifikasi.store') }}" method="post" class="card p-5">
        @csrf

        @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li class="list-style-type:none;">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <div class="mb-3">
            <label for="letter_code" class="form-label">Kode Surat:</label>
            <input type="text" class="form-control" id="letter_code" name="letter_code" value="{{ old('letter_code') }}">
            @error('letter_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Input field for Name Type -->
        <div class="mb-3">
            <label for="name_type" class="form-label">Klasifikasi Surat:</label>
            <input type="text" class="form-control" id="name_type" name="name_type" value="{{ old('name_type') }}">
            @error('name_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection