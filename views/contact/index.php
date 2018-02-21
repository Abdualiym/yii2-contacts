<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model domain\modules\contact\forms\ContactForm */

use domain\modules\contact\entities\Contact;
use domain\modules\contact\ContactModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title                   = ContactModule::t( 'contact', 'Feedback' );
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">
    <h1><?= Html::encode( $this->title ) ?></h1>

	<?= ContactModule::t( 'contact', '&nbsp;' ) ?>

	<?= \common\widgets\Alert::widget() ?>

    <p style="color: red;">* - <?= ContactModule::t( 'contact', 'REQUIRED FIELDS' ) ?></p>

    <div class="row">

		<?php $form = ActiveForm::begin( [ 'id' => 'contact-form' ] ); ?>
        <div class="col-sm-6">
			<?= $form->field( $model, 'subject' )->dropDownList( Contact::getSubjects() ) ?>

			<?= $form->field( $model, 'name' )->textInput() ?>

			<?= $form->field( $model, 'region' )->dropDownList( Contact::getRegions() ) ?>
        </div>
        <div class="col-sm-6">

			<?= $form->field( $model, 'phone' )->textInput() ?>

			<?= $form->field( $model, 'email' )->textInput() ?>

			<?= $form->field( $model, 'preferredAnswer' )->dropDownList( Contact::getPreferredAnswers() ) ?>
        </div>
        <div class="col-sm-12 contact-form-text">
			<?= $form->field( $model, 'text' )->textarea( [ 'rows' => 10 ] ) ?>
        </div>
        <div class="col-sm-6 contact-form-captcha">
			<?= $form->field( $model, 'verifyCode' )->widget( \yii\captcha\Captcha::className(), [
				'captchaAction' => [ '/captcha' ],
				'template'      => '<div class="row"><div class="col-sm-3">{image}</div><div class="col-sm-3">{input}</div></div>'
			] ) ?>
        </div>
        <div class="col-sm-6">
		    <?= $form->field( $model, 'file' )->fileInput() ?>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
			    <?= Html::submitButton( \domain\modules\contact\ContactModule::t( 'contact', 'Send' ), [
				    'class' => 'btn btn-primary',
				    'name'  => 'contact-button'
			    ] ) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
