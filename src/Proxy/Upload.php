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
 * Upload Proxy
 */
class Upload extends Base
{
	/**
	 * Creates a new Upload instance
	 *
	 * @return \Fuel\Upload\Upload
	 */
	public static function forge()
	{
		if ($name === null)
		{
			$name = uniqid(true);
		}

		return static::getContainer()->multiton('upload', $name);
	}

	/**
	 * Delete an multiton instance from the facade.
	 *
	 * @param mixed $name
	 */
	public static function delete($name)
	{
		$dic = static::getContainer();
		unset($dic['upload::'.$name]);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
