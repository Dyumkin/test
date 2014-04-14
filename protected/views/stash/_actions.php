<?php
/* @var $this StashController */
/* @var $model Stash */
?>

<?php
if (!Yii::app()->user->isGuest) {
    if (Yii::app()->user->id != $model->user_id) {
        $this->widget('bootstrap.widgets.TbButton',
            array(
                'label' => 'Ответить на вопрос',
                'type' => 'success',
                'htmlOptions' => array(
                    'style' => 'margin-left:3px',
                    'onclick' => 'js:bootbox.prompt("Введите ответ на контрольный вопрос", function(result){
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
    }
}?>
