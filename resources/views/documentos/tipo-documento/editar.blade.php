@extends('layouts.template')

@section('titlePage', 'Tipo De Documentos | AFOSECAT San Martín')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('inicio') }}">Panel Principal</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Documentos</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('tipo-documentos.index') }}">Tipo Documentos</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> TIPO DOCUMENTOS <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> EDITAR TIPO DOCUMENTO</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('tipo-documentos.update', $tipodocumento->id) }}" method="POST" class="form-validate">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="nombre_tipoDocumento">Nombre De Tipo Documentos</label>
                                                <input type="text" class="form-control inputLetras" id="nombre_tipoDocumento" name="nombre_tipoDocumento" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $tipodocumento->nombre_tipoDocumento }}" required>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
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