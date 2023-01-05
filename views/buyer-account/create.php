<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuyerAccount */

$this->title = 'Create Buyer Account';
$this->params['breadcrumbs'][] = ['label' => 'Buyer Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buyer-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
