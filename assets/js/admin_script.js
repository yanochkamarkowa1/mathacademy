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
    var data =  new FormData($('.element__form').get(0));
    $.ajax({
        url: url,
        type: 'post',
        data: data,
        contentType: false,
        processData: false,
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
    if(confirm("Вы действительно хотите удалить элемент?")){
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
    }
});

$('.popup__close').click(function () {
    $('.popup').hide();
});