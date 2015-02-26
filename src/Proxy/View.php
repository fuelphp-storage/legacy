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
 * View Proxy
 */
class View extends Base
{
	/**
	 * Sets a global variable, except that the variable will be
	 * accessible to all views and presenters.
	 *
	 *     View::setGlobal($name, $value);
	 *
	 * @param string  $key
	 * @param mixed   $value
	 * @param boolean $filter
	 */
	public static function setGlobal($key, $value = null, $filter = null)
	{
		static::getInstance()->set($key, $value, $filter);
	}

	/**
	 * Assigns a global variable by reference, except that the variable
	 * will be accessible to all views and presenters
	 *
	 *     View::bindGlobal($key, $value);
	 *
	 * @param string  $key
	 * @param mixed   $value
	 * @param boolean $filter
	 */
	public static function bindGlobal($key, &$value, $filter = null)
	{
		static::getInstance()->bind($key, $value, $filter);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return \Application::getInstance()->getViewManager();
	}
}
