@extends('layouts.template')

@section('titlePage', 'Control De Documentos | AFOSECAT San Martín')

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
                    <span>Organización</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('control-documentos.index') }}">Control De Documentos</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Control De Documentos <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> LISTADO DE Control De Documentos</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                    <form role="form">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control" placeholder="Buscar Tipo Documentos" autocomplete="off" autofocus>
                                        <div class="input-group-btn">
                                        {{ $Controldocumentos->links('vendor.pagination.default-back', ['elements' => $Controldocumentos]) }}
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-border">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column">
                                <thead>
                                    <tr>
                                       
                                        <th> N° Registros </th>
                                        <th>Tipo Trámite </th>
                                        <th> Fecha Registro  </th>
                                        <th> Tipo Documento </th>
                                        <th> Operaciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($Controldocumentos as $Controldocumento)
                                    <tr>
                                        
                                        <td>{{ $Controldocumento->num_documentos }}</td>
                                        <td>{{ $Controldocumento->tipo_tramite }}</td>
                                        <td>{{ $Controldocumento->fecha_registro }}</td>
                                        <td>{{ $Controldocumento->nombre_tipoDocumento }}</td>
                                        <td>
                                        <form action="{{ route('control-documentos.destroy', $Controldocumento->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                              <div class="btn-group btn-group-sm">
                                                   <button type="submit" class="btn btn-danger tooltips" onclick="return(confirm('¿Desea borrar este elemento?'))" data-container="body" data-placement="bottom" data-original-title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                             </div>
                                        </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center font-grey-salsa">NO SE ENCONTRÓ DATOS PARA MOSTRAR</td>
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
@endsection