<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SpecialServices */

$this->title = 'Create Special Services';
$this->params['breadcrumbs'][] = ['label' => 'Special Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-services-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
