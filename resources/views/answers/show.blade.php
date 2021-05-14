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
                $exten = explode('.',$answer->answer);
                if ($exten[count($exten) - 1] == 'jpg' || $exten[count($exten) - 1] == 'png'){
                    $o = '<img src="/storage/upload/files/'.$answer->answer.'" width="100px" height="auto" class="img-rounded figure-img img-fluid rounded" alt="'.$answer->answer.'">';
                }else {
                    $o = $answer->answer;
                }
                $value = $value.'<a href="/storage/upload/files/'.$answer->answer.'" target="_blank" class="m-2">'.$o.'</a>';
            }
        }
    }
    return $value;
}
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-body">
                    <div class="card card-body mb-3">
                        <h3 class="card-title">{{$id->form->name}}</h3>
                        <p class="card-text">{{$id->form->description}}</p>
                        <span class="text-danger">*{{__('Required')}}</span>
                    </div>
                    @foreach ($id->form->questions as $question)
                        <div class="card card-body mb-3">
                            <label class="label-text"> {{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                            @include('answers.includes.answer')
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endsection