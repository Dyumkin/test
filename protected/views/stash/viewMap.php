<?php
/* @var $this StashController */
/* @var $model Stash */

$this->menu = array(
array('label' => 'Profile', 'url' => array('profile/index')),
array('label' => 'Edit personal data', 'url' => array('profile/update', 'id' => Yii::app()->user->id)),
array('label' => 'View create stashes', 'url' => array('profile/view')),
array('label' => 'Create Stashes', 'url' => array('stash/create')),
array('label' => 'Founding Stashes', 'url' => array('profile/')),
);

$this->breadcrumbs = array(
    'Тайники' => array('stash/index'),
    'Карта',
);

?>

<div id="map_canvas">
    <?php
    $gMap = new EGMap();
    $gMap->setJsName('map');
    $gMap->width = '100%';
    $gMap->height = 600;

    if ($this->coordinates != null){
        $gMap->zoom = 11;
        $gMap->setCenter($this->coordinates['latitude'], $this->coordinates['longitude']);
    } else
    {
        $gMap->zoom = 6;
        $gMap->setCenter(53.315076, 28.23800);
    }

    foreach ($model->findAll() as $attribute) {
        $infoBox = new EGMapInfoBox('<div class="info_box">
            <h4 class="text-center">' . $attribute['stash_name'] . '</h4>
            <div class="text-left">Создан игроком '.$attribute->user->username.': '.$attribute['create_date'].'</div><br>
            <div>'.$attribute['place_description'].'</div>
            <div>'.CHtml::link(CHtml::encode('View Stash'), $attribute->getUrl()).'</div>
        </div>');

        $infoBox->pixelOffset = new EGMapSize('0', '-140');
        $infoBox->maxWidth = 0;
        $infoBox->boxStyle = array(
            'width' => '"280px"',
            'height' => '"120px"',
            'background' => '"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
        );
        $infoBox->closeBoxMargin = '"10px 2px 2px 2px"';
        $infoBox->infoBoxClearance = new EGMapSize(1, 1);
        $infoBox->enableEventPropagation = '"floatPane"';

        $marker = new EGMapMarker($attribute['latitude'], $attribute['longitude'], array('title' => $attribute['stash_name']));
        $marker->addHtmlInfoBox($infoBox);
        $gMap->addMarker($marker);
    }
    $gMap->renderMap();
    ?>
</div>
