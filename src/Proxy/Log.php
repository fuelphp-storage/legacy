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

/**
 * Log Proxy
 */
class Log extends Base
{
	/**
	 * Creates a new Monolog Logger instance
	 *
	 * @param $name
	 *
	 * @return \Monolog\Logger
	 */
	public static function forge($name)
	{
		return static::getContainer()->multiton('log', $name, func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		// return the current applications' log instance
		return \Application::getInstance()->getLog();
	}
}
