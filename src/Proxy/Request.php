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
 * Request Proxy
 */
class Request extends Base
{
	/**
	 * Returns an instance of a Request
	 *
	 * @param string $resource
	 * @param array  $input
	 * @param string $type
	 *
	 * @return Request\Base
	 */
	public static function forge($resource, array $input = [], $type = null)
	{
		return static::getContainer()->get('request', func_get_args());
	}

	/**
	 * Check if the current request is the main request
	 *
	 * @return boolean
	 */
	public static function isMainRequest()
	{
		$stack = static::getDic()->get('requeststack');
		return count($stack) === 1;
	}

	/**
	 * Check if the current request is an HMVC request
	 *
	 * @return boolean
	 */
	public static function isHMVCRequest()
	{
		$stack = static::getDic()->get('requeststack');
		return count($stack) !== 1;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		$stack = static::getContainer()->get('requestInstance');
	}
}
