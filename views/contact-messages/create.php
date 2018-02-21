<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model domain\modules\contact\entities\ContactMessages */

$this->title = Yii::t('app', 'Create Contact Messages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
