<form class="feedback-form" action="" method="post">
    <table>
        <tr>
            <td><label for="fio">Фамилия Имя Отчество</label></td>
            <td>
                <?if($errors['fio']):?>
                    <div class="form__error"><?=$errors['fio']?></div>
                <?endif;?>
                <input id="fio" name="fio" type="text" value="<?=$oldValues['fio']?>">
            </td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td>
                <?if($errors['email']):?>
                    <div class="form__error"><?=$errors['email']?></div>
                <?endif;?>
                <input id="email" name="email" type="email" value="<?=$oldValues['email']?>">
            </td>
        </tr>
        <tr>
            <td><label for="text">Текст сообщения</label></td>
            <td>
                <?if($errors['text']):?>
                    <div class="form__error"><?=$errors['text']?></div>
                <?endif;?>
                <textarea name="text" id="text"><?=$oldValues['text']?></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <?if($errors['captcha']):?>
                    <div class="form__error"><?=$errors['captcha']?></div>
                <?endif;?>
                <div class="g-recaptcha" data-sitekey="6LegoiYUAAAAANrJAl6LKQNgRtUspI4V_5AjxB55"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input name="submit" type="submit" value="Отправить">
                <?if($formDone):?>
                    <div class="form__done">Форма успешно отправлена</div>
                <?endif;?>
            </td>
        </tr>
    </table>
</form>