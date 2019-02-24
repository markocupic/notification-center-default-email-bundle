<?php

/**
 * Notification Center Default Email Web Plugin for Contao
 * Copyright (c) 2008-2019 Marko Cupic
 * @package notification-center-default-email-bundle
 * @author Marko Cupic m.cupic@gmx.ch, 2019
 * @link https://github.com/markocupic/notification-center-default-email-bundle
 */

// HOOK
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('Markocupic\NotificationCenterDefaultEmailBundle\Contao\Classes\InitializeSystem', 'initializeSystem');


// notification_center
$GLOBALS['NOTIFICATION_CENTER']['NOTIFICATION_TYPE']['defaultemail'] = array
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