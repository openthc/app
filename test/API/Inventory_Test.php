<?php
/**
 * Test Inventory API
 *
 * SPDX-License-Identifier: GPL-3.0-only
 */

namespace Test\API;

class Inventory_Test extends \Test\Base
{
	function setUp() : void
	{
		parent::setUp();

		$this->ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');
		$this->pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
	}

	/**
	 * @test
	 */
	function create()
	{
		$verb = 'POST';
		$path = '/api/v2017/inventory';

		// Set Headers
		$head = [
			'content-type' => 'application/json'
		];

		$body = json_encode([
			'name' => sprintf('TEST INVENTORY %s', _ulid())
		]);

		$req = $this->_req($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$res = $this->assertValidResponse($res);

		return $res['data'];
	}

	/**
	 * @test
	 * @depends create
	 */
	function search($stack)
	{
		$verb = 'GET';
		$path = '/api/v2017/inventory';

		$req = $this->_req($verb, $path);
		$res = $this->ghc->send($req);

		$res = $this->assertValidResponse($res);

		return $stack;

	}

	/**
	 * @test
	 * @depends search
	 */
	function update($stack)
	{
		$verb = 'POST';
		$path = sprintf('/api/v2017/section?id=%s', $stack['id']);

		$head = [
			'content-type' => 'application/json'
		];

		$body = json_encode([
			'name' => sprintf('%s UPDATE', $stack['name'])
		]);

		$req = $this->_req($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$res = $this->assertValidResponse($res);

		return $res['data'];

	}

	/**
	 * @test
	 * @depends update
	 */
	function delete($stack)
	{
		$verb = 'DELETE';
		$path = '/api/v2017/inventory?id=%s';

		$req = $this->_req($verb, $path);
		$res = $this->ghc->send($req);

		$res = $this->assertValidResponse($res);

	}

}
