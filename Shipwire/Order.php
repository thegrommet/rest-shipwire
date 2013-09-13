<?php

namespace Shipwire;

/**
 * Order resource
 *
 * @author tmannherz
 */
class Order extends Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Order';

	/**
	 * @var array
	 */
	protected $resources = array(
		1 => array(
			'id' => 1,
			'externalId' => '110098375',
			'status' => 'processed',
			'address' => array(
				'name' => 'John Doe',
				'address1' => '123 Main St.',
				'address2' => 'Apt. 1',
				'city' => 'Boulder',
				'region' => 'CO',
				'country' => 'US',
				'postCode' => '80304',
				'isCommercial' => false,
				'isPoBox' => false
			),
			'items' => array(
				array(
					'sku' => 'sku-1',
					'name' => 'Name 1',
					'quantity' => 1
				),
				array(
					'sku' => 'sku-2',
					'name' => 'Name 2',
					'quantity' => 2
				)
			)
		),
		2 => array(
			'id' => 2,
			'externalId' => '110098376',
			'status' => 'processed',
			'address' => array(
				'name' => 'John Doe',
				'address1' => '123 Main St.',
				'address2' => 'Apt. 1',
				'city' => 'Boulder',
				'region' => 'CO',
				'country' => 'US',
				'postCode' => '80304',
				'isCommercial' => false,
				'isPoBox' => false
			),
			'items' => array(
				array(
					'sku' => 'sku-1',
					'name' => 'Name 1',
					'quantity' => 1
				)
			)
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
}
