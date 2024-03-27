@extends('layouts.index')

@section('content')


<br>
<a href="{{ route('users.staff.create') }}"><button type="submit" class="btn btn-primary" style="float:right; margin-bottom:2rem;">Tambah Pengguna</button></a>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <center>
      <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th class="text-center">Aksi</th>
      </tr>
    </center>
  </thead>
  <tbody>
      @php $no = 1 @endphp
      @foreach ($usersSt as $item)
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