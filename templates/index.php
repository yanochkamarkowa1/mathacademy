<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php') ?>
<div class="about-slider">
    <img src="http://www.radostmoya.ru/uploads/images/videoPreview/Logo.jpg">
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
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae vulputate felis. Nunc sagittis in
        enim vitae pretium. Mauris at tincidunt arcu. Integer et euismod ipsum, quis suscipit lacus. Integer ac
        blandit velit, a finibus ante. Nulla sit amet pharetra urna. Quisque faucibus odio neque, ac
        pellentesque tortor rhoncus sed. Morbi tellus leo, mattis in mauris id, malesuada pulvinar urna. Sed at
        posuere lectus, eget cursus orci. Mauris euismod arcu sapien, sit amet egestas orci tincidunt sed. Morbi
        volutpat tempor urna non sodales. In nibh est, vestibulum sed viverra ac, commodo vitae magna. Cras sed
        faucibus enim, malesuada fringilla nibh. Sed felis metus, dictum et commodo id, vulputate et velit. Duis
        ac purus et sapien posuere sollicitudin. Aliquam sit amet porttitor tellus.
    </p>
    <p>
        Nullam eget orci at lacus bibendum elementum. Fusce fringilla, dolor sit amet finibus dapibus, mauris
        dolor maximus leo, sed mattis arcu dui vitae lorem. Phasellus blandit magna vel aliquam eleifend.
        Curabitur volutpat congue dolor, a feugiat justo commodo sit amet. Ut in fermentum dui. Nam nec vehicula
        metus. Vestibulum volutpat in sem nec aliquet. Class aptent taciti sociosqu ad litora torquent per
        conubia nostra, per inceptos himenaeos. Nullam pretium augue ac orci porta, et tempus mi ornare.
    </p>
    <p>
        Proin mi lacus, sagittis sed pharetra eu, laoreet aliquam eros. Cras tincidunt erat venenatis justo
        suscipit, non efficitur eros lacinia. Vestibulum ultricies vel lorem eu bibendum. Praesent quis urna
        semper, vulputate lectus eu, fermentum odio. Fusce ullamcorper enim non tristique imperdiet. Phasellus
        mattis blandit est, vel faucibus nisl tempus vitae. Nam id lorem enim. Fusce placerat tortor eget ipsum
        placerat, nec congue metus molestie.
    </p>
</div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php') ?>