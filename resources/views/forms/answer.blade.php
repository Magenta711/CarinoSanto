@extends('layouts.app')

@php
    function answerQuestion($order, $question){
        $value = '';
        foreach ($order->answers as $answer){
            if ($answer->question_id == $question->id){
                if ($question->type == '1' || $question->type == '2' || $question->type == '7' || $question->type == '8'){
                    $value = $answer->answer;
                }
                if ($question->type == '3' || $question->type == '5'){
                    foreach ($question->options as $option){
                        if ($answer->answer == $option->id){
                            $value = $option->option;
                        }
                    }
                }
                if ($question->type == '4'){
                    foreach ($question->options as $option){
                        if ($answer->answer == $option->id){
                            $value = $value.$option->option.'<br>';
                        }
                    }
                }
                if ($question->type == '6'){
                    $value = $value.'<a href="/storage/upload/files/'.$answer->answer.'" target="_blank" class="btn btn-link">'.$answer->answer.'</a><br>';
                }
            }
        }
        return $value;
    }

    $already = false;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="col-md-12">
                        <i class="fab fa-wpforms"></i> {{$id->name}}
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
                                    <th>{{__('Adviser')}}</th>
                                    @foreach ($id->questions as $question)
                                    <th>{{$question->question}}</th>
                                    @endforeach
                                    <th>{{__('Date')}}</th>
                                    <th>/</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->hasPermissionTo('Ver todas las respuestas'))
                                @php
                                    $already = true;
                                @endphp
                                    @foreach ($id->orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user->name}}</td>
                                        @foreach ($id->questions as $question)
                                            <td>{!!answerQuestion($order,$question)!!}</td>
                                        @endforeach
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a href="{{route('answers_show',$order->id)}}" class="btn btn-sm btn-primary">{{__("Show")}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                @if (!$already && Auth::user()->hasPermissionTo('Ver respuestas del cliente propias'))
                                    @foreach ($id->orders as $order)
                                        @if (Auth::user()->id == $order->user_id)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->user->name}}</td>
                                                @foreach ($id->questions as $question)
                                                    <td>{!!answerQuestion($order,$question)!!}</td>
                                                @endforeach
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <a href="{{route('answers_show',$order->id)}}" class="btn btn-sm btn-primary">{{ __('Show') }}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
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