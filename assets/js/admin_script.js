$('button.location').click(function () {
   var id = $(this).data('id');
   $.ajax({
       url: '/admin/show_location/?id='+id,
       success: function (response) {
           $('.popup__content').html(response);
           $('.popup').show();
       }
   });
});

$(document).on('click', 'button.location__save', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    var data = $('.location__form').serialize();
    $.ajax({
        url: '/admin/save_location/?id='+id,
        type: 'post',
        data: data,
        success: function (response) {
            if(response == 1){
                alert('Элемент успешно обновлён');
                location.reload();
            }else{
                alert('Произошла ошибка при сохранении');
            }
        }
    });
});

$('.popup__close').click(function () {
    $('.popup').hide();
});