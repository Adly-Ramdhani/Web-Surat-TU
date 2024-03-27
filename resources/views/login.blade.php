<form>
    <form action="{{ route('login.auth') }}" method="POST" class="card p-5">
        @csrf
        @if(Session::get('failed'))
        <div class="alert alert-success">{{ Session::get('failed') }}</div>
        @endif
        {{-- @if(Session::get('logout'))
        <div class="alert alert-success">{{ Session::get('logout') }}</div>
        @endif
        @if(Session::get('canAccess'))
        <div class="alert alert-success">{{ Session::get('canAccess') }}</div>
        @endif --}}
        <form>
    <div class="row mb-3">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
  @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password">
        @error('email')
         <small class="text-danger">{{ $message }}</small>
   @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button> 
</form>