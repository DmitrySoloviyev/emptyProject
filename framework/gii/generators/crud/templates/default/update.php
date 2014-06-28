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
	\$model->{$nameColumn} => ['view','id' => \$model->{$this->tableSchema->primaryKey}],
	'Редактирование',
];\n"; ?>

$this->menu = [
['label'=>'List <?= $this->modelClass; ?>', 'url' => ['index']],
['label'=>'Создать <?= $this->modelClass; ?>', 'url' => ['create']],
['label'=>'Просмотр <?= $this->modelClass; ?>', 'url' => ['view', 'id' => $model-><?= $this->tableSchema->primaryKey; ?>]],
['label'=>'Manage <?= $this->modelClass; ?>', 'url' => ['admin']],
]; ?>

<h1>Update <?= $this->modelClass . " <?= \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?= "<?php \$this->renderPartial('_form', ['model' => \$model]); ?>"; ?>
