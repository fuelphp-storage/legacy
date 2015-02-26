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
 * Lang Proxy
 */
class Lang extends Base
{
	/**
	 * Forge a new language object
	 *
	 * @param $name
	 *
	 * @return Config
	 */
	public static function forge($name)
	{
		return static::getContainer()->multiton('config', 'lang-'.$name);
	}

	/**
	 * Returns currently active language
	 *
	 * @return string
	 */
	public static function getActive()
	{
		return \Config::get('lang.current', \Config::get('lang.fallback', 'en'));
	}

	/**
	 * Sets the currently active language
	 *
	 * @param string
	 */
	public static function setActive($language)
	{
		\Config::set('lang.current', $language);
	}

	/**
	 * Returns a (dot notated) language string
	 *
	 * @param string|array $line
	 * @param array        $params
	 * @param mixed        $default
	 *
	 * @return mixed
	 */
	public static function get($line, array $params = array(), $default = null)
	{
		// create the list of keys to search
		if ( ! is_array($line))
		{
			$line = array($line);
		}

		// look for a match
		foreach($line as $key)
		{
			if (($found = static::getInstance()->get($key, '__FAIL__')) !== '__FAIL__')
			{
				break;
			}

		}

		// no match
		if ($found === '__FAIL__')
		{
			// do we have a default?
			if (func_num_args() == 4)
			{
				$found = $default;
			}
			else
			{
				// get the globally configured default
				$found = \Config::get('lang.default', '');
				$found = str_replace('{key}', array_shift($line), $found);
			}
		}

		// stuff in any parameters passed, and return the result
		return \Str::tr($found, $params);
	}

	/**
	 * Sets a (dot notated) language string
	 *
	 * @param string $line
	 * @param mixed  $value
	 * @param string $group
	 */
	public static function set($line, $value, $group = null)
	{
		$group === null or $line = $group.'.'.$line;

		static::getInstance()->set($line, $value);
	}

	/**
	 * Deletes a (dot notated) language string
	 *
	 * @param string $item
	 * @param string $group
	 *
	 * @return array|bool
	 */
	public static function delete($item, $group = null)
	{
		$group === null or $line = $group.'.'.$line;

		return static::getInstance()->delete($line, $value);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance($lang = null)
	{
		return \Application::getInstance()->getRootComponent()->getLanguage($lang);
	}
}
