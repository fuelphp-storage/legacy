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
 * Auth Proxy
 */
class Auth extends Base
{
	/**
	 * @var \Fuel\Auth\Manager
	 */
	protected static $instance;

	/**
	 * Returns a new auth instance
	 *
	 * @param string|array $name
	 * @param array        $config
	 *
	 * @return \Fuel\Auth\Manager
	 */
	public static function forge($name = 'default', array $config = array())
	{
		// deal with only passing an array
		if (is_array($name))
		{
			$config = $name;
			$name = empty($config['name']) ? 'default' : $config['name'];
		}

		// make sure we don't already have this auth instance
		if (static::getContainer()->isInstance('auth', $name))
		{
			throw new \RuntimeException('FOU-036: An auth instance named ['.$name.'] is already defined.');
		}

		// create the instance
		$instance = static::getContainer()->get('auth', array($name, $config));

		// if this is the first, make it the default instance
		if ( ! static::$instance)
		{
			static::$instance = $instance;
		}

		return $instance;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		if ( ! static::$instance)
		{
			return static::forge();
		}

		return static::$instance;
	}
}
