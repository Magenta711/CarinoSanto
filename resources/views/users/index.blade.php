@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('includes.alerts')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <i class="fas fa-user"></i> Users
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-hover">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('E-Mail Address')}}</th>
                                    <th>Rol</th>
                                    <th>/</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->getRoleNames()[0]}}</td>
                                    <td>
                                        @can('Ver usuarios')
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_show_{{$item->id}}">{{__('Show')}}</button>
                                        @include('users.includes.modals.show')
                                        @endcan
                                        @can('Editar usuarios')
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_edit_{{$item->id}}">{{__('Edit')}}</button>
                                        @include('users.includes.modals.edit')
                                        @endcan
                                        @can('Eliminar usuarios')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">{{__('Delete')}}</button>
                                        @include('users.includes.modals.delete')
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('E-Mail Address') }}</th>
                                    <th>Rol</th>
                                    <th>/</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            @can('Crear usuarios')
                            <button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#modal_create">{{__('Create')}}</button>
                            @include('users.includes.modals.create')
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