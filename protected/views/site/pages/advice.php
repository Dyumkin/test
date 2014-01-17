<?php
/* @var $this SiteController */
/* @var $model SiteContent */

$this->breadcrumbs = array(
    'Advice',
);
?>

<h2 class="text-center">Советы пользователям</h2>
<br>
<div class="container">
    <?php echo $model->content; ?>
</div>