<?php
/**
 * @package    Fuel\Legacy
 * @version    2.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Legacy\Providers;

use Fuel\Foundation\LibraryProvider;

/**
 * Fuel LibraryProvider class for Legacy
 */
class FuelLibraryProvider extends LibraryProvider
{
	/**
	 * {@inheritdoc}
	 */
	public function initialize()
	{
		// fetch the alias instance
		$alias = $this->container->get('alias');

		// alias all Legacy proxy classes to global
		$alias->aliasNamespace('Fuel\Legacy\Proxy', '');
	}
}
