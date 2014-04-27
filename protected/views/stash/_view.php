<?php
/* @var $this StashController */
/* @var $data Stash */
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2 class="text-center">
                <?php echo CHtml::encode($data->stash_name); ?>
            </h2>

            <div class="row-fluid">
                <div class="span4">
                    <address>
                        Создан
                        <strong> <?php echo CHtml::link(CHtml::encode($data->user->username), $data->user->getUrl()) . '</strong><br>' . $data->createStashDate; ?>
                            <br>
                            Обновлён (<?php echo $data->update_date ?>)
                    </address>
                </div>

                <div class="span4 offset4">
                    <?php
                    if($data->getVisitCount() > 0){
                    $table = '<table class="table table-bordered">';
                    foreach($data->getVisitUser() as $id => $username){
                        $table .='<tr><td style= "text-align:center">'.CHtml::link(CHtml::encode($username), Yii::app()->createUrl('user/view', array('id' => $id))).'</td></tr>';
                    }
                    $table .= '</table>';

                    echo '<span class="text-info" style="float: right;">Игроков разгадавших тайник: '. TbHtml::link(
                        $data->getVisitCount(),
                        '#',
                        array(
                            'onclick' => "js:bootbox.modal(
                                    '{$table}',
                                    'Игроки'
                             );"
                        )
                    ). '</span>';
                    } else {
                        echo '<span class="text-error" style="float: right;">Тайник не разгадан!</span>';
                    }

                    ?>
                </div>
            </div>
            <div class="row-fluid">

                <?php // $this->beginWidget('CMarkdown', array('purifyOutput' => true)); ?>

                <h5 class="text-center"> Описание местности </h5>

                <div><?php echo $data->place_description; ?></div>

                <h5 class="text-center"> Описание тайника </h5>

                <div><?php echo $data->stash_description; ?></div>

                <h5 class="text-center"> Контрольный вопрос </h5>

                <div><?php echo $data->question; ?></div>

                <h5 class="text-center"> Содержимое тайника </h5>

                <div><?php echo $data->content; ?></div>

                <?php // $this->endWidget(); ?>
            </div>
        </div>
    </div>

    <div class="nav">


    </div>

</div>






