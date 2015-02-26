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
 * Input Proxy
 */
class Input extends Base
{
	/**
	 * Forges a new Input object
	 *
	 * @param $input
	 *
	 * @return Input
	 */
	public static function forge(array $input = [])
	{
		return static::getContainer()->get('input', func_get_args());
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		// get the current request instance
		if ($request = \Request::getInstance())
		{
			return $request->getInput();
		}

		// no active request, return the current application instance
		return \Application::getInstance()->getRootComponent()->getInput();
	}
}
