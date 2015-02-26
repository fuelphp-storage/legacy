<?php
/**
 * @package    Fuel\Legacy
 * @version    2.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Legacy\Proxy;

use Fuel\Config\Container;
use Fuel\Foundation\Application as AppInstance;

/**
 * Environment Proxy
 */
class Environment extends Base
{
	/**
	 * Forge a new environment object
	 *
	 * @param string $enviroment
	 *
	 * @throws \RuntimeException if the environment to forge already exists
	 */
	public static function forge($environment)
	{
		$name = \Application::getInstance()->getName();

		return static::getContainer()->multiton('environment', $name, func_get_args());
	}

	/**
	 * Returns a defined environment instance
	 *
	 * @param $name
	 *
	 * @return Environment
	 *
	 * @throws \RuntimeException if the environment to get does not exist
	 */
	public static function get($name)
	{
		if ( ! static::getContainer()->isInstance('environment', $name))
		{
			throw new \InvalidArgumentException('FOU-015: There is no environment defined named ['.$name.'].');
		}

		return static::getContainer()->multiton('environment', $name);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		// get the current environment via the active request instance
		if ($request = \Request::getActive())
		{
			return $request->getComponent()->getApplication()->getEnvironment();
		}

		// no active request, return the main applications' environment
		return \Application::getInstance()->getEnvironment();
	}
}
