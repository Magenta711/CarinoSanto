@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fas fa-user-friends"></i> Clients
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>/</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->adviser->name}}</td>
                                    <td>{{$item->client->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>Admin</td>
                                    <td><button class="btn btn-sm btn-primary">Show</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection