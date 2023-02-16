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

namespace Markocupic\NotificationCenterDefaultEmailBundle\EventListener\ContaoHook;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

#[AsHook(static::HOOK, priority: 100)]
class InitializeSystemListener
{
    private const HOOK = 'initializeSystem';

    public function __construct(
        private readonly Connection $connection,
    ) {
    }

    /**
     * @throws Exception
     */
    public function __invoke(): void
    {
        $schemaManager = $this->connection->createSchemaManager();

        if ($schemaManager->tablesExist(['tl_nc_notification', 'tl_nc_message', 'tl_nc_language'])) {
            // Create the default notification if not exists
            $result = $this->connection->fetchOne('SELECT id FROM tl_nc_notification WHERE type = ?', ['default_email']);

            if (false !== $result) {
                $set1 = [
                    'type' => 'default_email',
                    'title' => 'Standard E-Mail (nur mit Platzhaltern)',
                    'tstamp' => time(),
                ];

                $this->connection->insert('tl_nc_notification', $set1);

                $set2 = [
                    'pid' => $this->connection->lastInsertId(),
                    'tstamp' => time(),
                    'title' => 'Standard Nachricht',
                    'gateway' => 1,
                    'gateway_type' => 'email',
                    'email_priority' => 3,
                    'email_template' => 'mail_default',
                    'published' => 1,
                ];

                $this->connection->insert('tl_nc_message', $set2);

                $set3 = [
                    'pid' => $this->connection->lastInsertId(),
                    'tstamp' => time(),
                    'gateway_type' => 'email',
                    'language' => 'de',
                    'fallback' => '1',
                    'recipients' => '##send_to##',
                    'attachment_tokens' => '#attachment_tokens##',
                    'email_sender_name' => '##email_sender_name##',
                    'email_sender_address' => '##email_sender_email##',
                    'email_recipient_cc' => '##recipient_cc##',
                    'email_recipient_bcc' => '##recipient_bcc##',
                    'email_replyTo' => '##reply_to##',
                    'email_subject' => '##email_subject##',
                    'email_mode' => 'extOnly',
                    'email_text' => '##email_text##',
                ];

                $this->connection->insert('tl_nc_language', $set3);
            }
        }
    }
}
