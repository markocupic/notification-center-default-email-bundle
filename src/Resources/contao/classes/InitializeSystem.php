<?php

/**
 * Notification Center Default Email Web Plugin for Contao
 * Copyright (c) 2008-2019 Marko Cupic
 * @package notification-center-default-email-bundle
 * @author Marko Cupic m.cupic@gmx.ch, 2019
 * @link https://github.com/markocupic/notification-center-default-email-bundle
 */

namespace Markocupic\NotificationCenterDefaultEmailBundle\Contao\Classes;


use Contao\Database;
use NotificationCenter\Model\Notification;


/**
 * Class InitializeSystem
 * @package Markocupic\NotificationCenterDefaultEmailBundle\Contao\Classes
 */
class InitializeSystem
{

    /**
     * Prepare the plugin environment
     */
    public function initializeSystem()
    {
        if (Database::getInstance()->tableExists('tl_nc_notification'))
        {
            // Create default notification
            $objNotification = Notification::findOneByType('default_email');
            if ($objNotification === null)
            {
                $set = array(
                    'type'   => 'default_email',
                    'title'  => 'Standard E-Mail (nur mit Platzhaltern)',
                    'tstamp' => time()
                );
                $oInsertStmt = Database::getInstance()->prepare('INSERT into tl_nc_notification %s')->set($set)->execute();

                $set = array(
                    'pid'            => $oInsertStmt->insertId,
                    'tstamp'         => time(),
                    'title'          => 'Standard Nachricht',
                    'gateway'        => 1,
                    'gateway_type'   => 'email',
                    'email_priority' => 3,
                    'email_template' => 'mail_default',
                    'published'      => 1
                );
                $oInsertStmt2 = Database::getInstance()->prepare('INSERT into tl_nc_message %s')->set($set)->execute();

                $set = array(
                    'pid'                  => $oInsertStmt2->insertId,
                    'tstamp'               => time(),
                    'gateway_type'         => 'email',
                    'language'             => 'de',
                    'fallback'             => '1',
                    'recipients'           => '##send_to##',
                    'attachment_tokens'    => '#attachment_tokens##',
                    'email_sender_name'    => '##email_sender_name##',
                    'email_sender_address' => '##email_sender_email##',
                    'email_recipient_cc'   => '##recipient_cc##',
                    'email_recipient_bcc'  => '##recipient_bcc##',
                    'email_replyTo'        => '##reply_to##',
                    'email_subject'        => '##email_subject##',
                    'email_mode'           => 'extOnly',
                    'email_text'           => '##email_text##'
                );
                $oInsertStmt3 = Database::getInstance()->prepare('INSERT into tl_nc_language %s')->set($set)->execute();
            }
        }
    }

}
