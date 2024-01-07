{{-- @extends('layouts.index')

@section('content')
<br>
<a href="{{ route('users.guru.create') }}"><button type="submit" class="btn btn-primary" style="float:right; margin-bottom:2rem;">Tambah Pengguna</button></a>
<table class="table table-striped table-bordered table-hover">
  <thead>
      <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th class="text-center">Aksi</th>
      </tr>
  </thead>
  <tbody>
      @php $no = 1 @endphp
      @foreach ($usersGr as $item)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $item['name'] }}</td>
          <td>{{ $item['email'] }}</td>
          <td>{{ $item['role'] }}</td>
          <td class="d-flex justify-content-center">
            <a href="{{ route('users.guru.edit', ['id' => $item['id']]) }}" class="btn btn-primary me-3">Edit</a>
              <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal-{{ $item['id'] }}">Hapus</button>
          </td>
      </tr>

      <div class="modal" tabindex="-1" id="myModal-{{ $item['id'] }}">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Konfirmasi Hapus</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
              <!-- Tombol untuk menutup modal -->
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- Tombol "Save changes" yang akan melakukan tindakan tertentu -->
              <form action="{{ route('users.guru.delete', $item['id']) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
  </tbody>
</table>
@endsection --}}

@extends('layouts.index')

@section('content')
<br>
<a href="{{ route('users.guru.create') }}"><button type="submit" class="btn btn-primary" style="float:right; margin-bottom:2rem;">Tambah Pengguna</button></a>
<table class="table table-striped table-bordered table-hover">
  <thead>
      <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th class="text-center">Aksi</th>
      </tr>
  </thead>
  <tbody>
      @php $no = 1 @endphp
      @foreach ($usersGr as $item)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $item['name'] }}</td>
          <td>{{ $item['email'] }}</td>
          <td>{{ $item['role'] }}</td>
          <td class="d-flex justify-content-center">
            <a href="{{ route('users.staff.edit', ['id' => $item['id']]) }}" class="btn btn-primary me-3">Edit</a>
            <form action="{{ route('users.staff.delete', $item['id']) }}" method="POST">
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