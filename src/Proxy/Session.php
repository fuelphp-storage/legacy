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
 * Session Proxy
 */
class Session extends Base
{
	/**
	 * Produces fully configured session driver instances
	 *
	 * @param array|string $config
	 */
	public static function forge($config = [])
	{
		// create the session manager
		$manager = static::getContainer()->get('session', func_get_args());

		// if the current application doesn't have a default session
		if ( ! \Application::getInstance()->getSession())
		{
			// assign it to the application
			Application::getInstance()->setSession($manager);
		}

		// return the forged session manager instance
		return $manager;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		// get the current session via the active request instance
		if ($request = \Request::getInstance())
		{
			return $request->getApplication()->getSession();
		}

		return Application::getInstance()->getSession();
	}
}
