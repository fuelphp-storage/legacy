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
 * Markdown Proxy
 */
class Markdown
{
	/**
	 * @var MarkdownExtra_Parser  The MD parser instance
	 */
	protected static $parser = null;

	/**
	 * Runs the given text through the Markdown parser
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	public static function parse($text)
	{
		return static::getInstance()->transform($text);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getInstance()
	{
		// setup an instance if needed
		if ( ! static::$parser)
		{
			if (class_exists('Michelf\MarkdownExtra'))
			{
				static::$parser = new \Michelf\MarkdownExtra();
			}
			else
			{
				throw new \RuntimeException('FOU-021: Unable to create a Markdown instance. Did you install the "michelf\php-markdown" composer package?');
			}
		}

		return static::$parser;
	}
}
