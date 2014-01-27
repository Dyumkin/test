<?php
/* @var $this StashController */
/* @var $model Stash */

$this->breadcrumbs = array(
    'Stashes' => array('index'),
    $model->stash_name,
);
?>

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/colorbox.css"); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/colorbox-master/jquery.colorbox-min.js",CClientScript::POS_HEAD); ?>


<script>
    jQuery(document).ready(function () {
        jQuery('a.gallery').colorbox({ opacity:0.5 , rel:'group1', loop:false});
        jQuery('a.<?php echo $model->alias;?>').colorbox({ opacity:0.5 , rel:'group1', loop:false });
    });
</script>


<?php $this->pageTitle = $model->stash_name; ?>

<?php $this->renderPartial('_view', array(
    'data' => $model,
)); ?>

<?php $this->beginClip('infoBox'); ?>
    <?php $this->renderPartial('_viewInfoBox', array(
        'data' => $model,
    )); ?>
<?php $this->endClip(); ?>

<?php
    $existPhoto = $model->galleryBehavior->getGalleryPhotos();
    if(!empty($existPhoto) && $model->gallery_id != "0") : ?>
    <section id="photo">
        <h3>Фото</h3>
        <?php
        $this->widget('GalleryViewer', array(
            'gallery' => $model->galleryBehavior->getGallery(),
            'controllerRoute' => '/gallery',
            'gallerypath' => $model->alias,
        ));
        ?>
    </section>
<?php endif; ?>

<div id="comments">
    <?php if ($model->commentCount >= 1): ?>
        <h3>
            <?php echo $model->commentCount > 1 ? $model->commentCount . ' comments' : 'One comment'; ?>
        </h3>

        <?php $this->renderPartial('_comments', array(
            'stash' => $model,
            'comments' => $model->comments,
        ));?>
    <?php endif; ?>

    <h3>Leave a Comment</h3>

    <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/notepad/_form', array(
            'model' => $comment,
        )); ?>
    <?php endif; ?>

</div><!-- comments -->

