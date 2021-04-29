@extends('layouts.template')

@section('titlePage', 'Usuarios | AFOSECAT San Martín')

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
                    <a href="{{ route('usuarios.index') }}">Usuarios</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Usuarios <small>Registrados en el sistema</small></h1>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-wrench font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> LISTADO DE USUARIOS</span>
                        </div>
                        <div class="actions">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Agregar </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                    <form role="form">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control" placeholder="Buscar Usuarios" autocomplete="off" autofocus>
                                        <div class="input-group-btn">
                                        {{ $usuarios->links('vendor.pagination.default-back', ['elements' => $usuarios]) }}
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
                                        <th> Apellidos y nombres </th>
                                        <th> Usuario </th>
                                        <th> Tipo de Usuario </th>
                                        <th> Operaciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $loop->iteration + $usuarios->firstItem() - 1 }}</td>
                                        <td> {{ $usuario->apellidos }}, {{ $usuario->nombres }}</td>
                                        <td>{{ $usuario->nickname }}</td>
                                        <td>{{ $usuario->descripcion }}</td>
                                        <td>
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" class="form-destroy" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary tooltips" data-container="body" data-placement="bottom" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="javascript:;"> Accesos </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;" class="link-destroy"> Eliminar </a>
                                                        </li>
                                                    </ul>
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