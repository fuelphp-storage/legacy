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
 * Num Proxy
 */
class Num extends Base
{
	/**
	 * Returns an instance of the Num object
	 *
	 * @return \Fuel\Common\Num
	 */
	public static function forge()
	{
		return static::getContainer()->get('num', func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
