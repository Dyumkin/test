<?php
/* @var $this ProfileController */
/* @var $model User */

$this->breadcrumbs=array(
	'Profile',
);

$this->menu = array(
    array('label' => 'Profile', 'url' => array('index'), 'itemOptions' => array('class' => 'active')),
    array('label' => 'Edit personal data', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
    array('label' => 'View create stashes', 'url' => array('profile/view')),
    array('label' => 'Create Stashes', 'url' => array('stash/create')),
    array('label' => 'Founding Stashes', 'url' => array('profile/')),
);
?>
<h1><?php echo 'Hello ' . Yii::app()->user->name ?></h1>
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
                'e_mail',
                'name',
                'first_name',
                'last_name',
                'sex',
                'userPlace',
                'birthday',
                'phone',
                'other_information',
            ),
        )); ?>
    </div>
</div>
