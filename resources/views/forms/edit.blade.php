@extends('layouts.app')
@php
    $n = 0;
@endphp
@include('forms.includes.elements_create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2 id="form-tiple">{{$id->name}}</h2>
                        </div>
                        <div class="col-sm-4 text-right">
                        </div>
                    </div>
                </div>
                <form action="{{route('forms_update',$id->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                    <div class="card card-body mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Form title')}}" value="{{$id->name}}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="1" placeholder=">{{__('Description of the form')}}">{{$id->description}}</textarea>
                        </div>
                    </div>
                    <div id="destino_question">
                        @foreach ($id->questions as $question)
                        @php
                            $n++;
                        @endphp
                        <div class="card mb-3 questions" id="question_{{$n}}">
                            <input type="hidden" value="{{$question->id}}" name="question_id[]">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group card-title">
                                             <input type="question" value="{{$question->question}}" placeholder="Title of the question" name="question[]" id="question" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 type-options">
                                        <select name="type[]" id="type_{{$n}}" class="form-control types">
                                            <option>Selecciona una optión</option>
                                            <option {{$question->type == 1 ? 'selected' : ''}} value="1"><i class="fas fa-grip-lines"></i> Respuesta breve</option>
                                            <option {{$question->type == 2 ? 'selected' : ''}} value="2"><i class="fas fa-align-justify"></i> Párrafo</option>
                                            <option {{$question->type == 3 ? 'selected' : ''}} value="3"><i class="fas fa-dot-circle"></i> Opción multiple</option>
                                            <option {{$question->type == 4 ? 'selected' : ''}} value="4">Casilla de verificación</option>
                                            <option {{$question->type == 5 ? 'selected' : ''}} value="5">Lista desplegable</option>
                                            <option {{$question->type == 6 ? 'selected' : ''}} value="6">Cargar archivo</option>
                                            <option {{$question->type == 7 ? 'selected' : ''}} value="7">Fecha</option>
                                            <option {{$question->type == 8 ? 'selected' : ''}} value="8">Hora</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 detino" id="detino_{{$n}}">
                                        @include('forms.includes.elements_edit')
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button id="destroy_{{$n}}" class="btn btn-sm btn-destroy"><i class="fas fa-trash-alt"></i></button>
                                |
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input" name="required[]" type="checkbox" {{$question->required ? 'checked' : ''}} value="{{$n}}" id="required_{{$n}}">
                                     <label class="form-check-label" for="required_{{$n}}">
                                        {{__('Required')}}
                                     </label>
                                 </div>
                                 |
                                 <button type="button" class="btn btn-sm"><i class="fas fa-ellipsis-v"></i></button>
                            </div>
                         </div>
                        @endforeach
                    </div>
                    <button class="btn btn-sm btn-primary btn-block" id="new-option"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary">{{__('Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/forms/create.js') }}" defer></script>
@endsection