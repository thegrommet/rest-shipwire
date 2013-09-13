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
			->addGetRoute($path . '/E([0-9]+)', array($controller, 'get'))
			->addPostRoute($path, array($controller, 'post'))
			->addPutRoute($path . '/E([0-9]+)', array($controller, 'put'))
			->addDeleteRoute($path . '/E([0-9]+)', array($controller, 'delete'));

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
	 * @param string $path
	 * @param \Shipwire\Resource $controller
	 * @return \Controller
	 */
	public function addGetRoute ($path, Resource $controller)
	{
		$this->server->addGetRoute($path, array($controller, 'get'));
		return $this;
	}

	/**
	 * @param string $path
	 * @param \Shipwire\Resource $controller
	 * @param string $controllerMethod
	 * @param string $restMethod
	 * @return \Controller
	 */
	public function addCustomRoute ($path, Resource $controller, $controllerMethod, $restMethod = 'get')
	{
		$serverMethod = 'add' . ucfirst(strtolower($restMethod)) . 'Route';
		$this->server->$serverMethod($path, array($controller, $controllerMethod));
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
	->addCustomRoute('vendors/E([0-9]+)/packing-lists', new \Shipwire\Vendor(), 'packingLists')
	->addCustomRoute('vendors/E([0-9]+)/shipping-labels', new \Shipwire\Vendor(), 'shippingLabels')
	->addEntityRoutes('warehouses', new \Shipwire\Warehouse())
	->addEntityRoutes('products', new \Shipwire\Product())
	->addCustomRoute('products/E([0-9]+)/stock', new \Shipwire\Product(), 'stock')
	->addCustomRoute('products/E([0-9]+)/stock-adjustments', new \Shipwire\Product(), 'stockAdjust', 'post')
	->addPostRoute('rate', new \Shipwire\Rate())
	->addEntityRoutes('shipments', new \Shipwire\Shipment())
	->addCustomRoute('shipments/E([0-9]+)/packing-list', new \Shipwire\Shipment(), 'packingList')
	->addCustomRoute('shipments/E([0-9]+)/shipping-label', new \Shipwire\Shipment(), 'shippingLabel')
	->addCustomRoute('shipments/E([0-9]+)/tracking-numbers', new \Shipwire\Shipment(), 'trackingGet', 'get')
	->addCustomRoute('shipments/E([0-9]+)/tracking-numbers', new \Shipwire\Shipment(), 'trackingPost', 'post')
	->addEntityRoutes('orders', new \Shipwire\Order())
	->addCustomRoute('orders/E([0-9]+)/packing-lists', new \Shipwire\Order(), 'packingLists')
	->run();
