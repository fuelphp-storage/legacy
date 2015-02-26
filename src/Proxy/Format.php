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
 * Format Proxy
 */
class Format extends Base
{
	/**
	 * Returns an instance of the Format object.
	 *
	 *     echo Format::forge(array('foo' => 'bar'))->toXml();
	 *
	 * @return \Fuel\Common\Format
	 */
	public static function forge()
	{
		return static::getContainer()->get('format', func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
