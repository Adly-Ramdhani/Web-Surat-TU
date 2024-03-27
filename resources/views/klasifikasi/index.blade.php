@extends('layouts.index')

@section('content')
<br>
<a href="{{ route('klasifikasi.create') }}"><button type="submit" class="btn btn-primary" style="float:right; margin-bottom:2rem;">Tambah</button></a>
<a href="{{ route('klasifikasi.export-excel') }}" class="btn btn-primary">Export Data (excel)</a>
<table class="table table-striped table-bordered table-hover">
  <thead>
      <tr>
          <th>No</th>
          <th>Kode Surat</th>
          <th>Klasifikasi Surat</th>
          <th>Surat Tertaut</th>
          <th class="text-center">Aksi</th>
      </tr>
  </thead>
  <tbody>
      @php $no = 1 @endphp
      @foreach ($letter_types as $item)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $item['letter_code'] }}</td>
          <td>{{ $item['name_type'] }}</td>
          <td>{{ \App\Models\Letter::countUsageByType($item->id) }}</td>
          <td class="d-flex justify-content-center">
            <a href="{{ route('klasifikasi.lihat', ['id' => $item['id']]) }}" class="btn me-3">Lihat</a>
            <a href="{{ route('klasifikasi.edit', ['id' => $item['id']]) }}" class="btn btn-primary me-3">Edit</a>
            <form action="{{ route('klasifikasi.delete', $item['id']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="sumbit" class="btn btn-danger">Hapus</button>
          </form> 
          </td>
      </tr>

      @endforeach
  </tbody>
</table>

@endsection