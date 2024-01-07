@extends('layouts.index')

@section('content')
<br>
<form action="{{ route('letters.store') }}" method="post" class="card p-5">
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
    <div class="col-md-6">
      <label for="letter_perihal" class="form-label">Perihal</label>
      <input type="text" class="form-control" id="letter_perihal" name="letter_perihal" value="{{ old('letter_perihal') }}">
    </div>
    <br>

    <select class="form-select" id="letter_type_id" name="letter_type_id">
      <option selected>Klasifikasi Surat</option>
      @foreach($letter_types as $item)
         <option value="{{ $item->id }}">{{ $item->name_type }}</option>
      @endforeach
   </select>
   <br>

    <div class="mb-3">
      <label for="content" class="form-label">Lampiram</label>
      <input type="text" class="form-control" id="content" name="content" value="{{ old('content') }}">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Guru:</label>
      @foreach($users as $guru)
          <div class="flex items-center">
              <input type="checkbox" id="recipients{{ $guru->id }}" name="recipients[]" value="{{ $guru->id }}" class="mr-2">
              <label for="recipients{{ $guru->id }}">{{ $guru->name }}</label>
          </div>
      @endforeach
  </div>

      <div class="mb-3">
        <label for="validationTextarea" class="form-label">Lampiram</label>
        <input type="file" class="form-control" aria-label="file example" required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
      </div>
      <br>
      
      <div class="mb-4">
        <label for="user_id" class="form-label">Notulis:</label>
        <select class="form-select" id="user_id" name="user_id">
            <option selected disabled>Notulis</option>
            @foreach($users as $notulis)
                <option value="{{ $notulis->id }}">{{ $notulis->name }}</option>
            @endforeach
        </select>
      </div>
      <br>
      <br>
    
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </form>
@endsection