<?php
/* @var $this StashController */
/* @var $model Stash */
?>

<?php $this->pageTitle = $model->stash_name; ?>

<h2>Product galley</h2>
<?php
if ($model->galleryBehavior->getGallery() === null) {
    echo '<p>Before add photos to product gallery, you need to save product</p>';
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
        'label' => 'Go to view',
        'url' => Yii::app()->createUrl('stash/view', array(
                'id' => $model->id,
            )),
    )
);
?>

