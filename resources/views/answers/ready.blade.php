@extends('layouts.app')

@include('forms.includes.elements_create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body mb-3">
                <h3 class="card-title">Thanks for your reply</h3>
                <p class="card-text">Your answers have been recorded correctly</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/forms/order_create.js') }}" defer></script>
@endsection