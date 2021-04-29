@extends('layouts.template')

@section('titlePage', 'Areas | AFOSECAT San Martín')

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
                    <a href="{{ route('tipo-documentos.index') }}">Areas</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Areas <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="icon-speech"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> AGREGAR AREAS</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('area.store') }}" method="POST" class="form-validate">
                            @csrf
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
                                            <label class="control-label" for="nombre_area">Nombre De Areas</label>
                                                <input type="text" class="form-control inputValida" id="nombre_area" name="nombre_area" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
                                <a href="{{ route('area.index') }}" class="btn default"><i class="fas fa-angle-double-left"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection