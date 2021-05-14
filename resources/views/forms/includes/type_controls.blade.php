@switch($question->type)
@case('1')
        {{" "}}
        <input type="text" value="" name="text[]" placeholder="Respuesta" id="input_{{$question->id}}" class="form-control {{ $question->required ? 'required' : '' }}">
        @break
    @case('2')
        <textarea name="text_area[]" id="input_{{$question->id}}"  placeholder="Respuesta" class="form-control" cols="30" rows="2"></textarea>
        @break
    @case('3')
        @foreach ($question->options as $option)
            <div class="custom-control custom-radio">
                <input type="radio" id="radio_{{$option->id}}" name="radio[{{$question->id}}]" value="{{$option->id}}" class="custom-control-input radios_{{$question->id}} {{ $question->required ? 'required' : '' }}">
                <label class="custom-control-label" for="radio_{{$option->id}}">
                    {{$option->option}}
                </label>
            </div>
        @endforeach
        @break
    @case('4')
        @foreach ($question->options as $option)
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox[]" class="custom-control-input checkbox checkeds_{{$question->id}} {{ $question->required ? 'required' : '' }}" value="{{$option->id}}" id="checkbox_{{$question->id}}_{{$option->id}}">
                <label class="custom-control-label" for="checkbox_{{$question->id}}_{{$option->id}}">
                    {{$option->option}}
                </label>
            </div>
        @endforeach
        <input type="hidden" value="0" name="num_checked[]" id="num_checked_{{$question->id}}">
        @break
    @case('5')
        <select name="select[]" id="input_{{$question->id}}" class="form-control {{ $question->required ? 'required' : '' }}">
            <option disable>Selecciona una opción</option>
            @foreach ($question->options as $option)
                <option value="{{$option->id}}">{{$option->option}}</option>
            @endforeach
        </select>
        @break
    @case('6')
        {{--  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_upload_{{$question->id}}">Open</button>  --}}
        {{--  @include('forms.includes.modals.upload')  --}}
        <label for="input_{{$question->id}}" class="form-control text-center" id="label_file_input_{{$question->id}}"><i class="fas fa-upload"></i></label>
        <input type="file" value="" multiple name="file[]" id="input_{{$question->id}}" class="form-control file_input {{ $question->required ? 'required' : '' }}" accept=" @foreach ($question->options as $option) @switch($option->option) @case('document') .doc,.docx @break @case('worksheets') .xml @break @case('pdf') .pdf @break @case('image') image/* @break @case('video') video/* @break @default @endswitch , @endforeach " style="display: none">
        <input type="hidden" name="num_file[]" value="0" id="num_file_{{$question->id}}">
        <small class="text-muted" id="text_num_file_{{$question->id}}"></small>
        @break
    @case('7')
        <input type="date" value="" id="input_{{$question->id}}" placeholder="Respuesta" class="form-control {{ $question->required ? 'required' : '' }}" name="date[]">
        @break
    @case('8')
        <input type="time" value="" id="input_{{$question->id}}" placeholder="Respuesta" class="form-control {{ $question->required ? 'required' : '' }}" name="time[]">
        @break
    @default
@endswitch