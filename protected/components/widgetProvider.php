<?php
/**
 * Created by JetBrains PhpStorm.
 * User: y.dyumkin
 * Date: 22.11.13
 * Time: 13.50
 * To change this template use File | Settings | File Templates.
 */

class WidgetProvider extends CWidget {

    public static  function actions()
    {
        return array(
            // naming the action and pointing to the location
            // where the external action class is
            'UpdateRegion'=>'application.components.actions.UpdateRegion',
            'UpdateCity'=>'application.components.actions.UpdateCity',
        );
    }

    /**
     * @var CActiveRecord
     */
    public $model;

    public function run()
    {
        $countries = Country::model()->getCountriesList();
        /** @var Controller $ownerController */
        $ownerController = $this->getOwner();
        $cityInputId = TbHtml::activeId($this->model, 'city_id');


        echo TbHtml::dropDownListControlGroup('country_id', '', $countries,
            array(
                'label' => 'Ближайшая местность',
                'prompt' => 'Выберете страну',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => $ownerController->createUrl('user/widget.UpdateRegion'),
                    'dataType' => 'json',
                    'data' => array('country_id' => 'js:this.value'),
                    'beforeSend' => "function() {
                    $('#region_id, #{$cityInputId}').attr('disabled', true);
                }",
                    'success' => "function(data) {
                    $('#region_id, #{$cityInputId}').attr('disabled', false);
                    $('#region_id').html(data.dropDownRegion);
                    $('#{$cityInputId}').html(data.dropDownCity);
                }",
                )));

        echo TbHtml::dropDownListControlGroup('region_id', '', array(),
            array(
                'prompt' => 'Выберете регион',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => $ownerController->createUrl('user/widget.UpdateCity'),
                    'update' => '#' . $cityInputId,
                    'data' => array('region_id' => 'js:this.value'),
                )));

        echo TbHtml::activeDropDownListControlGroup($this->model, 'city_id', array(), array('prompt' => 'Выберете город', 'label' => false));

    }

}