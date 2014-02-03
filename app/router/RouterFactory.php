<?php

namespace App;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;

/**
 * Router factory.
 */
class RouterFactory
{
	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}
}
