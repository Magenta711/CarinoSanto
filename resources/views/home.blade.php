@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>{{__('Dashboard')}}</h3>
                    <div class="row">
                        @can('Ver lista de usuarios')   
                        <div class="col-md-3 col-sm-4 mb-3">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-7 col-sm-6">
                                        <h1>{{$num_users}}</h1>
                                        <p>{{ __('Users') }}</p>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <i class="fas fa-user" style="font-size: 75px; color:rgba(0, 0, 0, 0.4);"></i>
                                    </div>
                                </div>
                                <div class="card-link text-center">
                                    <a class="btn btn-link btn-sm" href="{{route('users')}}">{{ __('Users') }}</a>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('Ver lista de respuestas')
                        <div class="col-md-3 col-sm-4 mb-3">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-7 col-sm-6">
                                        <h1>{{$num_answers}}</h1>
                                        <p>{{ __('Answers') }}</p>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <i class="fas fa-list-alt" style="font-size: 75px; color:rgba(0, 0, 0, 0.4);"></i>
                                    </div>
                                </div>
                                <div class="card-link text-center">
                                    <a class="btn btn-link btn-sm" href="{{route('answers')}}">{{ __('Answers') }}</a>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('Ver lista de formularios')   
                        <div class="col-md-3 col-sm-4 mb-3">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-7 col-sm-6">
                                        <h1>{{$num_forms}}</h1>
                                        <p>{{ __('Forms') }}</p>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <i class="fab fa-wpforms" style="font-size: 75px; color:rgba(0, 0, 0, 0.4);"></i>
                                    </div>
                                </div>
                                <div class="card-link text-center">
                                    <a class="btn btn-link btn-sm" href="{{route('forms')}}">{{ __('Forms') }}</a>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- 
Roles y permisos
Ver mis respuestas
Ver todas las respuestas
Guardar nuevo valores obligatorios
Guardar respuestas de radio
Buscador de usuario
Filtro para usuairios
Filtro para respuestas
    Perfil [ foto ]
    Traducion
    Emails [nuevo pedido]
Vista de respuestas generales
Eliminar usuarios
Eliminar respuestas
Eliminar formularios
    Editar formularios
No permitir loguear usuarios eliminados
    Ver usuarios eliminados
    Restaurar usuarios eliminados
Notificaciones [nuevo usuario, nuevo formulario, nueva respuesta]
    pagina de Acerca
validar formularios
--}}