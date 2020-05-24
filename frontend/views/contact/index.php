<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
\frontend\assets\YandexMapsAsset::register($this)
?>

<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="contact-map mb-10">
            <div id="map"></div>
        </div>
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Viber/WhatsApp <br>+ 7 927 207-53-53</p>
                            <p>+7(846) 260-57-64</p>
                            <p>+7 (846) 268-95-65</p>
                            <p>+7 902 374-38-76</p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="#">tana-sklad@mail.ru</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>443070, г.Самара,</p>
                            <p>ул.Партизанская, дом 17</p>
                            <p>«Волга-Мебель»</p>
                        </div>
                    </div>
                    <div class="contact-social text-center">
                        <h3>ООО ТАНА</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Обратная связь</h2>
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'contact-form','options' =>['class' => 'contact-form-style']]); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <?= $form->field($model, 'name')->textInput(['placeholder'=>'Имя'])->label(false) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($model, 'email')->textInput(['placeholder'=>'Email'])->label(false) ?>
                            </div>
                            <div class="col-lg-12">
                                <?= $form->field($model, 'subject')->textInput(['placeholder'=>'Тема письма'])->label(false) ?>
                            </div>
                            <div class="col-lg-12">
                                <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder'=>'Сообщение'])->label(false) ?>
                                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                        'options' => ['placeholder'=>'Введите цыфры'],
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ])->label(false) ?>
                                <?= Html::submitButton('Отправить', ['class' => 'submit', 'name' => 'contact-button']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<<JS
//Инициализация карты
ymaps.ready(init);
var myMap,
    myPlacemark,
    myPlacemark2,
    myPlacemark3,
    myPlacemark4,
    myPlacemark5;

function init(){
    myMap = new ymaps.Map("map", {
        center: [53.192010, 50.166579],
        zoom: 15,
        controls: []
    });

    var settings = {
        // Опции.
        // Своё изображение иконки метки.
        iconLayout: 'default#image',
        //iconImageHref: '/img/marker.png',
        // Размеры метки.
        //iconImageSize: [68, 66],
        // Смещение левого верхнего угла иконки относительно
        // её "ножки" (точки привязки).
        //iconImageOffset: [-20, -60]
    };

    var zoomControl = new ymaps.control.ZoomControl({
        options: {
            position: {
                right: 10,
                top: 10
            },
            size: 'small'
        }
    });

    myMap.controls.add(zoomControl);
    myPlacemark = new ymaps.Placemark([53.192010, 50.166579], {}, settings);
    myMap.geoObjects.add(myPlacemark);
    myMap.behaviors.disable('scrollZoom');
}
JS;

$this->registerJs($script,\yii\web\View::POS_READY);
?>