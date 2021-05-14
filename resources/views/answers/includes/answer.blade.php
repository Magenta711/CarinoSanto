@switch($question->type)
@case('1')
        {{" "}}
        <p class="p-answer">{{answerQuestion($id,$question)}}</p>
        @break
    @case('2')
        <p class="p-answer">{!!str_replace("\n", '</br>', addslashes(answerQuestion($id,$question)))!!}</p>
        @break
    @case('3')
        <p class="p-answer">{{(answerQuestion($id,$question))}}</p>
        @break
    @case('4')
        <p class="p-answer">{!!answerQuestion($id,$question)!!}</p>
        @break
    @case('5')
        <p class="p-answer">{{answerQuestion($id,$question)}}</p>
        @break
    @case('6')
        <p>{!!answerQuestion($id,$question)!!}</p>
        @break
    @case('7')
        <p class="p-answer">{{answerQuestion($id,$question)}}</p>
        @break
    @case('8')
        <p class="p-answer">{{answerQuestion($id,$question)}}</p>
        @break
    @default
    
@endswitch