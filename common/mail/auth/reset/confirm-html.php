<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user \shop\entities\User\User */

$resetLink = Yii::$app->get('frontendUrlManager')->createAbsoluteUrl(['auth/reset/confirm', 'token' => $user->password_reset_token]);
?>
<!-- Start Full Text -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="full-text">
    <tbody>
    <tr>
        <td>
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                <tbody>
                <tr>
                    <td width="100%">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                            <tbody>
                            <!-- Spacing -->
                            <tr>
                                <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                            <!-- Spacing -->
                            <tr>
                                <td>
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                        <tbody>
                                        <!-- Title -->
                                        <tr>
                                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; color: #333333; text-align:center; line-height: 30px;" st-title="fulltext-heading">
                                                Здравствуйте <?=Html::encode($user->getSurnameName()) ?>
                                            </td>
                                        </tr>
                                        <!-- End of Title -->
                                        <!-- spacing -->
                                        <tr>
                                            <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
                                        <!-- End of spacing -->
                                        <!-- content -->
                                        <tr>
                                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; text-align:center; line-height: 30px;" st-content="fulltext-content">
                                                Для того чтобы сбросить пароль, перейдите по <?= Html::a(Html::encode('ссылке'), $resetLink) ?>.
                                            </td>
                                        </tr>
                                        <!-- End of content -->
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- Spacing -->
                            <tr>
                                <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                            <!-- Spacing -->
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>