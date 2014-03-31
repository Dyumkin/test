<?php
/* @var $this StashController */
/* @var $model Stash */
$this->breadcrumbs = array(
    'Тайники' => array('index'),
    $model->stash_name => $model->url,
    'Обновление',
);
?>

    <h1>Изменения тайника <i><?php echo CHtml::encode($model->stash_name); ?></i></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>