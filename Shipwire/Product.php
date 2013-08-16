<?php

namespace Shipwire;

/**
 * Product Resource
 *
 * @author tmannherz
 */
class Product extends Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Product';

	/**
	 * @var array
	 */
	protected $resources = array(
		1 => array(
			'id' => 1,
			'externalId' => 10,
			'sku' => 'sku123',
			'name' => 'Test Product 1',
			'status' => 'active',
			'description' => 'Product 1 description',
			'length' => array(
				'units' => 'in',
				'amount' => 4
			),
			'width' => array(
				'units' => 'in',
				'amount' => 5
			),
			'height' => array(
				'units' => 'in',
				'amount' => 6
			),
			'weight' => array(
				'units' => 'lbs',
				'amount' => 3.5,
				'type' => 'products'
			),
			'isFragile' => false,
			'isDangerous' => false,
			'isPerishable' => false,
			'isMedia' => false,
			'isInsert' => false,
			'dateAdded' => '2013-08-01 00:00:00',
			'dateArchived' => null,
			//'type' => '',
			//'countryOfOrigin' => 'US'
		),
		2 => array(
			'id' => 2,
			'externalId' => 12,
			'sku' => 'sku234',
			'name' => 'Test Product 2',
			'status' => 'active',
			'description' => 'Product 2 description',
			'length' => array(
				'units' => 'in',
				'amount' => 4
			),
			'width' => array(
				'units' => 'in',
				'amount' => 5
			),
			'height' => array(
				'units' => 'in',
				'amount' => 6
			),
			'weight' => array(
				'units' => 'lbs',
				'amount' => 3.5,
				'type' => 'products'
			),
			'isFragile' => false,
			'isDangerous' => false,
			'isPerishable' => false,
			'isMedia' => false,
			'isInsert' => false,
			'dateAdded' => '2013-08-02 00:00:00',
			'dateArchived' => null,
			//'type' => '',
			//'countryOfOrigin' => 'US'
		)
	);
}
