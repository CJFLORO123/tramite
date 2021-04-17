@extends('layouts.templateLogin')

@section('content')
<form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf
    <h3 class="form-title font-blue">Iniciar Sesión</h3>

    @error('nickname')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Usuario</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="nickname" value="{{ old('nickname') }}" autofocus required />
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" required />
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-block btn-primary uppercase"><i class="icon-login"></i> Ingresar</button>
    </div>
</form>
                
@endsection
