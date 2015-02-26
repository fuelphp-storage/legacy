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
 * Presenter Proxy
 */
class Presenter extends Base
{
	/**
	 * Factory for fetching the Presenter
	 *
	 * @param string  $view
	 * @param string  $method
	 * @param boolean $autoFilter
	 * @param string  $view
	 *
	 * @return \Fuel\Display\Presenter
	 *
	 * @throws \RuntimeException if the the presenter class could not be loaded
	 */
	public static function forge($uri, $method = 'view', $autoFilter = true, $view = null)
	{
		// was a custom view string passed?
		if ($view === null)
		{
			$view = $uri;
		}

		// get the current request namespace
		$currentNamespace = \Request::getInstance()->getRoute()->namespace;

		// pop the last one off, and add the Presenter namespace
		$currentNamespace = explode('\\', $currentNamespace);
		end($currentNamespace);
		$currentNamespace[key($currentNamespace)] = 'Presenter';
		$currentNamespace = implode('\\', $currentNamespace);

		// get the segments from the presenter string passed
		$segments = explode('/', $uri);
		while(count($segments))
		{
			$class = $currentNamespace.'\\'.implode('\\', array_map('ucfirst', $segments));
			if (class_exists($class))
			{
				$presenter = new $class(\View::getInstance(), $method, $autoFilter, $view);
				break;
			}

			array_pop($segments);
		}

		// bail out if the presenter class could not be loaded
		if ( ! isset($presenter))
		{
			throw new \RuntimeException('FOU-012: Presenter class identified by ['.$uri.'] could not be found.');
		}

		// or is not a valid Presenter
		elseif ( ! $presenter instanceOf \Fuel\Display\Presenter)
		{
			throw new \RuntimeException('FOU-013: Presenter class ['.get_class($presenter).'] does not extend "Fuel\Display\Presenter".');
		}

		return $presenter;
	}
}
