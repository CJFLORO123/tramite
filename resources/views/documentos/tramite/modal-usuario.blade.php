@extends('layouts.template')

@section('titlePage', 'Trámite - Usuarios | AFOSECAT San Martín')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('inicio') }}">Panel Principal</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Documentos</span>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ route('usuarios.index') }}">Usuarios</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Usuarios <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="icon-folder-alt"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> AGREGAR USUARIOS</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('usuario.guardar') }}" method="POST" class="form-validate">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nombres">Nombres</label>
                                                <input type="text" class="form-control inputLetras" id="nombres" name="nombres" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control inputValida" id="apellidos" name="apellidos" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="nickname">Nickname</label>
                                                <input type="text" class="form-control inputLetrascre" id="nickname" name="nickname" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="password">Contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="area_id">Areas</label>
                                            <select name="area_id" id="area_id" class="form-control" required>
                                                <option value="">[ Areas ]</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="tipoUsuario_id">Tipo de Usuario</label>
                                            <select name="tipoUsuario_id" id="tipoUsuario_id" class="form-control" required>
                                                <option value="">[ TIPO DE USUARIO ]</option>
                                                @foreach($tiposUsuarios as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
                                <a href="{{ route('documentos.index') }}" class="btn default"><i class="fas fa-angle-double-left"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection