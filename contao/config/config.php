<?php

declare(strict_types=1);

/*
* This file is part of Notification Center Default Email Bundle.
*
* (c) Marko Cupic 2023 <m.cupic@gmx.ch>
* @license MIT
* For the full copyright and license information,
* please view the LICENSE file that was distributed with this source code.
* @link https://github.com/markocupic/notification-center-default-email-bundle
*/

// Notification Center
$GLOBALS['NOTIFICATION_CENTER']['NOTIFICATION_TYPE']['type_default_email'] = array
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
