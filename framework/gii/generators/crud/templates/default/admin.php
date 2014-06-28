<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?= "<?php\n"; ?>
/* @var $this <?= $this->getControllerClass(); ?> */
/* @var $model <?= $this->getModelClass(); ?> */

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = [
	'$label' => ['index'],
	'Manage',
];\n"; ?>

$this->menu = [
['label' => 'List <?= $this->modelClass; ?>', 'url' => ['index']],
['label' => 'Create <?= $this->modelClass; ?>', 'url' => ['create']],
];

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#<?= $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
"); ?>

<h1>Manage <?= $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<?= "<?= CHtml::link('Расширенный поиск', '#', ['class' => 'search-button']); ?>"; ?>

<div class="search-form" style="display:none">
    <?=
    "<?php \$this->renderPartial('_search', [
       'model' => \$model,
   ]); ?>\n"; ?>
</div>

<?= "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', [
'id'=>'<?= $this->class2id($this->modelClass); ?>-grid',
'dataProvider' => $model->search(),
'filter' => $model,
'columns' => [
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
    if (++$count == 7)
        echo "\t\t/*\n";
    echo "\t\t'" . $column->name . "',\n";
}
if ($count >= 7)
    echo "\t\t*/\n";
?>
[
'class' => 'CButtonColumn',
],
],
]); ?>
