$(document).ready(function () {

    //user status update : active and inactive
    $('.status').change(function (e) {
        var key=$(this).val();
        $.ajax({
            type : 'POST',
            url : $(this).data('url'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {'key':key},
            dataType : "json",
            success : function (data) {
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: 'Status updated successfully'
                    })

                    setTimeout(() => {
                        location.reload();
                    }, 500);
            },
            error:function(data){
                console.log(data);
            }
        });
    });



    //user account update : ban or unban

    $('.banunban').change(function (e) {
        var key=$(this).val();
        $.ajax({
            type : 'POST',
            url : $(this).data('url'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {'key':key},
            dataType : "json",
            success : function (data) {
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: 'Status updated successfully'
                    })
                setTimeout(() => {
                    location.reload();
                }, 500);
            },
            error:function(data){
                console.log(data);
            }
        });
    });




});
