<?php
/* @var $this StashController */
/* @var $model Stash */
?>

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/colorbox.css"); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/colorbox-master/jquery.colorbox-min.js",CClientScript::POS_HEAD); ?>


    <script>
        jQuery(document).ready(function () {
            jQuery('a.gallery').colorbox({ opacity:0.5 , rel:'group1', loop:false});
            jQuery('a.<?php echo $model->alias;?>').colorbox({ opacity:0.5 , rel:'group1', loop:false });
        });
    </script>


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
<?php else: { echo 'Фотографии к данному тайнику отсутствуют';} endif; ?>