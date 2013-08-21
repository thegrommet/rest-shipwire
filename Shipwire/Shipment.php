<?php

namespace Shipwire;

/**
 * Shipment resource
 *
 * @author tmannherz
 */
class Shipment extends Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Shipment';

	/**
	 * @var array
	 */
	protected $resources = array(
		1 => array(
			'id' => 1,
			'orderId' => 900,
			'vendorId' => 1,
			'shipmentNumber' => '140086100',
			'status' => 'processed',
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
			),
			'pieces' => array(
				array(
					'length' => array(
						'units' => 'in',
						'amount' => 5
					),
					'width' => array(
						'units' => 'in',
						'amount' => 4
					),
					'height' => array(
						'units' => 'in',
						'amount' => 3
					),
					'weight' => array(
						'units' => 'lbs',
						'amount' => 1.4,
						'type' => 'products'
					),
					'subweights' => array(
						array(
							'units' => 'lbs',
							'amount' => 1,
							'type' => 'products'
						),
						array(
							'units' => 'lbs',
							'amount' => 0.4,
							'type' => 'packaging'
						)
					),
					'contents' => array(
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
				)
			)
		),
		2 => array(
			'id' => 2,
			'orderId' => 900,
			'vendorId' => 1,
			'shipmentNumber' => '140086101',
			'status' => 'complete',
			'items' => array(
				array(
					'sku' => 'sku-1',
					'name' => 'Name 1',
					'quantity' => 1
				)
			),
			'pieces' => array(
				array(
					'length' => array(
						'units' => 'in',
						'amount' => 3
					),
					'width' => array(
						'units' => 'in',
						'amount' => 3
					),
					'height' => array(
						'units' => 'in',
						'amount' => 3
					),
					'weight' => array(
						'units' => 'lbs',
						'amount' => 1,
						'type' => 'products'
					),
					'subweights' => array(
						array(
							'units' => 'lbs',
							'amount' => 0.5,
							'type' => 'products'
						),
						array(
							'units' => 'lbs',
							'amount' => 0.5,
							'type' => 'packaging'
						)
					),
					'contents' => array(
						array(
							'sku' => 'sku-1',
							'name' => 'Name 1',
							'quantity' => 1
						)
					)
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
	public function packingList ($id)
	{
		return hex2bin($this->hexPdf);
	}

	/**
	 * Render the PDF.
	 *
	 * @param int $id
	 * @return string
	 */
	public function shippingLabel ($id)
	{
		return hex2bin($this->hexPdf);
	}
}
