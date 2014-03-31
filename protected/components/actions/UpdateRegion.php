<?php
/**
 * Created by JetBrains PhpStorm.
 * User: y.dyumkin
 * Date: 25.11.13
 * Time: 11.18
 * To change this template use File | Settings | File Templates.
 */

class UpdateRegion extends CAction{

    public function run()
    {
        $data = Region::model()->findAll('country_id=:country_id', array(':country_id' => (int)$_POST['country_id']));

        $data = CHtml::listData($data, 'region_id', 'name');
        $dropDownRegion = "<option value=''>Выберете регион</option>";
        foreach ($data as $value => $name) {
            $dropDownRegion .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }

        $dropDownCity = "<option value='null'>Выберете город</option>";

        echo CJSON::encode(array(
            'dropDownRegion' => $dropDownRegion,
            'dropDownCities' => $dropDownCity
        ));
    }
}