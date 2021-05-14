@extends('layouts.app')

@include('forms.includes.elements_create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{route('answers_store')}}" id="target" autocomplete="off" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-body mb-3">
                <h3 class="card-title">{{$id->name}}</h3>
                <p class="card-text">{{$id->description}}</p>
                <span class="text-danger">*Required</span>
            </div>
            <input type="hidden" name="form" value="{{$id->token}}">
            <input type="hidden" name="user" value="{{$user}}">
            @foreach ($id->questions as $question)
                <div class="card card-body form-group mb-3">
                    <label class="label-text" for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                    @include('forms.includes.type_controls')
                </div>
            @endforeach
            <div class="card card-body mb-3">
                <button class="btn btn-sm btn-primary btn-block btn-save">{{__('Send')}}</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/forms/order_create.js') }}" defer></script>
    <script src="{{ asset('js/forms/upload.js') }}" defer></script>
@endsection