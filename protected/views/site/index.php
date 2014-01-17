<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div class="container">
    <div id="myCarousel" class="carousel">
        <!-- Картинки в карусельке -->
        <div class="carousel-inner">
            <div class="active item"><?php echo CHtml::image('/images/carousel/1501.jpg'); ?></div>
            <div class="item"><?php echo CHtml::image('/images/carousel/picture-1011.jpg'); ?></div>
            <div class="item"><?php echo CHtml::image('/images/carousel/vm_d30317s69e.jpg'); ?></div>
        </div>
        <!-- Навигационные элементы -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>

