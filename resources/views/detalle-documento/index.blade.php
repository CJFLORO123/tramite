@extends('layouts.template')

@section('titlePage', 'Detalle Documentos Recibidos | AFOSECAT San Martín')

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
                    <a href="{{ route('documentos.index') }}">Detalle Documento N° <?php echo $id_documento[0]->num_recepcion . " - " . $id_documento[0]->anio ?> </a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Detalle Documento <small> N° <?php echo $id_documento[0]->num_recepcion . " - " . $id_documento[0]->anio ?> </small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="icon-folder-alt"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> Detalle Del Documento RECIBIDO</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ route('documentos.store') }}" method="POST" class="form-validate">
                            @csrf
                            <div class="form-body">
                            <h3 class="form-section">Datos del Solicitantes</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Nombre De Solicitante</strong>
                                            <p><?php echo $id_documento[0]->nom_solicitante  ?></p>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Cargo</strong>
                                            <p><?php echo $id_documento[0]->cargo  ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Dni</strong>
                                            <p><?php echo $id_documento[0]->dni_ruc  ?></p>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Correo Electronico</strong>
                                            <p><?php echo $id_documento[0]->cor_solicitante  ?></p>
                                        </div>
                                    </div>
                                </div>   
                                <h3 class="form-section">Datos Del Documento</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Nombre De Documento</strong>
                                            <p><?php echo $id_documento[0]->nombre_tipoDocumento  ?></p>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>N° De Documento</strong>
                                            <p><?php echo $id_documento[0]->num_documento  ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Fecha y Hora</strong>
                                            <p><?php echo $id_documento[0]->fecha_recepcion . " - " . $id_documento[0]->hora_recepcion ?></p>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Asunto</strong>
                                            <p><?php echo $id_documento[0]->asunto  ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <strong>Detalle</strong>
                                            <p><?php echo $id_documento[0]->detalle  ?></p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                           
                            <div class="form-actions right">
                                <a href="{{ route('documentos.index') }}" class="btn btn-danger"><i class="fas fa-angle-double-left"></i> Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

