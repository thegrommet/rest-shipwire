<?php

namespace Shipwire;

/**
 * Shipwire Resource
 *
 * @author tmannherz
 */
abstract class Resource
{
	/**
	 * @var string
	 */
	protected $label = 'Resource';

	/**
	 * @param int $id
	 * @return array
	 */
	public function get ($id = null)
	{
		$res = $this->respondSuccess();
		if ($id === null) {
			$res['resource'] = array(
				'offset' => 0,
				'total' => count($this->resources),
				'previous' => 'http://link-to-previous',
				'next' => 'http://link-to-next',
				'items' => array()
			);
			foreach ($this->resources as $resource) {
				$res['resource']['items'][] = array(
					'resourceLocation' => 'http://link-to-resource',
					'resource' => $resource
				);
			}
			return $res;
		}
		else if (isset($this->resources[$id])) {
			$res['resource'] = $this->resources[$id];
			return $res;
		}
		return $this->respondError($this->label . ' not found');
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function post ($data)
	{
		$res = $this->respondSuccess();
		$keys = array_keys($this->resources);
		$res['resource'] = $this->resources[$keys[rand(0, count($this->resources) - 1)]];
		return $res;
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function put ($id)
	{
		return $this->post(array());
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function delete ($id)
	{
		if (isset($this->resources[$id])) {
			return $this->respondSuccess('Deleted');
		}
		return $this->respondError($this->label . ' not found');
	}

	/**
	 * @param string $message
	 * @return array
	 */
	protected function respondSuccess ($message = 'Successful')
	{
		return array(
			'status' => 200,
			'message' => $message,
			'resourceLocation' => 'http://link-to-resource'
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
