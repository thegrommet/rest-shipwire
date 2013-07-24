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
		if ($id === null) {
			return array(
				'offset' => 0,
				'total' => count($this->resources),
				'previous' => 'http://link-to-previous',
				'next' => 'http://link-to-next',
				'items' => array_values($this->resources)
			);
		}
		else if (isset($this->resources[$id])) {
			return $this->resources[$id];
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
		$res['resource'] = array('id' => rand(0, count($this->resources) - 1));
		return $res;
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function put ($id)
	{
		return $this->delete($id);
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function delete ($id)
	{
		if (isset($this->resources[$id])) {
			return $this->respondSuccess();
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
