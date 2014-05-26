<?php
/* @var $this StashController */
/* @var $search SiteSearchForm */
/* @var $materials Stash */
/* @var $pages CPagination */

?>

<?php
$this->breadcrumbs = array(
    'Тайники' => array('stash/index'),
    'Поиск',
);
?>

<?php if (mb_strlen($search->string, 'UTF-8') >= Yii::app()->params->minSearchStringLength): ?>


    <?php if (!$materials): ?>
        <h1>Ничего не найдено</h1>
    <?php elseif
    (!empty($search->string)): ?>
        <h1>Поиск по <i><?php echo CHtml::encode($search->string); ?></i></h1>
    <?php endif; ?>
    <?php foreach ($materials as $material): ?>
        <?php
        $pizza = explode('>', $material->place_description);
        $s = '';
        for ($i = 0; $i < count($pizza); $i++) {
            $piece = explode('<', $pizza[$i]);
            $replace = preg_replace('/(' . $search->string . ')/i', '<b><span style="background:yellow;">${1}</span></b>', $piece[0]);
            if (count($piece) == 2) {
                $s .= $replace . '<' . $piece[1] . '>';
            } else if (count($piece) == 1) {
                $s .= $replace;
            }
        }
        $material->place_description = $s;

        $this->renderPartial('_found', array(
            'data' => $material,
        ));
        ?>
    <?php endforeach; ?>

    <br>
    <?php $this->widget('CLinkPager', array('pages' => $pages)); ?>

    <?php else: ?>
    <h1>Слишком короткий запрос. Надо не меньше "<?php echo Yii::app()->params->minSearchStringLength ?>" символов</h1>
<?php endif; ?>
