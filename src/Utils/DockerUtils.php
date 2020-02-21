<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Developer Tools.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Phalcon\DevTools\Utils;

use Phalcon\Config;
use Phalcon\Di\Injectable;

/**
 * @property Config $config
 */
class DockerUtils extends Injectable
{
    /**
     * Resolves a data source name in the database config into a config array
     */
    public function resolveDsn() : ?array {
        // Make sure config has database:
        if (!$this->config->offsetExists('database')) return null;
        // Get the database config:
        $config = $this->config->get('database');
        // Make sure config has dsn or return the normal database config:
        if (!$config->offsetExists('dsn')) return $config->toArray();
        // Get the dsn:
        $dsn = $this->config->get('dsn');
        
        var_dump($dsn);
        die;
    }
}
