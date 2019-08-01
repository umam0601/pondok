<div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
  </div>
  <div class="modal-body">
    <form id="form-register" class="form-horizontal" method="POST" action="{{route('register')}}">
      @csrf
      <div class="control-group">
        <label class="control-label" for="inputName">Nama</label>
        <div class="controls">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        {{-- <small class="text-danger errorNama d-none" style="margin-left: 180px;">Nama tidak boleh kosong</small> --}}
      </div>
      <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        {{-- <small class="text-danger errorEmail d-none" style="margin-left: 180px;">Email tidak boleh kosong</small> --}}
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        {{-- <small class="text-danger errorPassword d-none" style="margin-left: 180px;">Password tidak boleh kosong</small> --}}
      </div>
      <div class="control-group">
        <label class="control-label" for="password-confirm">Confirm Password</label>
        <div class="controls">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        {{-- <small class="text-danger errorPassword2null d-none" style="margin-left: 180px;">Password Konfirmasi tidak boleh kosong</small>
        <small class="text-danger errorPassword2 d-none" style="margin-left: 180px;">Password tidak sama</small> --}}
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-theme">Sign up</button>
        </div>
        <p class="aligncenter margintop20">
          Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
        </p>
      </div>
    </form>
  </div>
</div>