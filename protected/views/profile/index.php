<?php
/* @var $this ProfileController */
/* @var $model User */
/* @var $massage Massage */

$this->breadcrumbs=array(
	'Личный кабинет',
);

$this->menu = array(
    array('label' => 'Личный кабинет', 'url' => array('profile/index')),
    array('label' => 'Изменение персональных данных', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'Посмотреть созданые тайники', 'url' => array('profile/view')),
    array('label' => 'Создать тайник', 'url' => array('stash/create')),
    array('label' => 'Посещённые тайники', 'url' => array('profile/viewFoundStash')),
);
?>
<h1><?php echo 'Здраствуй ' . Yii::app()->user->name ?></h1>
<?php if ($model->preview->hasImage())
    echo CHtml::image($model->preview->getUrl('preview'), 'Preview image version');
else
    echo CHtml::image(Yii::app()->request->baseUrl . '/images/avatar/no_avatar.jpg', 'no image uploaded');
?>
<div class="row">
    <div class="span4 offset2">
        <?php $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'username',
                'name',
                'first_name',
                'last_name',
                'sex',
                //'birthday',
                'userPlace',
                'e_mail',
                'phone',
                'other_information',
                'createStashCount',
                'foundStashCount',
            ),
        )); ?>
    </div>
</div>

<?php $this->renderPartial('_massages', array(
    'model' => $massage,
)); ?>