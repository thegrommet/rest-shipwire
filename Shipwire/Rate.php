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
	 * @param array $data
	 * @return array
	 */
	public function post ($data)
	{
		return $this->respondSuccess();
	}
}
