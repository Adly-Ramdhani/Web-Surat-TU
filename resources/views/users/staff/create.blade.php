@extends('layouts.index')

@section('content')
<br>
    <h6>Tambah Data Staff Tata Usaha</h6>
    <br>
    <form action="{{ route('users.staff.store') }}" method="post" class="card p-5">
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
         
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection