var FormValidation = function () {

    var handleValidation1 = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form1 = $('#form_validation');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
            },
        });

    }
    var handleValidation2 = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form2 = $('#form_validation_password');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                old_password: {
                    required: true
                },
                new_password: {
                    required: true,
                },
                confirm_new_password: {
                    required: true,
                    equalTo: "#new_password"
                }, 
            },
            
            messages: { // custom messages for radio buttons and checkboxes
                old_password: {
                    required: 'Please enter old password'
                },
                new_password: {
                    required: 'Please enter new password'
                },
                confirm_new_password: {
                    required: 'Please confirm new password',
                    equalTo: "New password and confirm new password should be same"
                }, 
            }
        });

    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
            handleValidation2();

        }

    };

}();