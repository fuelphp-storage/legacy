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
 * Application Proxy
 */
class Application extends Base
{
	/**
	 * Returns a defined application instance
	 *
	 * @param $name
	 *
	 * @return	Application
	 *
	 * @throws \RuntimeException if the application to get does not exist
	 */
	public static function get($name)
	{
		// make sure we have this application instance
		if ( ! static::getContainer()->isInstance('application', $name))
		{
			throw new \RuntimeException('FOU-014: There is no application defined named ['.$name.'].');
		}

		// return the application instance
		return static::getContainer()->multiton('application', $name);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::getContainer()->get('applicationInstance', [false]);
	}
}
