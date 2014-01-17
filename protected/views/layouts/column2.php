<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php if (Yii::app()->user->name == 'admin') $this->widget('UserMenu'); ?>
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Operations',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type' => 'list',
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>

            <?php
            if (!Yii::app()->user->isGuest) {
                echo $this->clips['infoBox'];
            }
            ?>
        </div>
        <!-- sidebar -->
    </div>
<?php $this->endContent(); ?>