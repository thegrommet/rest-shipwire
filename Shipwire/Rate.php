<?php

namespace Shipwire;

/**
 * Rate resource
 *
 * @author tmannherz
 */
class Rate extends Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Rating';

	/**
	 * @var array
	 */
	protected $schema = array(
		'status' => 200,
		'message' => 'Successful',
		'moreInfo' => 'more info...',
		'resource' => array(
			'groupBy' => 'vendor',
			'rates' => array(),
			'warnings' => array(
				array(
					'type' => 'warning',
					'code' => 123,
					'message' => 'warning message...'
				)
			),
			'errors' => array(
				array(
					'type' => 'error',
					'code' => 123,
					'message' => 'error message...'
				)
			)			
		)
	);
	
	/**
	 * Add a rate to the schema.
	 *
	 * @param array $schema
	 * @param int $groupId
	 * @param string $groupName
	 * @param int $numOpts
	 */
	protected function addRate (&$schema, $groupId, $groupName, $numOpts = null)
	{
		$group = array(
			'groupName' => $groupName,
			'groupId' => $groupId,
			'groupExternalId' => $groupId,
			'serviceOptions' => array()
		);
		if (!$numOpts) {
			$numOpts = rand(1, 3);
		}	
		for ($i = 1; $i <= $numOpts; $i++) {
			switch ($i) {
				case 2:
					$serviceLevelCode = '2D';
					$serviceLevelName = '2-Day';
					$carrier = 'UPS 1D';
					break;
				case 3:
					$serviceLevelCode = '1D';
					$serviceLevelName = '1-Day';
					$carrier = 'UPS 2D';
					break;
				case 1:
				default:
					$serviceLevelCode = 'GD';
					$serviceLevelName = 'Ground';
					$carrier = 'UPS GD';				
			}
			$group['serviceOptions'][] = array(
				'serviceLevelCode' => $serviceLevelCode,
				'serviceLevelName' => $serviceLevelName,
				'shipments' => array(
					array(
						'warehouseName' => $groupName . ' Warehouse',
						'vendorName' => $groupName,
						'carrier' => $carrier,
						'expectedShipDate' => date('Y-m-d'),
						'expectedDeliveryDateMin' => date('Y-m-d'),
						'expectedDeliveryDateMax' => date('Y-m-d'),
						'cost' => array(
							'currency' => 'USD',
							'type' => 'total',
							'name' => 'Total',
							'amount' => rand(400, 5000) / 100,
							'converted' => false
						),
						'subtotals' => array(
							array(
								'currency' => 'USD',
								'type' => 'total',
								'name' => 'Total',
								'amount' => 5.95,
								'converted' => false
							),
							array(
								'currency' => 'USD',
								'type' => 'shipping',
								'name' => 'Shipping',
								'amount' => 5.95,
								'converted' => false
							)
						),
						'pieces' => array(
							array(
								'length' => 4,
								'width' => 6,
								'height' => 7,
								'weight' => array(
									'units' => 'lbs',
									'amount' => 3.4,
									'type' => 'products'
								),
								'subweights' => array(
									array(
										'units' => 'lbs',
										'amount' => 2.4,
										'type' => 'products'
									),
									array(
										'units' => 'lbs',
										'amount' => 1,
										'type' => 'packaging'
									)
								),
								'contents' => array(
									array(
										'sku' => 'sku',
										'name' => 'name',
										'quantity' => 1
									)
								)
							)
						)
					)
				)
			);
		}
		$schema['resource']['rates'][] = $group;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function post ($data)
	{
		$schema = $this->schema;
		unset($schema['resource']['warnings']);
		unset($schema['resource']['errors']);

		// this really needs to be adjusted for the sales quote to return usable rates
		$this->addRate($schema, 666, 'The Grommet (S)', 2);
		//$this->addRate($schema, 635, 'Active People', 3);

		return $schema;
	}
}
