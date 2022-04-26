<?php
/**
 * Test our own Sync API
 *
 * SPDX-License-Identifier: GPL-3.0-only
 */

namespace Test\API;

use \App_Session;
use \Service_Redis;
use \Sync;

class Sync_Test extends \PHPUnit\Framework\TestCase
{

	function test_sync_call()
	{
		App_Session::init_gid(getenv('OPENTHC_TEST_COMPANY_A'));

		$exec = Service_Redis::get('/sync/exec');
		$this->assertEmpty($exec);


		// Get Status
		$res = Sync::api();
		$this->assertIsArray($res);
		$this->assertEquals('200', $res['code']);
		$this->assertEquals('Sync Idle', $res['meta']['detail']);

		$exec = Service_Redis::get('/sync/exec');
		$this->assertEmpty($exec);


		// Exec Sync
		$res = Sync::api([ true ]);
		$this->assertIsArray($res);
		$this->assertEquals('201', $res['code']);
		$this->assertEquals('Sync Exec', $res['meta']['detail']);

		// $exec = Service_Redis::get('/sync/exec');
		// var_dump($exec);
		// $this->assertNotEmpty($exec);

		// Get Status
		$res = Sync::api();
		$this->assertIsArray($res);
		$this->assertEquals('200', $res['code']);
		// $this->assertEquals('Sync Exec', $res['meta']['detail']);

		// $exec = Service_Redis::get('/sync/exec');
		// $this->assertNotEmpty($exec);

		// Pump Second Pull
		$res = Sync::api([
			'from' => date('Y-m-d', time() - (86400 * 30))
		]);
		// var_dump($res);
		$this->assertIsArray($res);
		$this->assertIsArray($res['meta']);
		// $this->assertEquals('201', $res['code']);
		// $this->assertIsString($res['data']);
		// $this->assertEquals('warning', $res['meta']['status']);
		// $this->assertEquals('Sync Exec', $res['meta']['detail']);
		// $hash = $res['data'];

		// sleep(2);

		// Find Hash
		$chk = Service_Redis::hget("/global/sync/$hash");
		// var_dump($chk);
		// $this->assertIsArray($chk);
		// $this->assertNotEmpty($chk['company_id']);
		// $this->assertNotEmpty($chk['contact_id']);
		// $this->assertNotEmpty($chk['from']);

		// Service_Redis::hset("/global/sync/$hash", $data);
		// Service_Redis::expire("/global/sync/$hash", 3600);
		// Service_Redis::rpush('/global/sync/pump', $hash);

	}

}
