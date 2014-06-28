<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?= "<?php\n"; ?>
/* @var $this <?= $this->getControllerClass(); ?> */
/* @var $data <?= $this->getModelClass(); ?> */
?>

<div class="view">

    <?php
    echo "\t<b><?= CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</b>\n";
    echo "\t<?= CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t<br />\n\n";
    $count = 0;
    foreach ($this->tableSchema->columns as $column) {
        if ($column->isPrimaryKey)
            continue;
        if (++$count == 7)
            echo "\t<?php /*\n";
        echo "\t<b><?= CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
        echo "\t<?= CHtml::encode(\$data->{$column->name}); ?>\n\t<br />\n\n";
    }
    if ($count >= 7)
        echo "\t*/ ?>\n";
    ?>

</div>
