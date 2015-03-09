<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjectParts */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => Yii::t('app', 'Object part'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Object Parts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-parts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
