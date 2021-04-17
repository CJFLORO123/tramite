@extends('layouts.template')

@section('titlePage', 'Tramite | AFOSECAT San Martín')

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
                    <a href="{{ route('documentos.index') }}">Tramite</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Documentos <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> AGREGAR DOCUMENTOS RECIBIDOS O EMITIDOS</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('documentos.store') }}" method="POST" class="form-validate">
                            @csrf
                            <div class="form-body">
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
                                            <input type="text" id="fecha_recepcion" name="fecha_recepcion" class="form-control text-center date-picker data-required" autocomplete="off" placeholder="Ejem. <?php echo date('d/m/Y')?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="desc_oficina" class="control-label">Hora Registro</label>
                                            <input type="text"  name="desc_oficina" class="form-control text-center data-required" placeholder="Ejem. <?php echo date('d/m/Y')?>" autocomplete="off">
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
                                                      <label for="asociado" class="control-label">Remitente</label>
                                                      <div class="input-group">
                                                      <input type="text" id="solicitante" name="solicitante" class="form-control input-recibidos" autocomplete="off" placeholder="Buscar Remitente">
                                                      <div class="input-group-btn">
                                                      <a href="#modal-remitente" class="btn btn-danger" data-container="body" data-placement="top" data-original-title="Agregar" data-toggle="modal"><i class="fa fa-plus"></i></a>
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
                                                     <option value="">[ Areas]</option>
                                                     @foreach($areas as $area)
                                                     <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                                     @endforeach
                                                     </select>
                                               </div>
                                           </div>
                                            <div class="col-md-5">
                                                 <label for="usuario_id" class="control-label">Usuario</label>
                                                 <div class="input-group">
                                                 <select class="form-control input-emitidos usuario" name="usuario_id" required>
                                                 <option value="">[ USUARIO ]</option>
                                                 </select>
                                                        <span class="input-group-btn">
                                                            <a href="#modal-usuario" class="btn btn-danger" data-container="body" data-placement="top" data-original-title="Agregar" data-toggle="modal"><i class="fa fa-plus"></i></a>
                                                        </span>
                                                </div>
                                                    <!-- /input-group -->
                                            </div>   
                                       </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="asociado" class="control-label">Empresa</label>
                                            <div class="input-group">
                                                <input type="text" id="asociado" name="asociado" class="form-control input-juridico data-required" autocomplete="off" placeholder="Buscar Remitente">
                                                <div class="input-group-btn">
                                                    <a href="#modal-empresa" class="btn btn-danger reset-modal tooltips" data-container="body" data-placement="top" data-original-title="Agregar" data-toggle="modal"><i class="fa fa-plus"></i></a>
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
                                            <label for="tel_oficina" class="control-label">N° De Documento </label>
                                            <input type="text" id="tel_oficina" name="tel_oficina" class="form-control validarNumero" autocomplete="off">
                                        </div>
                                    </div>
                                    
                                 <div class="col-md-12">
                                      <div class="form-group">
                                            <label for="tipoDocumento_id" class="control-label">Asunto</label>
                                            <input type="text" id="tel_oficina" name="tel_oficina" class="form-control" autocomplete="off">
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="detalle" class="control-label">Detalle</label>
                                            <textarea id="detalle" name="detalle" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                          </div>
                         </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Guardar</button>
                                <a href="{{ route('usuarios.index') }}" class="btn default"><i class="fas fa-angle-double-left"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            @include('documentos.tramite.modal-remitente')
        </div>
        @include('documentos.tramite.modal-usuario')
    </div>
    @include('documentos.tramite.modal-empresa')
</div>
@endsection

@section('scripts')
<script async src="{{ url('global/axios/axios.min.js') }}"></script>
@endsection