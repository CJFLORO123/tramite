@extends('layouts.template')

@section('titlePage', 'Editar Tipo Usuarios | AFOSECAT San Martín')

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
                    <a href="{{ route('tipo-usuario.index') }}">Tipo De Usuarios</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Tipo De Usuarios <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> EDITAR TIPO DE USUARIO</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('tipo-usuario.update',$tipo->id ) }}" method="POST" class="form-validate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="loading hidden">
                                <p><i class="fas fa-spinner"></i> Cargando</p>
                            </div>
                            
                            <div class="form-body">
                                @if ($errors->any())
                                    <ul class="list-group">
                                        @foreach ($errors->all() as $error)
                                        <li class="list-group-item list-group-item-danger"><i class="fas fa-chevron-right"></i> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="descripcion">Tipo de Usuario</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                                <input type="text" class="form-control" id="descripcion" name="descripcion" autocomplete="off" required value="{{ $tipo->descripcion }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        @foreach($menuAll as $menu)
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="{{ $menu['icono'] }}"></i> {{ $menu['descripcion'] }}</h3>
                                            </div>

                                            <ul class="list-group list-accesos">
                                                @forelse($menu['submenu'] as $submenu)
                                                <li class="list-group-item"> {{ $submenu['descripcion'] }}
                                                    <label class="mt-checkbox">

                                                        @if(accesos($submenu['id'], $tipo->accesos))
                                                        <input type="checkbox" name="submenu[]" value="{{ $submenu['id'] }}" checked >
                                                        @else
                                                        <input type="checkbox" name="submenu[]" value="{{ $submenu['id'] }}" required>
                                                        @endif

                                                        <span></span>
                                                    </label>
                                                </li>
                                                @empty
                                                <li class="list-group-item"> {{ $menu['descripcion'] }}
                                                    <label class="mt-checkbox">
                                                        @if(accesos($menu['id'], $tipo->accesos))
                                                        <input type="checkbox" name="submenu[]" value="{{ $menu['id'] }}" checked >
                                                        @else
                                                        <input type="checkbox" name="submenu[]" value="{{ $menu['id'] }}" required>
                                                        @endif
                                                        <span></span>
                                                    </label>
                                                </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Actualizar</button>
                                <a href="{{ route('tipo-usuario.index') }}" class="btn default"><i class="fas fa-angle-double-left"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection