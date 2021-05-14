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
                    <h3><i class="fas fa-list-alt"></i> {{__('Answers')}}</h3>
                    <div class="table-responsive table-hover">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{__('Adviser')}}</th>
                                    <th>{{__('Form')}}</th>
                                    <th>{{__('Date')}}</th>
                                    <th>/</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($answers as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->form->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{route('answers_show',$item->id)}}" class="btn btn-sm btn-primary">{{__('Show')}}</a>
                                        @can('Eliminar respuestas')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">{{__('Delete')}}</button>
                                            @include('answers.includes.modals.delete')
                                        @endcan
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
@endsection

@section('js')  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
@endsection