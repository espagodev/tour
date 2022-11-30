
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="nombres">Nombre</label>
                <input class="form-control @error('nombres') is-invalid @enderror"  name="nombres" id="nombres" type="text" value="{{ $usuario->nombres ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="apellidos">Apellidos</label>
                <input class="form-control  @error('apellidos') is-invalid @enderror" name="apellidos" id="apellidos" type="text" value="{{ $usuario->apellidos ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>              
        </div>

        <div class="row">
            <div class="col-md-">
                <label class="form-label" for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror"  type="email" id="email" name="email" vvalue="{{ $usuario->email ?? '' }}" placeholder="" required="">
                <div class="invalid-feedback">Email.</div>
            </div>

        </div>
        <div class="row">
          <div class="col-md-6">
              <label class="form-label" for="password">Contraseña</label>
              <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password"  required="">
              <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-6">
              <label class="form-label" for="password-confirm">Repetir Contraseña</label>
              <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required="">
              <div class="valid-feedback">Looks good!</div>
          </div>              
      </div>