$(document).ready(function() {
    //Title
    $('#name').keyup(function(){
        $('#form-tiple').text(this.value);
    });
    $('.questions').click(function(e){
    });
    //New question
    setTimeout(function() {
        $('.types').change(function () {
            changeControl(this);
        });
        //destroy question
        $('.btn-destroy').click(function (e) {
            e.preventDefault();
            deleteQuestion(this);
        });
        
        // news options
        $('.btn-new-option-radio').click(function (e) {
            e.preventDefault();
            newOptionRadio(this);
        });
        $('.btn-new-option-checkbox').click(function (e) {
            e.preventDefault();
                newOptionCheckbox(this);
        });
        $('.btn-new-option-select').click(function (e) {
            e.preventDefault();
            newOptionSelect(this);
        });
        //delete option
        $('.btn-delete-option-radio').click(function (e) {
            e.preventDefault();
            deleteOptionRadio(this);
        });
        $('.btn-delete-option-checkbox').click(function (e) {
            e.preventDefault();
            deleteOptionCheckbox(this);
        });
        $('.btn-delete-option-select').click(function (e) {
            e.preventDefault();
            deleteOptionSelect(this);
        });
        $('.file_option_checked').click(function(){
            checkOptionFile(this);
        });
    }, 1000);
    $('#new-option').click(function(e){
        e.preventDefault();
        ele = $('.questions');
        num = ele.length;
        if (ele.length > 1) {
            id = $('.questions')[ele.length - 1].id.split("_")[$('.questions')[ele.length - 1].id.split("_").length - 1];
            num = parseInt(id) + 1;
        }
        var newQuestion = $('#question').clone().appendTo('#destino_question');
        newQuestion.attr('id','question_'+num);
        newQuestion.children().children().children('.type-options').children().attr('id','type_'+num).change(function () {
            changeControl(this);
        });
        newQuestion.children().children().children('.detino').attr('id','detino_'+num);
        newQuestion.children('.card-footer').children('.destroy').attr('id','destroy_'+num).click(function (e) {
            e.preventDefault();
            deleteQuestion(this);
        });
        newQuestion.children('.card-footer').children('.form-check').children('input').attr('id','required_'+num).val(num);
        newQuestion.children('.card-footer').children('.form-check').children('label').attr('for','required_'+num);
    });

});


//Change type control question
function changeControl(ele) {
    // console.log(e.currentTarget.id);
    var item = ele.id.split("_")[ele.id.split("_").length - 1];
    select = $('#type_'+item);
    v = select.val();
    $('#detino_'+item).children().remove();
    switch (v) {
        case '1':
            $("#text-option").clone().appendTo("#detino_"+item);
            break;
        case '2':
            $("#textarea-option").clone().appendTo("#detino_"+item);
            break;
        case '3':
            var newELemento = $("#radio-option").clone().appendTo("#detino_"+item);
            newELemento.children().children('.custom-radio').addClass('option-radio_'+item);
            newELemento.children().children('.custom-radio').attr('id','option-radio_'+item+'_1');
            newELemento.children().children().children().children().children().val('Option 1');
            newELemento.children().children().children().children().children().children().attr('id','delete_option_radio_'+item+'_1').click(function (e) {
                e.preventDefault();
                deleteOptionRadio(this);
            });
            newELemento.children().children('.option-new').attr('id','option_destion_'+item);
            newELemento.children('button').attr('id','new_option_radio_'+item).click(function (e) {
                e.preventDefault();
                newOptionRadio(this);
            });
            newELemento.children('input').attr('id','num_option_'+item).val(1);
            break;
        case '4':
            var newElemento = $("#checkbox-option").clone().appendTo("#detino_"+item);
            newElemento.children().children('.custom-checkbox').addClass('option-checkbox_'+item);
            newElemento.children().children('.custom-checkbox').attr('id','option-checkbox_'+item+'_1');
            newElemento.children().children().children().children().children().val('Option 1');
            newElemento.children().children().children().children().children().children().attr('id','delete_option_checkbox_'+item+'_1').click(function (e){
                e.preventDefault();
                deleteOptionCheckbox(this);
            });
            newElemento.children().children('.option-new').attr('id','option_destion_'+item);
            newElemento.children('button').attr('id','new_option_checkbox_'+item).click(function (e) {
                e.preventDefault();
                newOptionCheckbox(this);
            });
            newElemento.children('input').attr('id','num_option_'+item).val(1);
            break;
        case '5':
            var newELemento = $("#select-option").clone().appendTo("#detino_"+item);
            newELemento.children().children('.input-group').addClass('option-select_'+item);
            newELemento.children().children('.input-group').attr('id','option-select_'+item+'_1');
            newELemento.children().children().children().val('Option 1');
            newELemento.children().children().children().children().children().attr('id','delete_option_select_'+item+'_1').click(function (e) {
                e.preventDefault();
                deleteOptionSelect(this);
            });
            newELemento.children().children('.option-new').attr('id','option_destion_'+item);
            newELemento.children('button').attr('id','new_option_select_'+item).click(function (e) {
                e.preventDefault();
                newOptionSelect(this);
            });
            newELemento.children('input').attr('id','num_option_'+item).val(1);
            break;
        case '6':
            var newElemento = $("#file-option").clone().appendTo("#detino_"+item);
            for (let i = 0; i < newElemento.children().length; i++) {
                if (newElemento.children()[i].children[0] != undefined) {
                    newElemento.children()[i].children[0].className = ('file_option_'+item);
                    newElemento.children()[i].children[0].id = ('file_option_'+i+'_'+item);
                    $('#file_option_'+i+'_'+item).click(function(){
                        checkOptionFile(this);
                    });
                    newElemento.children()[i].children[1].setAttribute('for', 'file_option_'+i+'_'+item);
                }
            }
            newElemento.children('input').attr('id','num_option_'+item).val(0);
            break;
        case '7':
            $("#date-option").clone().appendTo("#detino_"+item);
            break;
        case '8':
            $("#time-option").clone().appendTo("#detino_"+item);
            break;
        default:
            break;
    }
}
//Delete question
function deleteQuestion(ele) {
    item = ele.id.split("_")[ele.id.split("_").length - 1];
    $('#question_'+item).remove();
}
// new option for radio
function newOptionRadio(ele) {
    item = ele.id.split("_")[ele.id.split("_").length - 1];
    opt = $('.option-radio_'+item);
    num = opt.length;
    if (num) {
        id = opt[num - 1].id.split("_")[opt[num - 1].id.split("_").length - 1];
        num = parseInt(id) + 1;
    }else{
        num = 1
    }   
    newELemento = $("#option-radio").clone().appendTo("#option_destion_"+item);
    newELemento.addClass('option-radio_'+item);
    newELemento.children().children().children().children().attr('id','delete_option_radio_'+item+'_'+num).click(function (e) {
        e.preventDefault();
        deleteOptionRadio(this);
    });
    newELemento.attr('id','option-radio_'+item+'_'+num);
    newELemento.children().children().children().val('Option '+num);
    $('#num_option_'+item).val((opt.length + 1));
}
// Delete option radio
function deleteOptionRadio(ele) {
    opt = ele.id.split("_")[ele.id.split("_").length - 1];
    item = ele.id.split("_")[ele.id.split("_").length - 2];
    $('#option-radio_'+item+'_'+opt).remove();
    $('#num_option_'+item).val(($('.option-radio_'+item).length - 1));
}

