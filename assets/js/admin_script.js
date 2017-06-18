$('button.show__popup').click(function () {
   var url = $(this).data('url');
   $.ajax({
       url: url,
       success: function (response) {
           $('.popup__content').html(response);
           $('.popup').show();
       }
   });
});

$(document).on('click', 'button.element__save', function (event) {
    event.preventDefault();
    var url = $(this).data('url');
    var data = $('.element__form').serialize();
    $.ajax({
        url: url,
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

$(document).on('click', 'button.element__delete', function (event) {
    event.preventDefault();
    var url = $(this).data('url');
    $.ajax({
        url: url,
        success: function (response) {
            if(response == 1){
                alert('Элемент успешно удалён');
                location.reload();
            }else{
                alert('Произошла ошибка при удалении');
            }
        }
    });
});

$('.popup__close').click(function () {
    $('.popup').hide();
});