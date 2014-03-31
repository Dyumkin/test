<?php
/* @var $this StashController */
/* @var $model Stash */
?>

<?php $this->pageTitle = $model->stash_name; ?>

<h2>Галлерея тайника</h2>
<?php
if ($model->galleryBehavior->getGallery() === null) {
    echo '<p>Перед добавлением фотографии в галерею, необходимо сохранить тайник</p>';
} else {
    $this->widget('GalleryManager', array(
        'gallery' => $model->galleryBehavior->getGallery(),
        'controllerRoute' => '/gallery',
        'gallerypath' => $model->alias,
    ));
}

$this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'label' => 'Перейти для просмотра',
        'url' => Yii::app()->createUrl('stash/view', array(
                'id' => $model->id,
            )),
    )
);
?>

