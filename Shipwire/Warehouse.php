<?php

namespace Shipwire;

/**
 * Warehouse resource
 *
 * @author tmannherz
 */
class Warehouse extends Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Warehouse';

	/**
	 * @var array
	 */
	protected $resources = array(
		3 => array(
			'id' => 13,
			'externalId' => 3,
			'name' => 'Warehouse 1',
			'code' => 'abc1',
			'vendorId' => 10,
			'vendorExternalId' => 1,
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
			'id' => 14,
			'externalId' => 4,
			'name' => 'Warehouse 2',
			'code' => 'abc2',
			'vendorId' => 12,
			'vendorExternalId' => 2,
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
}
