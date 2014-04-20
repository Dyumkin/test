<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="content-wrap">
        <div id="main">
            <?php echo $content; ?>
        </div>
        <!-- content -->

        <div id="sidebar">
            <?php if (Yii::app()->user->name == 'admin') $this->widget('AdminMenu'); ?>
            <?php
            if (!Yii::app()->user->isGuest) {
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => '<h1>Меню</h1>',
                    //        'htmlOptions' => array('id' => 'sidebar'),
                ));

                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'sidemenu'),
                ));
                $this->endWidget();
            }
            ?>

            <?php
            if (!Yii::app()->user->isGuest) {
                echo $this->clips['infoBox'];
            }
            ?>

            <h1>Поиск</h1>

            <form method="post" id="search">
                <p>
                    <input name="search_query" class="textbox" type="text"/>
                    <input name="search" class="searchbutton" value="Search" type="submit"/>
                </p>
            </form>

        </div>
        <!-- sidebar -->
    </div>
<?php $this->endContent(); ?>