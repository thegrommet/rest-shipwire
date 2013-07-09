<?php
/**
 * Rest server for Grommet_Shipwire testing.
 *
 * @author tmannherz
 * @link https://github.com/marcj/php-rest-service
 */

spl_autoload_register(function ($class) {
	if ('\\' == $class[0]) {
		$class = substr($class, 1);
	}
	$file = str_replace('\\', '/', $class) . '.php';
	if (file_exists($file)) {
		require_once $file;
	}
});

use RestService\Server;
use Shipwire\Resource;

class Controller
{
	/**
	 * @var RestService\Server 
	 */
	public $server;
	
	public function __construct ()
	{
		$this->server = Server::create('/')->setHttpStatusCodes(true);
	}

	/**
	 * Add GET/POST/PUT/DELETE routes for a resource.
	 * 
	 * @param string $path
	 * @param \Shipwire\Resource $controller
	 * @return \Controller
	 */
	public function addEntityRoutes ($path, Resource $controller)
	{
		$this->server
			->addGetRoute($path, array($controller, 'get'))
			->addGetRoute($path . '/([0-9]+)', array($controller, 'get'))
			->addPostRoute($path, array($controller, 'post'))
			->addPutRoute($path . '/([0-9]+)', array($controller, 'put'))
			->addDeleteRoute($path . '/([0-9]+)', array($controller, 'delete'));

		return $this;
	}

	/**
	 * @param string $path
	 * @param \Shipwire\Resource $controller
	 * @return \Controller
	 */
	public function addPostRoute ($path, Resource $controller)
	{
		$this->server->addPostRoute($path, array($controller, 'post'));
		return $this;
	}

	/**
	 * @return \Controller
	 */
	public function run ()
	{
		$this->server->run();
		return $this;
	}
}

$controller = new Controller();
$controller
	->addEntityRoutes('vendors', new \Shipwire\Vendor())
	->addEntityRoutes('warehouses', new \Shipwire\Warehouse())
	->addPostRoute('rate', new \Shipwire\Rate())
	->run();
