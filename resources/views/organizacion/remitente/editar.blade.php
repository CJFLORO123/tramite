@extends('layouts.template')

@section('titlePage', 'Editar Remitente | AFOSECAT San Martín')

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
                    <span>Organización</span>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ route('empresa.index') }}">Remitente</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> REMITENTE <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="icon-speech"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> EDITAR REMITENTE</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('remitente.update', $remitente->id) }}" method="POST" class="form-validate">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                               
                                @if ($errors->any())
                                    <ul class="list-group">
                                        @foreach ($errors->all() as $error)
                                        <li class="list-group-item list-group-item-danger"><i class="fas fa-chevron-right"></i> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nom_solicitante">Nombre y Apellidos</label>
                                            <input type="text" class="form-control inputValida" id="nom_solicitante" name="nom_solicitante" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $remitente->nom_solicitante }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="cargo">Cargo</label>
                                            <input type="text" class="form-control inputLetras" id="cargo" name="cargo" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $remitente->cargo }}" required>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="dni_ruc">Dni</label>
                                            <input type="text" class="form-control inputNumero" id="dni_ruc" name="dni_ruc" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $remitente->dni_ruc }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="cor_solicitante">Correo Electronico</label>
                                            <input type="text" class="form-control inputLetras" id="cor_solicitante" name="cor_solicitante" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $remitente->cor_solicitante }}" required>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
                                <a href="{{ route('remitente.index') }}" class="btn default"><i class="fas fa-angle-double-left"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection