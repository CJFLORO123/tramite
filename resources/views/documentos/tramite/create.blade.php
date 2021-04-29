@extends('layouts.template')

@section('titlePage', 'Trámite | AFOSECAT San Martín')

@section('content')

@section('styles')
<link href="{{ url('global/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link href="{{ url('global/bootstrap-datetimepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
@endsection

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
                    <a href="{{ route('documentos.index') }}">Trámite</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Documentos <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="icon-folder-alt"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> AGREGAR DOCUMENTOS RECIBIDOS O EMITIDOS</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('documentos.store') }}" method="POST" class="form-validate" enctype="multipart/form-data">
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Registro" class="control-label">N° Registro</label>
                                            <input type="text" class="form-control text-center"  id="micampo" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_recepcion" class="control-label">Fecha Registro</label>
                                            <input type="text" id="fecha_recepcion" name="fecha_recepcion" class="form-control text-center date-picker data-required" autocomplete="off" placeholder="Ejem. <?php echo date('d/m/Y')?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="hora_recepcion" class="control-label">Hora Registro</label>
                                            <input type="text"  name="hora_recepcion" id="hora_recepcion" class="form-control timepicker timepicker-24 text-center" placeholder="Ejem. <?php echo date('H:i A')?>" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipo_tramite" class="control-label">Tipo Trámite</label>
                                            <select name="tipo_tramite" id="tipo_tramite"  class="form-control tramite">
                                                <option value="RECIBIDOS">RECIBIDOS</option>
                                                <option value="EMITIDOS">EMITIDOS</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="dataElemento">
                                         <input type="hidden" class="input-elemento-tipo" value="1">
                                         <div id="recibidos">
                                             <div class="col-md-10">
                                                 <div class="form-group">
                                                      <label for="solicitante" class="control-label">Remitente</label>
                                                      <div class="input-group">
                                                      <input type="text" id="solicitante" name="solicitante" class="form-control input-recibidos inputLetras" autocomplete="off" placeholder="Buscar Remitente" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                                      <div class="input-group-btn">
                                                      <a href="{{ route('remitente.crear') }}" class="btn btn-danger"><i class="fa fa-plus"></i></a>
                                                     </div>
                                                     </div>
                                                </div>
                                             </div>
                                        </div>

                                    <div id="emitidos" class="hidden">
                                         <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                     <label for="area_id" class="control-label">Areas</label>
                                                     <select name="area_id" id="area_id"  class="form-control input-emitidos area" required>
                                                     <option value="">[ AREAS]</option>
                                                     @foreach($areas as $area)
                                                     <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                     @endforeach
                                                     </select>
                                               </div>
                                           </div>
                                            <div class="col-md-5">
                                                 <label for="usuario_id" class="control-label">Usuarios</label>
                                                 <div class="input-group">
                                                 <select class="form-control input-emitidos usuario" name="usuario_id" required>
                                                 <option value="">[ USUARIO ]</option>
                                                 </select>
                                                        <span class="input-group-btn">
                                                            <a href="{{ route('usuario.crear') }}" class="btn btn-danger" ><i class="fa fa-plus"></i></a>
                                                        </span>
                                                </div>
                                                    <!-- /input-group -->
                                            </div>   
                                       </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="empresa" class="control-label">Empresa</label>
                                            <div class="input-group">
                                                <input type="text" id="empresa" name="empresa" class="form-control input-juridico inputValida" autocomplete="off" placeholder="Buscar Empresa" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                                <div class="input-group-btn">
                                                    <a href="{{ route('empresa.crear') }}" class="btn btn-danger" ><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   </div>
                                  
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="tipoDocumento_id" class="control-label">Tipo de Documentos</label>
                                            <select name="tipoDocumento_id" id="tipoDocumento_id" class="form-control tipodocumento" required>
                                                <option value="">[ Tipo Documento ]</option>
                                                @foreach($tipodocumentos as $tipoDocumento)
                                                <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre_tipoDocumento }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="num_documento" class="control-label">N° De Documento </label>
                                            <input type="text" id="num_documento" name="num_documento" class="form-control" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                    
                                 <div class="col-md-12">
                                      <div class="form-group">
                                            <label for="asunto" class="control-label">Asunto</label>
                                            <input type="text" id="asunto" name="asunto" class="form-control" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="detalle" class="control-label">Detalle</label>
                                            <textarea id="detalle" name="detalle" class="form-control" rows="5" onkeyup="javascript:this.value=this.value.toUpperCase();" required></textarea>
                                        </div>
                                    </div>  
                          </div>
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="control-label" for="documento">Documentos Adjuntos</label>
                                      <input type="file" class="form-control" id="adj_documento" name="adj_documento">
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

@section('scripts')
<script  src="{{ url('global/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script  src="{{ url('global/bootstrap-datetimepicker/bootstrap-timepicker.min.js') }}"></script>
<script  src="{{ url('global/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script  src="{{ url('global/bootstrap-datetimepicker/components-date-time-pickers.min.js') }}"></script>
<script async src="{{ url('global/axios/axios.min.js') }}"></script>
@endsection