<?php
/**
 * Created by JetBrains PhpStorm.
 * User: y.dyumkin
 * Date: 25.11.13
 * Time: 11.19
 * To change this template use File | Settings | File Templates.
 */

class UpdateCity extends CAction {

    public function run()
    {
        $data = City::model()->findAll('region_id=:region_id', array(':region_id' => (int)$_POST['region_id']));

        $data = CHtml::listData($data, 'city_id', 'name');
        echo "<option value=''>Select City</option>";
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }
}