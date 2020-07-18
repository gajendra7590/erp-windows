<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\Utils;
$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['verify-email', 'token' => $user->verification_token]);
$baseUrl = Yii::$app->urlManager->createAbsoluteUrl(['/']);
?>

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
                                                            <td style="font-family: 'Montserrat', sans-serif !important; font-size:15px; padding-top:10px;  color:#000000; line-height:24px; padding-bottom:30px;" class="para1">You have successfully create a account. please click on the link below to verify your email address and complete your registration.</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom: 20px;">
                                                                <table style="background-color: #A01A1F; border: 1px solid #A01A1F; border-radius: 4px;" cellspacing="0" cellpadding="0" align="center">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding-left: 15px; padding-right: 15px; text-align: center; cursor: pointer" valign="middle" height="42" width="180">
                                                                            <a href="<?= $verifyLink;?>" target="_blank" style="display: block; font-family: 'Montserrat', sans-serif !important; border-radius: 4px; font-size: 15px; line-height: 14px; color: #fff; text-decoration: none; font-weight: 500; text-transform: capitalize;">
                                                                                <span>Verify Your Account</span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif !important;
                                                            font-size:15px; padding-top:10px;  color:#000000; line-height:24px; padding-bottom:25px;" class="para1">
                                                                If you did not create an account using this address,please ignore this email.
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
