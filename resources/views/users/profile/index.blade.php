@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.alerts')
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="" class="label-text">Name</label>
                        <p class="p-answer">{{Auth::user()->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-text">Email</label>
                        <p class="p-answer">{{Auth::user()->email}}</p>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-text">Role</label>
                        <p class="p-answer">{{Auth::user()->getRoleNames()[0]}}</p>
                    </div>
                    <hr>
                    <button class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#modal_edit">Edit</button>
                    @include('users.profile.includes.modals.edit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection