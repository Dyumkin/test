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

                <address>
                    Create by
                    <strong> <?php echo $data->user->username . '</strong><br> on ' . $data->create_date; ?><br>
                        Update (<?php echo $data->update_date ?>)
                </address>
            </div>
            <div class="row-fluid">

                <?php // $this->beginWidget('CMarkdown', array('purifyOutput' => true)); ?>

                <h5 class="text-center"> Description of the area </h5>

                <div><?php echo $data->place_description; ?></div>

                <h5 class="text-center"> Description of the cache </h5>

                <div><?php echo $data->stash_description; ?></div>

                <h5 class="text-center"> The contents of the cache </h5>

                <div><?php echo $data->content; ?></div>

                <h5 class="text-center"> Control question </h5>

                <div><?php echo $data->question; ?></div>

                <?php // $this->endWidget(); ?>
            </div>
        </div>
    </div>

    <div class="nav">

        <?php
        if(!Yii::app()->user->isGuest){
        $this->widget('bootstrap.widgets.TbButton',
            array(
                'label' => 'Answer the question',
                'type' => 'success',
                'htmlOptions' => array(
                    'style' => 'margin-left:3px',
                    'onclick' => 'js:bootbox.prompt("What is the answer?", function(result){
                    function getUrlVars() {
                    var vars = {};
                    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                        vars[key] = value;
                    });
                    return vars;
                }
                    var id = getUrlVars()["id"];

                    jQuery.ajax({
                        type: "GET",
                        url: "answerTheQuestion",
                        data: {
                            id: id,
                            answer: result,
                        },
                        error: function(jqXHR,textStatus,errorThrown){
                        alert(errorThrown);
                        },
                        success: function(data){
                            js:bootbox.alert(data);
                          }
                        });
                        })'
                ),
            )
        );
        }?>
        <?php echo CHtml::link("Comments ({$data->commentCount})", array('view', 'id' => $data->id)); ?>
        |
        Last updated
        on <?php echo Yii::app()->dateFormatter->formatDateTime($data->update_date, 'full'); ?>
    </div>

</div>






