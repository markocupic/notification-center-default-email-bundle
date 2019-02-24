<?php

/**
 * Notification Center Default Email Web Plugin for Contao
 * Copyright (c) 2008-2019 Marko Cupic
 * @package notification-center-default-email-bundle
 * @author Marko Cupic m.cupic@gmx.ch, 2019
 * @link https://github.com/markocupic/notification-center-default-email-bundle
 */

namespace Markocupic\NotificationCenterDefaultEmailBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

/**
 * Plugin for the Contao Manager.
 *
 * @author Marko Cupic
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('Markocupic\NotificationCenterDefaultEmailBundle\MarkocupicNotificationCenterDefaultEmailBundle')
                ->setLoadAfter([
                    'Contao\CoreBundle\ContaoCoreBundle',
                ])
        ];
    }
}