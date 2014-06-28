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
	'Создать',
];\n"; ?>

$this->menu = [
['label'=>'List <?= $this->modelClass; ?>', 'url' => ['index']],
['label'=>'Manage <?= $this->modelClass; ?>', 'url' => ['admin']],
]; ?>

<h1>Создать <?= $this->modelClass; ?></h1>

<?= "<?php \$this->renderPartial('_form', ['model' => \$model]); ?>"; ?>
