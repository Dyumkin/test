<?php
/* @var $this SiteController */
/* @var $data Stash */
/* @var $notepad Notepad */

$this->pageTitle=Yii::app()->name;
?>
<h1>Добро пожаловать на игру <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/carousel/123.jpg'); ?>
            <div class="carousel-caption">
                <h4>Исторические места Белоруссии</h4>
                <p>Возможность узнать больше о местах и событиях которые происходили</p>
            </div>
        </div>
        <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/carousel/picture-1011.jpg'); ?>
            <div class="carousel-caption">
                <h4>GPS-приёмник</h4>
                <p>Поиск тайников с применением спутниковых навигационных систем</p>
            </div>
        </div>
        <div class="item">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/carousel/11442.jpg'); ?>
            <div class="carousel-caption">
                <h4>Игра</h4>
                <p>Получение удовольствие от поиска, проявление смекалки, применение наблюдательности </p>
            </div>
        </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
<div class="row-fluid">
    <div class="span4">
        <h2>ГеоСтэшинг</h2>
        <p>туристическая игра с применением навигационнаго оборудования. Создана по мотивам игры "Геокешинг"</p>
    </div>
    <div class="span4">
        <h2>Правила игры</h2>
        <p>Ознакомится с правилами игры и узнать как в неё играть можно в разделе
            <?php echo CHtml::link(CHtml::encode('"Правила игры"'), Yii::app()->createUrl('site/rules')); ?>
        </p>
    </div>
    <div class="span4">
        <h2>Стать участником</h2>
        <p>Для того что бы стать участником игры нужно пройти
            <?php echo CHtml::link(CHtml::encode('регистрацию'), Yii::app()->createUrl('user/registration')); ?>
        </p>
    </div>
</div>

<div class="row-fluid">
    <div class="span6">
        <h1>Новые тайники</h1>
        <table class="table table-bordered">

        <?php $i=1;
                foreach ($data as $stash) {
                $table = '<tr class="info"><td>'.$i.'</td>'
                .'<td>'.CHtml::link(CHtml::encode($stash['stash_name']), $stash->getUrl()) . ' от ' . $stash->user->username . ' (' . $stash['create_date'] . ')</td></tr>';
                    $i++;
                    echo $table;
        }
        ?>
        </table>
    </div>

    <div class="span6">
        <h1>Последние записи в блокноте</h1>
        <table class="table table-bordered">

            <?php $i=1;
            foreach ($notepad as $comment) {
                $table = '<tr class="info"><td>'.$i.'</td>'
                    .'<td>'.CHtml::link(CHtml::encode($comment->stash->stash_name), $comment->stash->getUrl()) . ' от ' . $comment->user->username . ' (' . $comment['comment_date'] . ')</td></tr>';
                $i++;
                echo $table;
            }
            ?>
        </table>
    </div>
</div>