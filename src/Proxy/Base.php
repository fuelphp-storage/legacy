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
 * Base Proxy
 */
abstract class Base
{
	/**
	 * Shortcut method to get access to the Container
	 */
	protected static function getContainer()
	{
		return \Fuel::getContainer();
	}

	/**
	* Static method interface on dynamic objects
	*
	* @param  string  $method  method to call on the instance
	* @param  array  $args  arguments to be passed to it
	*
	* @throws  ErrorException if the method called does not exist on the current instance
	*
	* @return  mixed
	*/
	public static function __callStatic($method, $args)
	{
		// get the instance to call the method on
		if ( ! $instance = static::getInstance())
		{
			throw new \ErrorException('FOU-019: No instance available to call: ['.get_called_class().'::'.$method.'()].');
		}
		elseif ( ! is_callable(array($instance, $method)))
		{
			throw new \ErrorException('FOU-020: Method ['.get_called_class().'::'.$method.'()] does not exist.');
		}

		// calling the method directly is faster then call_user_func_array() !
		switch (count($args))
		{
			case 0:
				return $instance->$method();

			case 1:
				return $instance->$method($args[0]);

			case 2:
				return $instance->$method($args[0], $args[1]);

			case 3:
				return $instance->$method($args[0], $args[1], $args[2]);

			case 4:
				return $instance->$method($args[0], $args[1], $args[2], $args[3]);

			default:
				return call_user_func_array(array($instance, $method), $args);
		}
	}

	/**
	 * Returns the object instance for this Proxy
	 */
	public static function getInstance()
	{
		// by default, this Proxy doesn't have instance support
		return null;
	}

}
