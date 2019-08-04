<div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="mySigninModalLabel">Masuk ke <strong>Akun</strong></h4>
  </div>
  <div class="modal-body">
    <div class="notif-error">
      <div class="text-center">
        <small class="text-danger">Username & Password tidak cocok!</small>
      </div>
    </div>
    <form class="form-horizontal" id="form-login">
      @csrf
      <div class="control-group">
        <label class="control-label" for="inputText">Username</label>
        <div class="controls">
          <input type="text" id="inputText" placeholder="Username" name="name">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputSigninPassword">Password</label>
        <div class="controls">
          <input type="password" id="inputSigninPassword" placeholder="Password" name="password">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="button" class="btn btn-theme btn-login">Masuk</button>
        </div>
        <p class="aligncenter margintop20">
          Belum punya akun? <a href="#mySignup" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Daftar</a>
        </p>
      </div>
    </form>
  </div>
</div>