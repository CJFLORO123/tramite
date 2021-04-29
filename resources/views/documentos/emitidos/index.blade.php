@extends('layouts.template')

@section('titlePage', 'Documentos Emitidos | AFOSECAT San Martín')

@section('content')

    <div class="page-content-wrapper">
        
                    <div class="page-content">
                         <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="{{ route('inicio') }}">Inicio</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                    <span>Mantenimiento</span>
                                </li>
                                <li>
                                	<i class="fa fa-angle-right"></i>
                                    <a href="#">Trámite</a>
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title">Bandeja de Entrada
                            
                        </h1>
                        
                        <div class="row">
                            <div class="col-md-12" > 
                                <div class="todo-ui">
                                    <div class="todo-sidebar">
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                                <i class="icon-direction font-green-sharp"></i>
                                                <span class="caption-subject font-green-sharp bold uppercase">OPERACIONES </span>
                                                </div>
                                            </div>
                                            
                                        <a href="{{ route('documentos.create') }}"  class="btn red compose-btn btn-block">
                                            <i class="fa fa-edit"></i> Agregar </a>   
                                        <div class="portlet-body todo-project-list-content">
                                            <div class="todo-project-list">
                                                <ul class="nav">
                                                <li>
                                                    <a href="{{ route('documentos.index') }}">
                                                       <i class="icon-drawer"></i> Bandeja </a>
                                                </li>
                                                <li class="active">
                                                   <a href="{{ route('emitidos.index') }}">
                                                      <i class="icon-like"></i> Emitidos </a>
                                                </li>
                                               
                                                </ul>
                                            </div>
                                        </div>
                                        </div>

                                    </div>

                                    <div class="todo-content">
                                        <div class="portlet light ">
                                            <!-- PROJECT HEAD -->
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-bar-chart font-green-sharp hide"></i>
                                                    
                                                    <span class="caption-subject font-green-sharp bold uppercase">DOCUMENTOS EMITIDOS</span>
                                                </div>
                                                
                                            </div>
                                            
                        <form role="form">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control" placeholder="Buscar Documentos Emitidos" autocomplete="off" autofocus>
                                        <div class="input-group-btn">
                                        {{ $emitidos->links('vendor.pagination.default-back', ['elements' => $emitidos]) }}
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                                            <!-- end PROJECT HEAD -->
                                        <div class="portlet-body">
                                             <table class="table table-striped table-bordered table-hover table-checkable order-column">
                                                    <thead>
                                                        <tr>
                                                           <th>N° Registro</th>
                                                           <th>Fecha y Hora</th>
                                                           <th>N° Documento</th>
                                                           <th>Tipo Documento</th>
                                                           <th>Asunto</th>
                                                           <th>Persona o Institución</th>
                                                           <th>Usuario</th>
                                                           <th>Area</th>
                                                           <th>Situación</th>
                                                           <th>Operaciónes</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                @foreach($emitidos as $emit)
                                    <tr> 
                                        <td>{{ $emit->num_recepcion  }} - {{ $emit->indice  }}</td>
                                        <td>{{ $emit->fecha_recepcion  }} - {{ $emit->hora_recepcion  }}</td>
                                        <td>{{ $emit->num_documento  }}</td>
                                        <td>{{ $emit->nombre_tipoDocumento  }}</td>
                                        <td>{{ $emit->asunto  }}</td>
                                        <td>{{ $emit->nombre_empresa  }}</td>
                                        <td>{{ $emit->area  }}</td>
                                        <td>{{ $emit->nombre  }} {{ $emit->apellidos  }}</td>
                                        <td> <span class="badge badge-info">{{ $emit->desc_situacion  }}</span></td>
                                        <td>
                                        <form action="#" method="#">
                                           
                                        <div class="btn-group btn-group-sm btn-group-solid">
                                        <a href="{{ route('emitidos.show', $emit->documento) }}" class="btn btn-primary" title="Detalle del Documento"><i class="fa fa-bars"></i></a>
                                        <a href="{{ route('emitidos.edit', $emit->documento) }}" class="btn btn-danger" title="Editar"><i class="fa fa-pencil"></i></a>
                                        </div>
                                        </form>
                                    </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                 </div>
            </div>

                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
            @endsection   

           