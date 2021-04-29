@extends('layouts.template')

@section('titlePage', 'Tipo Documentos | AFOSECAT San Martín')

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
                    <a href="{{ route('tipo-documentos.index') }}">Tipo Documentos</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Tipo Documentos <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                        <i class="icon-folder-alt"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> LISTADO DE TIPOS DE DOCUMENTOS</span>
                        </div>
                        <div class="actions">
                            <a href="{{ route('tipo-documentos.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Agregar </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                       <form role="form">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="search" id="search" class="form-control" name="search" placeholder="Buscar Tipo Documento">
                                    <div class="input-group-btn">
                                    {{ $tipodocumentos->links('vendor.pagination.default-back', ['elements' => $tipodocumentos]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="table-border">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Tipo Documento </th>
                                        <th> Operaciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tipodocumentos as $tipodocumento)
                                    <tr>
                                        <td>{{ $loop->iteration + $tipodocumentos->firstItem() - 1 }}</td>
                                        <td>{{ $tipodocumento->nombre_tipoDocumento }}</td>
                                        <td>
                                        <form action="{{ route('tipo-documentos.destroy', $tipodocumento->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                              <div class="btn-group btn-group-sm">
                                                   <a type="button" href="{{ route('tipo-documentos.edit', $tipodocumento->id) }}"  class="btn btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
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