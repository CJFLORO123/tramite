@extends('layouts.template')

@section('titlePage', 'Tipo Usuario | AFOSECAT San Martín')

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
                    <span>Seguridad</span>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ route('tipo-usuario.index') }}">Tipo Usuario</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Tipo Usuario <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> LISTADO DE Tipo de USUARIOS</span>
                        </div>
                        <div class="actions">
                            <a href="{{ route('tipo-usuario.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Agregar </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                   
                    <form role="form">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control" placeholder="Buscar Tipo Usuario" autocomplete="off" autofocus>
                                        <div class="input-group-btn">
                                        {{ $TipoUsuarios->links('vendor.pagination.default-back', ['elements' => $TipoUsuarios]) }}
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
                                        <th> Nombre de Tipo Usuario </th>
                                        <th> Operaciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($TipoUsuarios as $TipoUsuario)
                                    <tr>
                                        <td>{{ $loop->iteration + $TipoUsuarios->firstItem() - 1 }}</td>
                                        <td> {{ $TipoUsuario->descripcion }}</td>
                                        
                                        <td>
                                            <form action="{{ route('tipo-usuario.destroy', $TipoUsuario->id) }}" class="form-destroy" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('tipo-usuario.edit', $TipoUsuario->id) }}" class="btn btn-primary tooltips" data-container="body" data-placement="bottom" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                                                    <button type="botton" class="btn btn-danger tooltips" onclick="return(confirm('¿Desea borrar este elemento?'))" data-container="body" data-placement="bottom" data-original-title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center font-grey-salsa">NO SE ENCONTRÓ DATOS PARA MOSTRAR</td>
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