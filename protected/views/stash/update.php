<?php
/* @var $this StashController */
/* @var $model Stash */
$this->breadcrumbs = array(
    $model->stash_name => $model->url,
    'Update',
);
?>

    <h1>Update <i><?php echo CHtml::encode($model->stash_name); ?></i></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>