$(document).ready(function() {
    $('.checkbox').click(function () {
        item = this.id.split("_")[this.id.split("_").length - 2];
        n = 0;
        types = $('.checkeds_'+item);
        for (let i = 0; i < types.length; i++) {
            if (types[i].checked) {
                n++;
            }
        }
        $('#num_checked_'+item).val(n);
        if (n != 0) {
            types.removeClass('is-invalid');
        }
    });

    $(".file_input").change(function(){
        item = this.id.split("_")[this.id.split("_").length - 1];
        $('#label_file_input_'+item).children().addClass('text-primary');
        $("#num_file_"+item).val( this.files.length );
        $('#text_num_file_'+item).text('Se subieron '+this.files.length+' archivos');
     });


    $('.btn-save').click(function (e) {
        e.preventDefault();
        $('.is-invalid').removeClass('is-invalid');
        types = $('.required');
        let sema = true;
        for (let i = 0; i < types.length; i++) {
            if (types[i].type == 'text' || types[i].type == 'date' || types[i].type == 'time') {
                id = $('#'+types[i].id);
                if (id.val() === '') {
                    sema = false;
                    id.addClass("is-invalid");
                }
            }

            if (types[i].type == 'file') {
                item = types[i].id.split("_")[types[i].id.split("_").length - 1];
                id = $('#'+types[i].id);
                label = $('#label_file_input_'+item);
                console.log(id);
                if (id.val() == '') {
                    sema = false;
                    label.addClass("is-invalid");
                }
            }
            if (types[i].type == 'checkbox') {
                id = $('#'+types[i].id);
                item = id.attr('class').split(' ')[2].split("_")[id.attr('class').split(' ')[2].split("_").length - 1];
                n = 0;
                typ = $('.checkeds_'+item);
                for (let i = 0; i < typ.length; i++) {
                    if (typ[i].checked) {
                        n++;
                    }
                }
                if (n == 0) {
                    sema = false;
                    typ.addClass("is-invalid");
                }
            }
            if (types[i].type == 'radio') {
                id = $('#'+types[i].id);
                item = id.attr('class').split(' ')[1].split("_")[id.attr('class').split(' ')[1].split("_").length - 1];
                n = 0;
                typ = $('.radios_'+item);
                for (let i = 0; i < typ.length; i++) {
                    if (typ[i].checked) {
                        n++;
                    }
                }
                if (n == 0) {
                    sema = false;
                    id.addClass("is-invalid");
                }
            }
        }
        if (sema) {
            $( "#target" ).submit();
        }
    })
});