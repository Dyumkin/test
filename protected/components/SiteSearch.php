<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Юра
 * Date: 30.4.14
 * Time: 18.13
 * To change this template use File | Settings | File Templates.
 */

class SiteSearch extends CWidget
{
    public function run()
    {
        $form = new SiteSearchForm();
        $this->render('siteSearch', array('form'=>$form));
    }
}