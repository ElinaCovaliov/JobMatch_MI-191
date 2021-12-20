var AjaxRequest = function (request_url, return_url) {
    var initAjaxRequest = function (request_url, return_url) {

        $("#submit_form").submit(function (e) {
            e.preventDefault();
            for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
            }
            var me = $(this);
            var form_value = $(this).serializeArray();
            $.ajax(
                {
                    url: request_url,
                    type: "POST",
                    dataType: 'json',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success: function (respond) {
                        if (respond.success) {
                            location.href = return_url;
                        }
                        else {
                            validation_form(respond.error_respons, form_value);
                            if(respond.message){
                                alert(respond.message);
                            }
                        }
                    },
                    error: function () {
                        alert('Error request');
                    }
                });

        });

        function validation_form(error_respons, form_value) {

            $('.validate_text').remove();
            $.each(error_respons, function (i, item) {
                $.each(form_value, function (index, val) {
                    if (val.name == i) {
                        //control tip cimp
                        if($('input[name="' + i + '"]').length){
                            $('input[name="' + i + '"]').after("<p class='validate_text' style='color:red'>" + item + "</p>")
                        }

                        if($('textarea[name="' + i + '"]').length){
                            $('textarea[name="' + i + '"]').after("<p class='validate_text' style='color:red'>" + item + "</p>")
                        }
                    }
                });
            });

        }

    }


    return {

        //main function to initiate the module
        init: function (request_url, return_url) {
            initAjaxRequest(request_url, return_url);
        }

    };

}();
