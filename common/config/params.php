<?php
use common\helpers\Utils;


return [
    'appName' => 'ERP Windows',
    'appRegards' => 'ERP Windows Team',
    'supportEmail' => 'support@erpwindows.com',
    'senderEmail' => 'noreply@erpwindows.com',
    'senderName' => 'ERP Windows',
    'adminEmail' => 'admin@erpwindows.com',
    'user.passwordResetTokenExpire' => 3600,
    'social_link' => [
        'google'=> 'www.google.com',
        'facebook'=> 'www.facebook.com',
        'twitter'=> 'www.twitter.com',
        'linkedin'=> 'www.linkedin.com',
        'instagram'=> 'www.instagram.com'
    ],
    //Below all params for email template
    'contact_us' => Utils::IMG_URL('contact-us'),
    'about_us' => Utils::IMG_URL('about-us'),
    'faq' => Utils::IMG_URL('faq'),
    'logo' => Utils::IMG_URL('uploads/email/brand.png'),
    'faq' => Utils::IMG_URL('uploads/email/faq.png'),
    'email' => Utils::IMG_URL('uploads/email/email.png'),
];
