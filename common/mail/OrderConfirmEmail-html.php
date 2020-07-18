<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\Utils;
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
                                        <a href="<?= $baseUrl;?>" target="_blank" target="_blank">
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
                                                            <td style="padding-top:1px; padding-bottom:7px; font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:20px; line-height:24px; font-weight: 600; text-transform: capitalize;text-align: center">
                                                                Thank you for your order

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif !important; font-size:15px; padding-top:10px;  color:#000000; line-height:24px; padding-bottom:15px;font-weight: 600;" class="para1">
                                                                Hi, <?= $orderData['user']['first_name'] .' '.$orderData['user']['last_name'];?>!
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom: 10px;">
                                                                <table cellspacing="0" cellpadding="0" align="center">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="font-size: 14px;font-weight: 600">
                                                                            Just to let you know -- we've received your order #<?= str_pad($orderData['id'], 4, '0', STR_PAD_LEFT);?>, and it is now beign processed:
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif !important; font-size:18px; padding-top:10px;  color:#cd040b; line-height:24px; padding-bottom:8px;font-weight: 600" class="para1">
                                                                [Order #<?= str_pad($orderData['id'], 4, '0', STR_PAD_LEFT);?>] ( <?= date('M, d Y',strtotime($orderData['booking_date'])) ;?>)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 20px 0;">
                                                                <table width="100%" style="border-collapse:collapse;font-size:13px; text-align: center;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="border-bottom: 3px solid #CD040B;text-align:center;padding:10px;background: #FBF9EC;color:#A01A1F;">#</th>
                                                                        <th style="border-bottom: 3px solid #CD040B;text-align:center;padding:10px;background: #FBF9EC;color:#A01A1F;">Image</th>
                                                                        <th style="border-bottom: 3px solid #CD040B;text-align:center;padding:10px;background: #FBF9EC;color:#A01A1F;">Product</th>
                                                                        <th style="border-bottom: 3px solid #CD040B;text-align:center;padding:10px;background: #FBF9EC;color:#A01A1F;">Quantity</th>
                                                                        <th style="border-bottom: 3px solid #CD040B;text-align:center;padding:10px;background: #FBF9EC;color:#A01A1F;">Price</th>
                                                                    </tr>
                                                                    <?php if( isset($orderData['productsOrdersItems']) && !empty($orderData['productsOrdersItems'])){
                                                                        foreach ($orderData['productsOrdersItems'] as $k => $item){ ?>
                                                                        <tr>
                                                                            <td style="border:1px solid #ededed;text-align:center;padding:10px;font-size:small">
                                                                                <?= str_pad($k, 2, '0', STR_PAD_LEFT);?>
                                                                            </td>
                                                                            <td style="border:1px solid #ededed;text-align:center;padding:10px;font-size:small">
                                                                                <img style="width: 45px;" src="<?= (isset($item['product']['featured_image']))?( Utils::IMG_URL($item['product']['featured_image'])):''; ?>">
                                                                            </td>
                                                                            <td style="border:1px solid #ededed;text-align:center;padding:10px">
                                                                                <a style="color: #cd040b; text-decoration: none;font-size: 12px;font-weight: 600;" href="#">
                                                                                    <?= (isset($item['product']['title']))?$item['product']['title']:'No Title'; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td style="border:1px solid #ededed;text-align:center;padding:10px;font-size:small">
                                                                                <?= $item['product_quantity'].' × $'.$item['product_price']; ?>
                                                                            </td>
                                                                            <td style="border:1px solid #ededed;text-align:center;padding:10px">
                                                                                $<?= number_format( ( $item['product_price'] * $item['product_quantity']),2); ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }} ?>

                                                                    <tr>
                                                                        <td style="border:1px solid #ededed;text-align:right;padding:10px;padding-right: 15px;font-size: 13px;" colspan="4">
                                                                            <strong>Subtotal</strong>
                                                                        </td>
                                                                        <td style="border:1px solid #ededed;text-align:center;padding:10px">$<?= number_format($orderData['cart_total'],2);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border:1px solid #ededed;text-align:right;padding:10px;padding-right: 15px;font-size: 13px;"colspan="4"><strong>Delhivery Charges</strong></td>
                                                                        <td style="border:1px solid #ededed;text-align:center;padding:10px">$<?= number_format($orderData['delhivery_charges'],2);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border:1px solid #ededed;text-align:right;padding:10px;padding-right: 15px;font-size: 13px;"colspan="4"><strong>Payment Method</strong></td>
                                                                        <td style="border:1px solid #ededed;text-align:center;padding:10px">Credit Card (Stripe)</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border:1px solid #ededed;text-align:right;padding:10px;padding-right: 15px;font-size: 13px;"colspan="4"><strong>Total</strong></td>
                                                                        <td style="border:1px solid #ededed;text-align:center;padding:10px">$<?= number_format( ($orderData['cart_total']+$orderData['delhivery_charges']),2);?></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:14px; line-height:24px; font-weight: 600;text-align: center;padding:5px 0 20px;">
                                                                <a style="color: #fff;background: #A01A1F;padding: 10px 25px;border-radius: 5px;font-size: 14px;text-decoration: none;letter-spacing: 0.5px;"
                                                                   href="<?= $baseUrl.'my-account';?>">
                                                                    My Account
                                                                </a>
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
                                    <td style="text-align:center; font-size:13px; font-family: 'Montserrat', sans-serif !important; color:#fff; line-height:23px; font-weight: 500;"> © 2020 ERP Windows. All Rights Reserved. </td>
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