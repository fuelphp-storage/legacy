<?php
/**
 * @package    Fuel\Legacy
 * @version    2.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Foundation\Proxy;

/**
 * Agent Proxy
 */
class Agent extends Base
{
	/**
	 * Default instance
	 */
	protected static $instance;

	/**
	 * Returns a new Agent instance
	 *
	 * @return \Fuel\Agent\Agent
	 */
	public static function forge($name = null)
	{
		// get the current application name via the active request instance
		if ( ! $name)
		{
			$name = \Application::getInstance()->getName();
		}

		// get the arguments, and remove the name
		$args = func_get_args();
		array_shift($args);

		return static::getContainer()->multiton('agent', $name, $args);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
