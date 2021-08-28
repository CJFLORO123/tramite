@extends('layouts.template')

@section('titlePage', 'Editar Usuarios | AFOSECAT San Martín')

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
                    <span>Seguridad</span>
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
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> EDITAR USUARIO</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="form-validate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nombres">Nombres</label>
                                                <input type="text" class="form-control inputLetras" id="nombres" name="nombres" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();"   required value="{{ $usuario->nombres }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control inputValida" id="apellidos" name="apellidos" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{ $usuario->apellidos }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="nickname">Nickname</label>
                                                <input type="text" class="form-control inputLetrascre" id="nickname" name="nickname" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{ $usuario->nickname }}">
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
                                                @if($area->id == $usuario->area_id)
                                                <option value="{{ $area->id }}" selected>{{ $area->nombre_area }}</option>
                                                @else
                                                <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                @endif
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
                                                @foreach($tipos as $tipo)
                                                    @if($tipo->id == $usuario->tipoUsuario_id)
                                                    <option value="{{ $tipo->id }}" selected>{{ $tipo->descripcion }}</option>
                                                    @else
                                                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Actualizar</button>
                                <a href="{{ route('usuarios.index') }}" class="btn default"><i class="fas fa-angle-double-left"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection