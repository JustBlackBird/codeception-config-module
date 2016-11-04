<?php
/*
 * This file is part of Codeception Config Module.
 *
 * (c) Dmitriy Simushev <simushevds@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Codeception\Module;

use Codeception\Module\Config;
use PHPUnit_Framework_TestCase as TestCase;

class ConfigTest extends TestCase
{
    public function testExistingParamRetrieving()
    {
        $module = new Config($this->getModuleContainerMock(), [
            'foo' => 'bar',
            'baz' => 'quux',
        ]);

        $this->assertEquals('bar', $module->grabFromConfig('foo'));
        $this->assertEquals('quux', $module->grabFromConfig('baz'));
    }

    public function testUnknownParamRetrieving()
    {
        $module = new Config($this->getModuleContainerMock(), []);

        $this->setExpectedException('\Codeception\Exception\ModuleConfigException');
        $module->grabFromConfig('unknown_param');
    }

    private function getModuleContainerMock()
    {
        return $this->getMockBuilder('\Codeception\Lib\ModuleContainer')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
