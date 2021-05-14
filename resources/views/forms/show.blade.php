@extends('layouts.app')

@include('forms.includes.elements_create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body mb-3">
                <h3 class="card-title">{{$id->name}}</h3>
                <p class="card-text">{{$id->description}}</p>
                <span class="text-danger">*Required</span>
            </div>
            @foreach ($id->questions as $question)
                @if ($question->status)
                    <div class="card card-body mb-3">
                        <label for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                        @include('forms.includes.type_controls')
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection