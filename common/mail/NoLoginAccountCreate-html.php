<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\Utils;
$baseUrl = Yii::$app->urlManager->createAbsoluteUrl(['/']);
?>
<h1>
    <div class="verify-email">
        <p>Hello <?= Html::encode($user->first_name) ?>,</p>
        <p>Your account has been created,your default password is : <?= Html::encode($createdPassword) ?></p>

    </div>
</h1>
<table align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 21px; margin-bottom: 20px;">
    <tr>
        <td>
            <div class="mb_View" style="background-color: #f4f4f4 !important; max-width:600px; margin: 0 auto;">
                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="logo_block" bgcolor="" style="padding-top:25px; padding-bottom:25px; text-align: center; background-color: #ffffff;">
                                        <a href="<?= $baseUrl;?>"
                                           target="_blank" target="_blank">
                                            <img src="<?= Yii::$app->params['logo'];?>" class="logo_img" alt="Logo">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" align="center" bgcolor="#fff">
                                <tr>
                                    <td style="padding-left:20px; padding-right:20px; padding-top:5px; padding-bottom:5px; border-radius: 5px 5px 0 0;" bgcolor="#FFFFFF">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding-top:1px; padding-bottom:7px; font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:15px; line-height:24px; font-weight: 600; text-transform: capitalize;">
                                                                Hello, <?= $user->first_name.' '.$user->last_name;?> !
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif !important; font-size:15px; padding-top:10px;  color:#000000; line-height:24px; padding-bottom:30px;" class="para1">
                                                                <p>Welcome to the Windows ERP, Your Account Has been created while placing the order</p>
                                                                <p>Your current auto generated default password is : <?= Html::encode($createdPassword) ?></p>
                                                                <p>If you want to change your account password click below link</p>
                                                                <p><a href="<?= $baseUrl.'request-password-reset';?>"></a>Reset Password</p>
                                                                <p>OR</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom: 20px;">
                                                                <table style="background-color: #A01A1F; border: 1px solid #A01A1F; border-radius: 4px;" cellspacing="0" cellpadding="0" align="center">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding-left: 15px; padding-right: 15px; text-align: center; cursor: pointer" valign="middle" height="42" width="180">
                                                                            <a href="<?= $baseUrl.'login';?>" target="_blank" style="display: block; font-family: 'Montserrat', sans-serif !important; border-radius: 4px; font-size: 15px; line-height: 14px; color: #fff; text-decoration: none; font-weight: 500; text-transform: capitalize;">
                                                                                <span>Login Account</span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:14px; line-height:24px; font-weight: 600;">
                                                                Regards,
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom:20px; font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:14px; line-height:24px;">
                                                                <?= Yii::$app->params['appRegards'];?> !
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#000000" style="padding-left:11px; padding-right:10px; padding-top:15px; padding-bottom:15px; border-radius: 0 0 5px 5px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="text-align:center; font-size:13px; font-family: 'Montserrat', sans-serif !important; color:#fff; line-height:23px; font-weight: 500;">© 2020 ERP Windows. All Rights Reserved.</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>