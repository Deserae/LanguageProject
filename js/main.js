
    
$(function() {

    tinymce.init({
        selector:'textarea',
        resize: true
    });

    $('#editButton').click(function(){
        var content = tinymce.activeEditor.getContent();
        $('#updatedContent').val(content);
    });

    $('#newPostButton').click(function(){
        var content = tinymce.activeEditor.getContent();
        $('#newPost').val(content);
    });


    // Use Reptile Forms
    var form = new ReptileForm('form', {
        validationError: function(err) {

            
            for (i in err) {
                $('ul').append('<li>' + err[i].title + ' ' + err[i].msg + '</li>');
            }

        },
        submitError: function(xhr, settings, thrownError) {
            
            // Handle server errors any way you want
            this.el.before('<p>Error From Server</p>');

        },
        submitSuccess: function(data) {

            // Handle successful submissions any way you want
            if (data.redirect) {
                location.href = data.redirect;
            } else if (data.message) {
                alert(data.message)
            }

        }
    });


    form.customValidation('validateContent', function(formField) {
        return $('textarea').val();
    });


});
