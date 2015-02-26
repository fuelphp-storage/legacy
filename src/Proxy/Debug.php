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
 * Debug Proxy
 */
class Debug extends Base
{
	/**
	 * Returns an instance of the Debug object
	 *
	 * @return \Fuel\Common\Debug
	 */
	public static function forge()
	{
		return static::getContainer()->get('debug', func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
