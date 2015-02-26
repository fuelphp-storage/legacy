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
 * Response Proxy
 */
class Response extends Base
{
	/**
	 * Creates an instance of the Response class
	 *
	 * @param string  $body
	 * @param integer $status
	 * @param array   $headers
	 *
	 * @return Response
	 */
	public static function forge($type)
	{
		$args = func_get_args();
		array_shift($args);

		return static::getContainer()->get('response.'.$type, $args);
	}
}
