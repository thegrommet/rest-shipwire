<?php

namespace Shipwire;

/**
 * Vendor
 *
 * @author tmannherz
 */
class Vendor extends Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Vendor';

	/**
	 * @var array
	 */
	protected $resources = array(
		1 => array(
			'id' => 10,
			'externalId' => 1,
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
			'id' => 12,
			'externalId' => 2,
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
	 * Render the PDF.
	 * 
	 * @param int $id
	 * @return string
	 */
	public function packingLists ($id)
	{
		return hex2bin($this->hexPdf);
	}

	/**
	 * Render the PDF.
	 *
	 * @param int $id
	 * @return string
	 */
	public function shippingLabels ($id)
	{
		return hex2bin($this->hexPdf);
	}
}
