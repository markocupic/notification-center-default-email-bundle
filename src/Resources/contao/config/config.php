<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 24.02.2019
 * Time: 18:02
 */


$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('Markocupic\NotificationCenterDefaultEmailBundle\Contao\Classes\InitializeSystem', 'initializeSystem');



// notification_center_config.php
$GLOBALS['NOTIFICATION_CENTER']['NOTIFICATION_TYPE']['default_email'] = array
(
    // Type
    'default_email' => array
    (
        // Field in tl_nc_language
        'email_sender_name'    => array('email_sender_name'),
        'email_sender_address' => array('email_sender_email'),
        'recipients'           => array('send_to'),
        'email_replyTo'        => array('reply_to'),
        'email_recipient_cc'   => array('recipient_cc'),
        'email_recipient_bcc'  => array('recipient_bcc'),
        'email_subject'        => array('email_subject'),
        'email_text'           => array('email_text'),
        'email_html'           => array('email_html'),
        'attachment_tokens'    => array('attachment_tokens')
    )
);