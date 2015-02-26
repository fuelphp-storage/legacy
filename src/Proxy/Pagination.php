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
 * Pagination Proxy
 */
class Pagination extends Base
{
	/**
	 * Returns an instance of the Pagination object.
	 *
	 * @return Fuel\Common\Pagination
	 */
	public static function forge()
	{
		return static::getContainer()->get('pagination', func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
