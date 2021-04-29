@extends('layouts.template')

@section('titlePage', 'Reporte Tipo Documento | AFOSECAT San Martín')

@section('styles')
<link href="{{ url('global/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link href="{{ url('global/bootstrap-datetimepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
@endsection

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
                    <span>Reporte</span>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Reporte Tipo Documento</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Reporte Tipo Documento </h1>

        <div class="row">
        <div class="col-md-12">
                <div class="portlet light relative">
                    <div class="portlet-title">
                        <div class="caption font-red-intense">
                            <i class="icon-bar-chart"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> ESCOJA FECHAS</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        
                        <form role="form">
                            <div class="form-body">
                                <div id="resp-form"></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_inicio" class="control-label">Fecha de Inicio</label>
                                            <input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control text-center date-picker data-required" autocomplete="off" placeholder="Ejem. <?php echo date('d/m/Y')?>">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_fin" class="control-label">Fecha de Fin</label>
                                            <input type="text" id="fecha_fin" name="fecha_fin" class="form-control text-center date-picker data-required" autocomplete="off" placeholder="Ejem. <?php echo date('d/m/Y')?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipoDocumento_id" class="control-label">Tipo de Documentos</label>
                                            <select name="tipoDocumento_id" id="tipoDocumento_id" class="form-control" required>
                                                <option value="">[ Tipo Documento ]</option>
                                                @foreach($tipos as $tipoDocumento)
                                                <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre_tipoDocumento }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipo_tramite" class="control-label">Tipo Trámite</label>
                                            <select name="tipo_tramite" id="tipo_tramite"  class="form-control">
                                                <option value="RECIBIDOS">RECIBIDOS</option>
                                                <option value="EMITIDOS">EMITIDOS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-danger" id="exportar_pdf"><i class="fa fa-file-excel-o"></i> Exportar PDF</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script  src="{{ url('global/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script  src="{{ url('global/bootstrap-datetimepicker/components-date-time-pickers.min.js') }}"></script>
@endsection