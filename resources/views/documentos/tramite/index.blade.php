@extends('layouts.template')

@section('titlePage', 'Trámite | AFOSECAT San Martín')

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
                                    <span>Documentos</span>
                                </li>
                                <li>
                                	<i class="fa fa-angle-right"></i>
                                    <a href="{{ route('documentos.index') }}">Trámite</a>
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
                                            
                                        <a href="{{ route('documentos.create') }}"  class="btn btn-danger compose-btn btn-block">
                                           <i class="fa fa-edit"></i> Agregar </a>   
                                        <div class="portlet-body todo-project-list-content">
                                            <div class="todo-project-list">
                                                <ul class="nav">
                                                <li class="active">
                                                    <a href="{{ route('documentos.index') }}">
                                                       <i class="icon-drawer"></i> Bandeja </a>
                                                </li>
                                                <li>
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
                                                    
                                                    <i class="icon-folder-alt"></i>
                                                    
                                                    <span class="caption-subject font-green-sharp bold uppercase">DOCUMENTOS RECIBIDOS</span>
                                                </div>
                                                
                                            </div> 
                        <form role="form">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control" placeholder="Buscar Documentos Recibidos" autocomplete="off" autofocus>
                                        <div class="input-group-btn">
                                        {{ $proceso->links('vendor.pagination.default-back', ['elements' => $proceso]) }}
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                                            <!-- end PROJECT HEAD -->
                                        <div class="table-border">
                                             <table class="table table-striped table-bordered table-hover table-checkable order-column">
                                                    <thead>
                                                        <tr>
                                                           <th>N° Registro</th>
                                                           <th>Fecha y Hora</th>
                                                           <th>N° Documento</th>
                                                           <th>Remitente</th>
                                                           <th>Documento</th>
                                                           <th>Asunto</th>
                                                           <th>Situación</th>
                                                           <th>Operaciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                    @forelse($proceso as $proc)
                                    <tr class="odd gradeX"> 
                                        <td>
                                        {{ $proc->num_recepcion  }} - {{ $proc->indice  }}
                                        </td>
                                        <td>{{ $proc->fecha_recepcion  }} - {{ $proc->hora_recepcion  }}</td>
                                        <td>
                                            {{ $proc->num_documento  }}
                                        </td>
                                        <td>{{ $proc->nom_solicitante  }} </td>
                                        <td>{{ $proc->nombre_tipoDocumento  }}</td>
                                        <td>{{ $proc->asunto  }}</td>
                                        <td><span class="badge badge-info">{{ $proc->desc_situacion  }}</span></td>
                                    <td>
                                        <form action="#" method="#">
                                              <div class="btn-group btn-group-sm btn-group-solid">
                                                   <a type="button" href="{{ route('documentos.show', $proc->id) }}"  class="btn btn-primary" title="Detalle del Documento"><i class="fa fa-bars"></i></a>
                                                   <a href="{{ route('documentos.edit', $proc->id) }}" class="btn btn-danger" title="Editar"><i class="fa fa-pencil"></i></a>
                                             </div>
                                        </form>
                                    </td>
                                 </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center font-grey-salsa">NO SE ENCONTRÓ DATOS PARA MOSTRAR</td>
                                    </tr>
                                    @endforelse
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

           