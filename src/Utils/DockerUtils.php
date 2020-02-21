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

/**
 * @property Config $config
 */
class DockerUtils
{
    /** 
     * Constant to define the mapping from a dsn to a database config
     */
    private const CONFIG_MAP = [
        'Server'    => 'host',
        'Port'      => 'port',
        'Database'  => 'dbname',
        'Uid'       => 'username',
        'Pwd'       => 'password',
    ];

    /**
     * Resolves a data source name in the database config into a config array
     */
    public function resolveDsn(Config $config) : ?array {
        // Make sure the config contains the database node and assign it:
        if (is_null($config = $config->get('database'))) return null;
        // Get the config  array from the config:
        $configArray = $config->toArray();
        // Make sure the config contains the dsn node and assign it:
        if (is_null($config = $config->get('dsn'))) return $configArray;
        // Loop over the subjects in the dsn:
        foreach (explode(';', $config) as $subject) {
            // Make sure the subject is valid:
            if (is_null($subject) || empty($subject)) continue;
            // Get the parts of the subject:
            $parts = explode('=', $subject);
            // Map and assign the subject:
            $configArray[self::CONFIG_MAP[$parts[0]]] = $parts[1];
        }
        // Remove the dsn from the config array:
        unset($configArray['dsn']);
        // Return the config array:
        return $configArray;
    }
}
