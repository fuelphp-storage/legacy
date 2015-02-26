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
 * Storage Proxy
 */
class Storage extends Base
{
	/**
	 * Forge a new storage object, or return an existing one
	 *
	 * @param string $type
	 * @param mixed  $config
	 *
	 * @return mixed
	 *
	 * @throws \InvalidArgumentException if a required config value is missing or incorrect
	 * @throws \RuntimeException         if the application to forge already exists
	 */
	public static function forge($type = 'db', $config = null)
	{
		// validate the type
		if (empty($type) or ! is_string($type))
		{
			throw new \RuntimeException('FOU-028: Specified storage type must be a string value');
		}

		// create and return the requested storage instance
		return static::getContainer()->get('storage.'.$type, array($config));
	}

	/**
	 * Alias for forge('db')
	 */
	public static function db($config = null)
	{
		return static::forge('db', $config);
	}

	/**
	 * Alias for forge('memcached')
	 */
	public static function memcached($config = null)
	{
		return static::forge('memcached', $config);
	}
}
