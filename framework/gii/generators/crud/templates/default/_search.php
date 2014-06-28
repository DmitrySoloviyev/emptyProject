<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?= "<?php\n"; ?>
/* @var $this <?= $this->getControllerClass(); ?> */
/* @var $model <?= $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?=
    "<?php \$form=\$this->beginWidget('CActiveForm', [
           'action'=>Yii::app()->createUrl(\$this->route),
           'method'=>'get',
       ]); ?>\n"; ?>

    <?php foreach ($this->tableSchema->columns as $column): ?>
        <?php
        $field = $this->generateInputField($this->modelClass, $column);
        if (strpos($field, 'password') !== false)
            continue;
        ?>
        <div class="row">
            <?= "<?= \$form->label(\$model,'{$column->name}'); ?>\n"; ?>
            <?= "<?= " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; ?>
        </div>

    <?php endforeach; ?>
    <div class="row buttons">
        <?= "<?= CHtml::submitButton('Поиск'); ?>\n"; ?>
    </div>

    <?= "<?php \$this->endWidget(); ?>\n"; ?>

</div>
