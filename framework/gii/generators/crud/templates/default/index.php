<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?= "<?php\n"; ?>
/* @var $this <?= $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = [
	'$label',
];\n"; ?>

$this->menu = [
['label' => 'Создать <?= $this->modelClass; ?>', 'url' => ['create']],
['label' => 'Manage <?= $this->modelClass; ?>', 'url' => ['admin']],
]; ?>

<h1><?= $label; ?></h1>

<?= "<?php"; ?> $this->widget('zii.widgets.CListView', [
'dataProvider' => $dataProvider,
'itemView' => '_view',
]); ?>
