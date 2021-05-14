@extends('layouts.app')

@include('forms.includes.elements_create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2 id="form-tiple">{{__('Form without title')}}</h2>
                        </div>
                        <div class="col-sm-4 text-right">
                        </div>
                    </div>
                </div>
                <form action="{{route('forms_store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                    <div class="card card-body mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Form title')}}" value="{{__('Form without title')}}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="1" placeholder="{{__('Description of the form')}}"></textarea>
                        </div>
                    </div>
                    <div id="destino_question">

                    </div>
                    <button class="btn btn-sm btn-primary btn-block" id="new-option"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary">{{__('Save')}}</button>
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