// new option checkbox
function newOptionCheckbox(ele){
    item = ele.id.split("_")[ele.id.split("_").length - 1];
    opt = $('.option-checkbox_'+item);
    num = opt.length;
    if (num) {
        id = opt[num - 1].id.split("_")[opt[num - 1].id.split("_").length - 1];
        num = parseInt(id) + 1;
    }else{
        num = 1
    }
    newELemento = $("#option-checkbox").clone().appendTo("#option_destion_"+item);
    newELemento.addClass('option-checkbox_'+item);
    newELemento.children().children().children().children().attr('id','delete_option_checkbox_'+item+'_'+num).click(function (e) {
        e.preventDefault();
        deleteOptionCheckbox(this);
    });
    newELemento.attr('id','option-checkbox_'+item+'_'+num);
    newELemento.children().children().children().val('Option '+num);
    $('#num_option_'+item).val((opt.length + 1));
}
// Delete option checkbox
function deleteOptionCheckbox(ele){
    opt = ele.id.split("_")[ele.id.split("_").length - 1];
    item = ele.id.split("_")[ele.id.split("_").length - 2];
    $('#option-checkbox_'+item+'_'+opt).remove();
    $('#num_option_'+item).val((opt.length - 1));
}
// new option select
function newOptionSelect(ele){
    item = ele.id.split("_")[ele.id.split("_").length - 1];
    opt = $('.option-select_'+item);
    num = opt.length;
    if (num) {
        id = opt[num - 1].id.split("_")[opt[num - 1].id.split("_").length - 1];
        num = parseInt(id) + 1;
    }else{
        num = 1
    }
    newELemento = $("#option-select").clone().appendTo("#option_destion_"+item);
    newELemento.addClass('option-select_'+item);
    newELemento.children().children().children().attr('id','delete_option_select_'+item+'_'+num).click(function (e) {
        e.preventDefault();
        deleteOptionSelect(this);
    });
    newELemento.attr('id','option-select_'+item+'_'+num);
    newELemento.children().val('Option '+num);
    $('#num_option_'+item).val((opt.length + 1));
}
// Delete option Select
function deleteOptionSelect(ele){
    opt = ele.id.split("_")[ele.id.split("_").length - 1];
    item = ele.id.split("_")[ele.id.split("_").length - 2];
    $('#option-select_'+item+'_'+opt).remove();
    $('#num_option_'+item).val((opt.length - 1));
}

// Checked file
function checkOptionFile(ele){
    item = ele.id.split("_")[ele.id.split("_").length - 1];
    n = 0;
    types = $('.file_option_'+item);
    for (let i = 0; i < types.length; i++) {
        if (types[i].checked) {
            n++;
        }
    }
    $('#num_option_'+item).val(n);
}