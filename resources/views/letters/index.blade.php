@extends('layouts.index')

@section('content')
<br>
<a href="{{ route('letters.create') }}"><button type="submit" class="btn btn-primary" style="float:right; margin-bottom:2rem;">Tambah Data Surat</button></a>
<table class="table table-striped table-bordered table-hover">
  <center>
  <thead>
      <tr class="text-center">
          <th>No</th>
          <th>Kode Surat</th>
          <th>perihal</th>
          <th>Tanggal keluar</th>
          <th>Penerima surat</th>
          <th>Notulis</th>
          <th>Hasil Rapat</th>
          <th class="text-center">Aksi</th>
      </tr>
  </thead>
  
    @php $no = 1 @endphp
    @foreach ($letters as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['letter_type_id']}}</td>
            <td>{{ $item['letter_perihal']}}</td>
            <td>{{ $item['recipients'] }}</td>
            <td>{{ $item['content'] }}</td>
            <td>{{ $item['attachment'] }}</td>
            <td>{{ $item['meeting_minutes_status']}}</td>
            <td class="d-flex justify-content-center">
              <a href="{{ route('letters.edit', ['id' => $item['id']]) }}" class="btn btn-primary me-3">Edit</a>
              <form action="{{ route('letters.delete', $item['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="sumbit" class="btn btn-danger">Hapus</button>
            </form>
            </td>
          </tr>
  <tbody>
      @endforeach
  </tbody>
</table>
@endsection
