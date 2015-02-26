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
 * Str Proxy
 */
class Str extends Base
{
	/**
	 * Returns an instance of the Str object
	 *
	 * @return \Fuel\Common\Str
	 */
	public static function forge()
	{
		return static::getContainer()->get('str', func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
