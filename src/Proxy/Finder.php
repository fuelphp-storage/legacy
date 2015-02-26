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
 * Finder Proxy
 */
class Finder extends Base
{
	/**
	 * Creates a new Finder
	 *
	 * @param array  $path
	 * @param string $defaultExtension
	 * @param string $root
	 *
	 * @return  \Fuel\Filesystem\Finder
	 */
	public static function forge()
	{
		return static::getContainer()->get('finder', func_get_args());
	}

	/**
	 * An alias for Finder::instance()->locate();
	 *
	 * @param string  $dir
	 * @param string  $file
	 * @param string  $ext
	 * @param boolean $multiple
	 * @param boolean $cache
	 *
	 * @return mixed
	 */
	public static function search($dir, $file, $ext = 'php', $multiple = false, $cache = true)
	{
		$finder = static::forge(array($dir), trim($ext, '.'));

		if (($result = $finder->findCached($multiple?'all':'one', $file)) === null)
		{
			$result = $multiple ? $finder->findAll($file, false, false, 'file') : $finder->find($file, false, false, 'file');
		}

		if ($cache and $result)
		{
			$finder->cache($multiple?'all':'one', $file, false, $result, array($dir));
		}

		return $result;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		return static::forge();
	}
}
