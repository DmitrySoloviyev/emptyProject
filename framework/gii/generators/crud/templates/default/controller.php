<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?= "<?php\n"; ?>

class <?= $this->controllerClass; ?> extends <?= $this->baseControllerClass . "\n"; ?>
{
public $layout='//layouts/column2';

public function filters()
{
return [
'accessControl', // perform access control for CRUD operations
'postOnly + delete', // we only allow deletion via POST request
];
}

public function accessRules()
{
return [
['allow',  // allow all users to perform 'index' and 'view' actions
'actions' => ['index', 'view'],
'users' => ['*'],
],
['allow', // allow authenticated user to perform 'create' and 'update' actions
'actions' => ['create', 'update'],
'users' => ['@'],
],
['allow', // allow admin user to perform 'admin' and 'delete' actions
'actions' => ['admin', 'delete'],
'users' => ['admin'],
],
['deny',  // deny all users
'users' => ['*'],
],
];
}

public function actionView($id)
{
$this->render('view', [
'model' => $this->loadModel($id),
]);
}

public function actionCreate()
{
$model = new <?= $this->modelClass; ?>();

if(isset($_POST['<?= $this->modelClass; ?>'])) {
$model->attributes = $_POST['<?= $this->modelClass; ?>'];
if($model->save())
$this->redirect(['view','id'=>$model-><?= $this->tableSchema->primaryKey; ?>]);
}

$this->render('create', [
'model'=>$model,
]);
}

public function actionUpdate($id)
{
$model = $this->loadModel($id);

if(isset($_POST['<?= $this->modelClass; ?>']))
{
$model->attributes=$_POST['<?= $this->modelClass; ?>'];
if($model->save())
$this->redirect(array('view','id'=>$model-><?= $this->tableSchema->primaryKey; ?>));
}

$this->render('update', [
'model' => $model,
]);
}

public function actionDelete($id)
{
$this->loadModel($id)->delete();

if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['admin']);
}

public function actionIndex()
{
$dataProvider = new CActiveDataProvider('<?= $this->modelClass; ?>');
$this->render('index', [
'dataProvider' => $dataProvider,
]);
}

public function actionAdmin()
{
$model = new <?= $this->modelClass; ?>('search');
$model->unsetAttributes();
if(isset($_GET['<?= $this->modelClass; ?>']))
$model->attributes = $_GET['<?= $this->modelClass; ?>'];

$this->render('admin', [
'model' => $model,
]);
}

public function loadModel($id)
{
$model = <?= $this->modelClass; ?>::model()->findByPk($id);
if($model === null)
throw new CHttpException(404,'The requested page does not exist.');

return $model;
}

protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='<?= $this->class2id($this->modelClass); ?>-form') {
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

}
