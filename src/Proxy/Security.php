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
 * Security Proxy
 */
class Security extends Base
{
	/**
	 * Forges a new security object
	 *
	 * @return Security
	 */
	public static function forge()
	{
		return static::getContainer()->multiton('security', \Application::getInstance()->getName(), func_get_args());
	}

	/**
	 * Generates a unique CSRF token for the given form identification
	 *
	 * @param string $id
	 */
	public static function getCsrfToken($id)
	{
		return static::getInstance()->csrf()->getToken($id);
	}

	/**
	 * Validate a given CSRF token
	 *
	 * @param string $id
	 * @param string $token
	 */
	public static function validateCsrfToken($id, $token)
	{
		return static::getInstance()->csrf()->validateToken($id, $token);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
