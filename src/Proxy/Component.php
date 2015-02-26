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
 * Component Proxy
 */
class Component extends Base
{
	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::getContainer()->get('componentInstance', [false]);
	}
}
