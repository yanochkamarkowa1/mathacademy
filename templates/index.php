<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php') ?>
<div class="about-slider">
    <img src="/img/upload/welcome.jpg">
</div>
<div class="news">
    <h4>Дела текущие</h4>
    <table>
        <?foreach($news as $item):?>
            <tr><td><?=$item['data']?></td><td><a href="/news_detail.php?id=<?=$item['id']?>"><?=$item['name']?></a></td></tr>
        <?endforeach;?>
    </table>
</div>
<div class="about-text">
    <h4>О нас</h4>
    <p>
        <b>Дополнительная образовательная программа для учащихся 5-х классов,</b>
        желающих расширить и углубить свои знания и умения в математике как школьной, так и олимпиадной.
    </p>
    <p>
        <b>Цели программы:</b>
        развитие творческих способностей, логического мышления,
        расширение общего кругозора учащихся, формирование психологической готовности к решению трудных и
        нестандартных задач.
    </p>
    <p>Программа включает в себя темы и задачи, которые могут быть условно разнесены на три раздела:</p>
    <ul>
        <li>– углубление школьного курса;</li>
        <li>– факультативный материал;</li>
        <li>– олимпиадные задачи начального уровня.</li>
    </ul>
    <p>
        Ребята не всегда имеют возможность сделать верный выбор в своих увлечениях или пристрастиях,
        разобраться в своих способностях и наклонностях, если им вовремя не удалось окунуться в необходимую
        или просто иную среду.
    </p>
    <p>
        Независимо от способностей развитое мышление способствует развитию личности молодого человека.
        Развивая логическое, в том числе и математическое мышление ребенка, мы создаем базу для более свободного
        выбора им своих будущих увлечений.
    </p>
    <p>
        Занимательные вопросы и задачи по математике, геометрии, логике, материалы математических олимпиад,
        интересные и занимательные истории про великих математиков, головоломки, математические соревнования и многое
        другое будет предложено пятиклассникам в «Академии занимательной математики».
    </p>
    <p>
        Программа рассчитана на 72 часа, в том числе 27 часов самостоятельной работы учащихся.
        Реализация программы осуществляется <b>на протяжении одного учебного года</b>.
    </p>
    <p>
        Аудиторные занятия проводятся <b>1 раз в неделю каждый четверг</b>, продолжительность одного занятия – 60 минут
        (с перерывом 5 минут).
    </p>
    <p>
        <b>Место проведения</b> – ТГПУ им. Л.Н.Толстого, учебный корпус №4, ауд. 304.
    </p>
    <p>
        Стоимость одного занятия – <b>250 рублей</b>.
    </p>
    <p>
        Контактная информация:
        <b>Телефон: 8(4872) 65-78-29</b> (деканат факультета математики, физики и информатики).

    </p>
</div>
<div class="links-list">
    <h4>Полезные ссылки</h4>
    <div class="links-item__container">
        <div class="links-item">
            <div class="links-item__title">МАЛЫЙ МЕХМАТ МГУ</div>
            <a href="http://mmmf.msu.ru/for_schools/">
                <img src="/img/upload/mechmat.jpg">
            </a>
        </div>
    </div>
    <div class="links-item__container">
        <div class="links-item">
            <div class="links-item__title">Math.ru</div>
            <a href="http://www.math.ru/">
                <img src="/img/upload/math.jpg">
            </a>
        </div>
    </div>
    <div class="links-item__container">
        <div class="links-item">
            <div class="links-item__title">Математические этюды</div>
            <a href="http://www.etudes.ru/">
                <img src="/img/upload/etudes.jpg">
            </a>
        </div>
    </div>
    <div class="links-item__container">
        <div class="links-item">
            <div class="links-item__title">Математика - онлайн</div>
            <a href="http://www.math-on-line.com">
                <img src="/img/upload/mathonline.jpg">
            </a>
        </div>
    </div>
    <div class="links-item__container">
        <div class="links-item">
            <div class="links-item__title">ТГПУ им. Л. Н. Толстого</div>
            <a href="http://tsput.ru">
                <img src="/img/tgpu.png">
            </a>
        </div>
    </div>
    <div class="links-item__container">
        <div class="links-item">
            <div class="links-item__title">ТГПУ им. Л. Н. Толстого</div>
            <a href="http://tsput.ru">
                <img src="/img/tgpu.png">
            </a>
        </div>
    </div>
</div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php') ?>