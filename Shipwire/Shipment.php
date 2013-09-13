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
			'externalId' => '140086100',
			'orderId' => 900,
			'orderExternalId' => 1,
			'vendorId' => 1,
			'vendorExternalId' => 666,
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
			'externalId' => '140086103',
			'orderId' => 900,
			'orderExternalId' => 1,
			'vendorId' => 1,
			'vendorExternalId' => 666,
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

	/**
	 * Tracking number GET
	 *
	 * @param int $id
	 * @return array
	 */
	public function trackingGet ($id = null)
	{
		$res = $this->respondSuccess();
		$res['resource'] = array(
			'items' => array(
				array(
					'carrier' => array(
						'code' => 'UPS GD',
						'name' => 'Ground'
					),
					'number' => '1ZA57F290343221611'
				)
			)
		);
		return $res;
	}

	/**
	 * Tracking number POST
	 *
	 * @param array $data
	 * @return array
	 */
	public function trackingPost ($data)
	{
		return $this->trackingGet();
	}
}
