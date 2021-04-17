@extends('layouts.template')

@section('titlePage', 'Panel Inicial | AFOSECAT San Martín')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('inicio') }}">Panel Principal</a>
                </li>
            </ul>
        </div>
        
        <h1 class="page-title"> Bienvenidos
            <small>Panel Principal</small>
        </h1>
        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-magic-wand font-blue-madison"></i>
                            <span class="caption-subject bold uppercase font-blue-madison"> ACCESOS DIRECTOS</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection