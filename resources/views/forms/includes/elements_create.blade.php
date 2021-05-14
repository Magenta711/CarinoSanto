<div class="d-none">
    {{-- Card --}}
    <div class="card mb-3 questions" id="question">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group card-title">
                        <input type="hidden" value="0" name="question_id[]">
                         <input type="question" value="{{__('Title of the question')}}" placeholder="{{__('Title of the question')}}" name="question[]" id="question" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 type-options">
                    <select name="type[]" id="type" class="form-control types">
                        <option selected disabled>Selecciona una opción</option>
                        <option value="1"><i class="fas fa-grip-lines"></i> Respuesta breve</option>
                        <option value="2"><i class="fas fa-align-justify"></i> Párrafo</option>
                        <option value="3"><i class="fas fa-dot-circle"></i> Opción multiple</option>
                        <option value="4">Casilla de verificación</option>
                        <option value="5">Lista desplegable</option>
                        <option value="6">Cargar archivo</option>
                        <option value="7">Fecha</option>
                        <option value="8">Hora</option>
                    </select>
                </div>
                <div class="col-md-12 detino" id="detino">
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-sm destroy"><i class="fas fa-trash-alt"></i></button>
            |
             <div class="form-check form-check-inline">
                 <input class="form-check-input" name="required[]" type="checkbox" value="" id="required">
                 <label class="form-check-label" for="required">
                    {{__('Required')}}
                 </label>
             </div>
             |
             <button type="button" class="btn btn-sm"><i class="fas fa-ellipsis-v"></i></button>
        </div>
     </div>
    {{-- Opciones --}}
    <div class="form-group" id="text-option">
        <input type="text" readonly name="text[]" id="text" class="form-control">
    </div>
    <div class="form-group" id="textarea-option">
        <textarea name="textarea[]" readonly id="textarea" cols="30" rows="1" class="form-control"></textarea> 
    </div>
    <div id="radio-option">
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input type="radio" id="radio" name="radio[]" class="custom-control-input">
                <label class="custom-control-label" for="radio">
                    <div class="input-group mb-3">
                        <input type="text" name="text_radio[]" id="text-radio" class="form-control" value="Option" placeholder="Option" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-sm" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </label>
            </div>
            <div class="option-new">

            </div>
        </div>
        <input type="hidden" name="num_option[]">
        <button class="btn btn-sm btn-primary btn-block"><i class="fas fa-plus"></i></button>
    </div>
    <div id="checkbox-option">
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">
                    <div class="input-group mb-3">
                        <input type="text" name="text_checkbox[]" id="text-checkbox" class="form-control" value="Option" placeholder="Option" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-sm" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </label>
            </div>
            <div class="option-new">

            </div>
        </div>
        <input type="hidden" name="num_option[]">
        <button class="btn btn-sm btn-primary btn-block"><i class="fas fa-plus"></i></button>
    </div>
    <div id="select-option">
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" name="text_select[]" id="text-select" class="form-control" value="Option" placeholder="Option" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-sm" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="option-new">

            </div>
        </div>
        <input type="hidden" name="num_option[]">
        <button class="btn btn-sm btn-primary btn-block"><i class="fas fa-plus"></i></button>
    </div>
    <div class="form-group" id="file-option">
        <label for="">Permitir solo archivos de tipo</label>
        <div class="form-check">
            <input type="checkbox" value="document" name="type_file[]" class="form-check-input" id="file_option_1">
            <label class="form-check-label" for="file_option_1">
                Documento
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" value="worksheets" name="type_file[]" class="form-check-input" id="file_option_2">
            <label class="form-check-label" for="file_option_2">
                Hoja de calculo
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" value="pdf" name="type_file[]" class="form-check-input" id="file_option_3">
            <label class="form-check-label" for="file_option_3">
                PDF
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" value="image" name="type_file[]" class="form-check-input" id="file_option_4">
            <label class="form-check-label" for="file_option_4">
                Imagen
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" value="video" name="type_file[]" class="form-check-input" id="file_option_5">
            <label class="form-check-label" for="file_option_5">
                Video
            </label>
        </div>
        <input type="hidden" name="num_option_file[]">
    </div>
    <div class="form-group" id="date-option">
        <input type="date" readonly name="date[]" id="" class="form-control">
    </div>
    <div class="form-group" id="time-option">
        <input type="time" readonly name="time[]" id="" class="form-control">
    </div>

    {{-- Option radio --}}
    <div class="custom-control custom-radio" id="option-radio">
        <input type="radio" id="radio" name="radio[]" class="custom-control-input">
        <label class="custom-control-label" for="radio">
            <div class="input-group mb-3">
                <input type="text" name="text_radio[]" id="text-radio" class="form-control" value="Option" placeholder="Option" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-sm" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </label>
    </div>
    {{-- option checkbox --}}
    <div class="custom-control custom-checkbox" id="option-checkbox">
        <input type="checkbox" name="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1">
            <div class="input-group mb-3">
                <input type="text" name="text_checkbox[]" id="text-checkbox" class="form-control" value="Option" placeholder="Option" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-sm" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </label>
    </div>
    {{-- option select --}}
    <div class="input-group mb-3" id="option-select">
        <input type="text" name="text_select[]" id="text-select" class="form-control" value="Option" placeholder="Option" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-sm" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
        </div>
    </div>
</div>