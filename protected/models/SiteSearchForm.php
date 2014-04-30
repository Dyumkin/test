<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Юра
 * Date: 30.4.14
 * Time: 18.22
 * To change this template use File | Settings | File Templates.
 */

class SiteSearchForm extends CFormModel
{
    public $string;

    public function rules() {
        return array(
            array('string', 'required'),
            array('string', 'length', 'min' => 4),
            array('string', 'length', 'max' => 20),
        );
    }

    public function safeAttributes() {
        return array('string',);
    }

}