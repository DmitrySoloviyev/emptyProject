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
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = [
	'$label' => ['index'],
	\$model->{$nameColumn},
];\n"; ?>

$this->menu = [
['label' => 'List <?= $this->modelClass; ?>', 'url' => ['index']],
['label' => 'Создать <?= $this->modelClass; ?>', 'url' => ['create']],
['label' => 'Редактировать <?= $this->modelClass; ?>', 'url' => ['update', 'id' => $model-><?= $this->tableSchema->primaryKey; ?>]],
['label' => 'Удалить <?= $this->modelClass; ?>', 'url' => '#', 'linkOptions' => [
'submit' => ['delete', 'id' => $model-><?= $this->tableSchema->primaryKey; ?>], 'confirm' => 'Вы дуйствительно хотите удалить эту запись?']],
['label'=>'Manage <?= $this->modelClass; ?>', 'url' => ['admin']],
]; ?>

<h1>View <?= $this->modelClass . " #<?= \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?= "<?php"; ?> $this->widget('zii.widgets.CDetailView', [
'data' => $model,
'attributes' => [
<?php
foreach ($this->tableSchema->columns as $column)
    echo "\t\t'" . $column->name . "',\n";
?>
],
]); ?>
