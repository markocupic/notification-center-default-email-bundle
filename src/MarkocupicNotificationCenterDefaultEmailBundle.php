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

namespace Markocupic\NotificationCenterDefaultEmailBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MarkocupicNotificationCenterDefaultEmailBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
