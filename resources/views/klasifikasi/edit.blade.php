@extends('layouts.index')

@section('content')
<br>
<form action="{{ route('klasifikasi.update', $letterType['id']) }}" method="post" class="card p-5">
    @csrf
    @method('PATCH')

    @if($errors->any())
    <ul class="alert alert-danger p-3">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>   
        @endforeach
    </ul>
    @endif

    <div class="mb-3 row">
        <label for="letter_coe" class="col-sm-2 col-form-label">Kode Surat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="letter_code" name="letter_code" value="{{ $letterType['letter_code"'] }}">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="name_type" class="col-sm-2 col-form-label">Klasifikasi</label>
        <div class="col-sm-10">
            <input type="name_type" class="form-control" id="name_type" name="name_type" value="{{ $letterType['name_type'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>

@endsection