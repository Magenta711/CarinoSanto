@php
    function answerQuestion($order, $question,$url){
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
                    $value = $value.'<a href="'.$url.'/storage/upload/files/'.$answer->answer.'" target="_blank" class="btn btn-link">'.$url.'/storage/upload/files/'.$answer->answer.'</a><br>';
                }
            }
        }
        return $value;
    }
@endphp
<table>
    <thead>
        <tr>
            <th colspan="{{ (count($forms->questions) + 3) }}" style="text-align: center;background: #e9bfb9">{{ $forms->name }}</th>
        </tr>
        <tr>
            <th style="background: #e9bfb9">Id</th>
            <th style="background: #e9bfb9">{{__('Adviser')}}</th>
            @foreach ($forms->questions as $question)
                @if ($question->status)
                    <th style="background: #e9bfb9">{{$question->question}}</th>
                @endif
            @endforeach
            <th style="background: #e9bfb9">{{__('Date')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($forms->orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                @foreach ($forms->questions as $question)
                    @if ($question->status)
                        <td>{!!answerQuestion($order,$question,config('app.url'))!!}</td>
                    @endif
                @endforeach
                <td>{{$order->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>