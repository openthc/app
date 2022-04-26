<?php
/**
 * Test Authentication API
 *
 * SPDX-License-Identifier: GPL-3.0-only
 */

namespace Test\API;

class Fire_Test extends \Test\Base
{
	/**
	 * @test
	 */
	function ping()
	{
		$verb = 'GET';
		$path = '/api/v2017/ping';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);


	}

	/**
	 * @test
	 */
	function product()
	{
		$verb = 'GET';
		$path = '/api/v2017/product';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);

	}

	/**
	 * @test
	 */
	function section()
	{
		$verb = 'GET';
		$path = '/api/v2017/section';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);

	}

	/**
	 * @test
	 */
	function variety()
	{
		$verb = 'GET';
		$path = '/api/v2017/variety';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);

	}

	/**
	 * @test
	 */
	function crop()
	{
		$verb = 'GET';
		$path = '/api/v2017/crop';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);

	}


	/**
	 * @test
	 */
	function inventory()
	{
		$verb = 'GET';
		$path = '/api/v2017/inventory';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);

	}

	/**
	 * @test
	 */
	function b2b()
	{
		$verb = 'GET';
		$path = '/api/v2017/b2b';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res);

	}

	/**
	 * @test
	 */
	function b2c()
	{
		$verb = 'GET';
		$path = '/api/v2017/b2c';

		$dt = new \DateTime();

		// Client Key
		$ck = getenv('OPENTHC_TEST_COMPANY_F_CLIENT_KEY');

		$pk = getenv('OPENTHC_TEST_COMPANY_F_PUBLIC_KEY');
		$this->assertNotEmpty($pk);

		$sk = getenv('OPENTHC_TEST_COMPANY_F_SECRET_KEY');
		$this->assertNotEmpty($sk);

		// Make a Signed Request
		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $sk);

		// Set Headers
		$head = [
			'authorization' => sprintf('Bearer %s', $ck),
			'date' => $dt->format(\DateTime::RFC3339),
			'signature' => $sig_hash,
		];

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);
		$res = $this->ghc->send($req);

		$this->assertValidResponse($res, 501, 'text/plain');

	}

}
