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
                        @foreach ($forms as $item)
                            {{--  <a href="{{route('form_edit',1)}}" style="text-decoration: none;">  --}}
                            <div class="col-md-3 col-6 mb-5">
                                <img src="https://carinosanto.com/wp-content/uploads/2020/07/logoheader.png" class="card-img-top" alt="...">
                                <div class="card-img-overlay text-right">
                                    @if (Auth::user()->hasPermissionTo('Ver formularios'))
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="optionsForm_{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu" aria-labelledby="optionsForm_{{$item->id}}">
                                                @if(Auth::user()->hasPermissionTo('Ver respuestas del cliente propias') || Auth::user()->hasPermissionTo('Ver todas las respuestas'))
                                                <a href="{{route('forms_answer',$item->id)}}" class="dropdown-item"><i class="fas fa-list-alt"></i> {{__('Answers')}}</a>
                                                @endif
                                                @can('Ver formularios')
                                                <a href="{{route('forms_show',$item->id)}}" class="dropdown-item"><i class="fas fa-eye"></i> {{__('Show')}}</a>
                                                @endcan
                                                @can('Editar formularios')
                                                <a href="{{route('forms_edit',$item->id)}}" class="dropdown-item"><i class="fas fa-edit"></i> {{__('Edit')}}</a>
                                                @endcan
                                                <a href="{{route('forms_export',$item->id)}}" class="dropdown-item"><i class="fas fa-file-export"></i> {{__('Export')}}</a>
                                                @can('Eliminar formularios')
                                                <button class="dropdown-item" data-toggle="modal" data-target="#modal_delete_{{$item->id}}"><i class="fas fa-trash-alt"></i> {{__('Delete')}}</button>
                                                @endcan
                                                @can('Copiar url de su formulario') 
                                                <div class="dropdown-item input-group">
                                                    <input type="text" class="form-control" id="url_{{$item->id}}" value="{{config('app.url')}}/answer/{{$item->token}}/{{Auth::user()->token}}" name="myURL_{{$item->id}}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary copy-url" id="copy_url_{{$item->id}}" onclick="copy_url({{$item->id}})" type="button"><i class="fas fa-copy"></i></button>
                                                    </div>
                                                </div>
                                                @endcan
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <small class="text-muted">{{$item->updated_at}}</small>
                                </div>
                            </div>
                            @include('forms.includes.modals.delete')
                            {{--  </a>  --}}
                        @endforeach
                    </div>
                    {{$forms->links()}}
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            @can('Crear formularios')
                            <a href="{{route('form_create')}}" class="btn btn-sm btn-primary btn-block">{{__('Create')}}</a>
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
    <script>
        function copy_url(item){
            document.getElementById('url_'+item).select();
            document.execCommand("copy");
        }
    </script>
@endsection