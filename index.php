<?php
/**
 * Rest server for Grommet_Shipwire testing.
 *
 * @author tmannherz
 */

// the following two classes have been modified slightly to fit our needs.
require_once 'RestService/Client.php';
require_once 'RestService/Server.php';

use RestService\Server;

Server::create('/', new Shipwire)
	->setHttpStatusCodes(true)
	
	// vendor resources
	->addGetRoute('vendors', 'getVendors')
	->addGetRoute('vendors/([0-9]+)', 'getVendor')
	->addPostRoute('vendors', 'postVendor')
	->addPutRoute('vendors/([0-9]+)', 'putVendor')
	->addDeleteRoute('vendors/([0-9]+)', 'deleteVendor')
	
	// warehouse resources
	->addGetRoute('warehouses', 'getWarehouses')
	->addGetRoute('warehouses/([0-9]+)', 'getWarehouse')
	->addPostRoute('warehouses', 'postWarehouse')
	->addPutRoute('warehouses/([0-9]+)', 'putWarehouse')
	->addDeleteRoute('warehouses/([0-9]+)', 'deleteWarehouse')
	
 ->run();

/**
 * Shipwire REST resources.
 */
class Shipwire
{
	/**
	 * @var array
	 */
	protected $vendors = array(
		1 => array(
			'id' => 1,
			'name' => 'Test Vendor 1',
			'status' => 'active',
			'description' => 'Vendor 1 description',
			'contactName' => 'Vendor 1 name',
			'contactEmail' => 'vendor1@thegrommet.com',
			'contactPhone' => '123-456-7890',
			'contactFax' => '234-567-8901',
			'address1' => '123 Main St',
			'address2' => 'Apt. 1',
			'city' => 'Boulder',
			'region' => 'CO',
			'postalCode' => '80304',
			'country' => 'US'
		),
		2 => array(
			'id' => 2,
			'name' => 'Test Vendor 2',
			'status' => 'pending',
			'description' => 'Vendor 2 description',
			'contactName' => 'Vendor 2 name',
			'contactEmail' => 'vendor2@thegrommet.com',
			'contactPhone' => '123-456-7890',
			'contactFax' => '234-567-8901',
			'address1' => '234 Main St',
			'city' => 'Boulder',
			'region' => 'CO',
			'postalCode' => '80304',
			'country' => 'US'
		)
	);

	/**
	 * @var array
	 */
	protected $warehouses = array(
		3 => array(
			'id' => 3,
			'name' => 'Warehouse 1',
			'code' => 'abc1',
			'vendorId' => 1,
			'status' => 'active',
			'description' => 'Warehouse 1 description',
			'contactName' => 'Warehouse 1 name',
			'contactEmail' => 'warehouse1@thegrommet.com',
			'contactPhone' => '123-456-7890',
			'contactFax' => '234-567-8901',
			'address1' => '123 Main St',
			'address2' => 'Apt. 1',
			'city' => 'Boulder',
			'region' => 'CO',
			'postalCode' => '80304',
			'country' => 'US'
		),
		4 => array(
			'id' => 4,
			'name' => 'Warehouse 2',
			'code' => 'abc2',
			'vendorId' => 1,
			'status' => 'active',
			'description' => 'Warehouse 2 description',
			'contactName' => 'Warehouse 2 name',
			'contactEmail' => 'warehouse2@thegrommet.com',
			'contactPhone' => '123-456-7890',
			'contactFax' => '234-567-8901',
			'address1' => '234 Main St',
			'city' => 'Boulder',
			'region' => 'CO',
			'postalCode' => '80304',
			'country' => 'US'
		)
	);

	/**
	 * @param int $id
	 * @return array
	 */
	public function getVendor ($id)
	{
		if (isset($this->vendors[$id])) {
			return $this->vendors[$id];
		}
		return $this->respondError('Vendor not found');
	}

	/**
	 * @return array
	 */
	public function getVendors ()
	{
		return $this->vendors;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function postVendor ($data)
	{
		return $this->respondSuccess();
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function putVendor ($id)
	{
		return $this->deleteVendor($id);
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function deleteVendor ($id)
	{
		if (isset($this->vendors[$id])) {
			return $this->respondSuccess();
		}
		return $this->respondError('Vendor not found');
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function getWarehouse ($id)
	{
		if (isset($this->warehouses[$id])) {
			return $this->warehouses[$id];
		}
		return $this->respondError('Warehouse not found');
	}

	/**
	 * @return array
	 */
	public function getWarehouses ()
	{
		return $this->warehouses;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function postWarehouse ($data)
	{
		return $this->respondSuccess();
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function putWarehouse ($id)
	{
		return $this->deleteWarehouse($id);
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function deleteWarehouse ($id)
	{
		if (isset($this->warehouses[$id])) {
			return $this->respondSuccess();
		}
		else {
			return $this->respondError('Warehouse not found');
		}
	}

	/**
	 * @param string $message
	 * @return array
	 */
	protected function respondSuccess ($message = 'Successful')
	{
		return array(
			'status' => 200,
			'message' => $message
		);
	}
	
	/**
	 * @param string $message
	 * @param int $code
	 * @return array
	 */
	protected function respondError ($message = 'Not found', $code = 404)
	{
		return array(
			'status' => $code,
			'message' => $message,
			'moreInfo' => 'more info...'
		);
	}
}
