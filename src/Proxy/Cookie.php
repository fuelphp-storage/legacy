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
 * Cookie Proxy
 */
class Cookie extends Base
{
	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		// get the current request instance
		if ($request = \Request::getInstance())
		{
			return $request->getInput()->getCookie();
		}

		// no active request, return the global one
		return \Component::getInstance()->getInput()->getCookie();
	}
}
