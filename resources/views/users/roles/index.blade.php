@extends('layouts.app')

@section('content')
<div class="container">
    @include('includes.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fas fa-user-friends"></i> Roles
                        </div>
                    </div>
                    <div class="table-responsive table-hover">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Rol</th>
                                    <th>/</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                         @can('Ver permisos de roles') 
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_show_{{$item->id}}">{{__('Show')}}</button>
                                        @include('users.roles.includes.modals.show')
                                         @endcan 
                                        @can('Editar roles')
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_edit_{{$item->id}}">{{__('Edit')}}</button>
                                        @include('users.roles.includes.modals.edit')
                                        @endcan
                                        @can('Eliminar roles')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">{{__('Delete')}}</button>
                                        @include('users.roles.includes.modals.delete')
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            @can('Crear roles')
                                <button class="btn btn-sm btn-success btn-block"  data-toggle="modal" data-target="#modal_create">{{__('Create')}}</button>
                                @include('users.roles.includes.modals.create')
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
@endsection