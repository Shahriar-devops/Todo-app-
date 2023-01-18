$(document).ready(function(){

     // Delete confirmation
        // start
        $('form#delete').on('submit', function (e) {
            var title  = $(this).data('title');
            var yes    = $('#delete').data('yes');
            var cancel = $('#delete').data('cancel');
            e.preventDefault();
            var form = this;

            Swal.fire({
            text: title,
            position: 'top',
            width: 300,
            showOkButton: true,
            showCancelButton: true,
            confirmButtonText: yes,
            cancelButtonText: cancel,
            }).then((result) => {
            if (result.isConfirmed){
                form.submit();
            }
            })
        });
    // end


    var year = '1901:'+new Date().getFullYear();
    $('.dateofbirth').datepicker({
        changeMonth:true,
        dateFormat: 'dd-mm-yy',
        yearRange: year,
        changeYear:true,
    });

    $('[data-toggle="tooltip"]').tooltip();


    //tinymce textarea editor
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'help'
          ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
        menu: {
            favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
        },
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css',
        branding:false
      });

      if($(window).width() <= 992){
            $('.mobile-logo').removeClass('d-none');
            $('.desktop-logo').addClass('d-none');
    }else{
            $("#main-wrapper").removeClass("menu-toggle");
            $('.desktop-logo').removeClass('d-none');
            $('.mobile-logo').addClass('d-none');
    }
      $( window ).resize(function() {
           if($(window).width() <= 992){
                $("#main-wrapper").addClass("menu-toggle");
                $('.mobile-logo').removeClass('d-none');
                $('.desktop-logo').addClass('d-none');
           }else{
                $("#main-wrapper").removeClass("menu-toggle");
                $('.desktop-logo').removeClass('d-none');
                $('.mobile-logo').addClass('d-none');
           }
      });

});
