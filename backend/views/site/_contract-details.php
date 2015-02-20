<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;

?>

<div class="row">
    <div class="col-lg-6">
        <h4><?= Yii::t('app', 'Accruals') ?></h4>
        <?= GridView::widget([
            'dataProvider' => $accruals,
            'columns' => [
                'date',
                'amount',
            ],
        ]); ?>
    </div>
    <div class="col-lg-6">
        <h4><?= Yii::t('app', 'Payments') ?></h4>
        <?= GridView::widget([
            'dataProvider' => $payments,
            'columns' => [
                'date',
                'amount',
            ],
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <h4><?= Yii::t('app', 'Contract additions') ?></h4>
        <?= GridView::widget([
            'dataProvider' => $contractAdditions,
            'columns' => [
                'date',
                'number',
                'contractPriceHistory.amount',
                'expertAssessmentHistory.amount',
                'expertAssessmentHistory.square',
                'percentageHistory.amount',
            ],
        ]); ?>
    </div>
</div>