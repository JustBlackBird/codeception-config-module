<?php
/*
 * This file is part of Codeception Config Module.
 *
 * (c) Dmitriy Simushev <simushevds@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Codeception\Module;

use Codeception\Module;
use Codeception\Exception\ModuleConfigException;

/**
 * Expose some params from Codeception config to test scenarios.
 */
class Config extends Module
{
    /**
     * Retrieves value for configuration param with the passed in name.
     *
     * @param string $parameter
     * @return mixed
     * @throws ModuleConfigException If the specified parameter was not set in
     *   the configs.
     */
    public function grabFromConfig($parameter)
    {
        if (!isset($this->config[$parameter])) {
            throw new ModuleConfigException(get_class($this), sprintf(
                'Parameter "%s" is not specified in module\'s configurations.',
                $parameter
            ));
        }

        return $this->config[$parameter];
    }
}
