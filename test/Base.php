<?php
/**
 * Test Case Base
 * Lower Level Unit Tester with HTTP Handlers
 */

namespace Test;

class Base extends \PHPUnit\Framework\TestCase
{
	protected $_app_base;

	protected $ghc; // API Guzzle HTTP Client
	protected $raw; // Raw Response Buffer

	/**
	 *
	 */
	protected function setUp() : void
	{
		$x = getenv('OPENTHC_TEST_BASE');
		$this->_app_base = rtrim($x, '/');

		$this->ghc = new \GuzzleHttp\Client(array(
			'base_uri' => $this->_app_base,
			'allow_redirects' => false,
			'debug' => $_ENV['debug-http'],
			'http_errors' => false,
			'cookies' => true,
			'request.options' => [
				'exceptions' => false,
			],
			'headers' => [
				'authorization' => 'Bearer SERVICE/COMPANY',
			]
		));

	}

	/**
	 * HTTP Utility
	 */
	function get($url)
	{
		$res = $this->ghc->get($url);
		$ret = $this->assertValidResponse($res, 200);
		return $ret;
	}


	/**
	 * HTTP Utility
	 */
	function post_form($url, $arg)
	{
		$res = $this->ghc->post($url, array('form' => $arg));
		return $res;
	}

	/**
	 * HTTP Utility
	 */
	function post_json($url, $arg)
	{
		$res = $this->ghc->post($url, array('json' => $arg));
		return $res;
	}

	/**
	 *
	 */
	protected function _req($verb, $path, $head=[], $body=null) : \GuzzleHttp\Psr7\Request
	{
		$dt = new \DateTime();

		$sig_data = [];
		$sig_data[] = $verb;
		$sig_data[] = $path;
		$sig_data[] = $dt->format(\DateTime::RFC3339);
		$sig_data[] = $this->pk;
		$sig_data = implode("\n", $sig_data);

		$sig_hash = hash_hmac('sha256', $sig_data, $this->sk);

		$head = array_merge([
				'authorization' => sprintf('Bearer %s', $this->ck),
				'date' => $dt->format(\DateTime::RFC3339),
				'signature' => $sig_hash,
		], $head);

		$req = new \GuzzleHttp\Psr7\Request($verb, $path, $head, $body);

		return $req;

	}

	/**
	 * Intends to become an assert wrapper for a bunch of common response checks
	 * @param $res, Response Object
	 * @return void
	 */
	function assertValidResponse($res, $want_code=200, $want_type='application/json', $dump=null)
	{
		$this->raw = $res->getBody()->getContents();

		$hrc = $res->getStatusCode();

		if (empty($dump)) {
			if ($want_code != $hrc) {
				$dump = "HTTP $hrc != $want_code";
			}
		}

		if (!empty($dump)) {
				echo "\n<<< $dump <<< $hrc <<<\n{$this->raw}\n###\n";
		}

		$ret = \json_decode($this->raw, true);

		$this->assertEquals($want_code, $res->getStatusCode());
		$type = $res->getHeaderLine('content-type');
		$type = strtok($type, ';');
		$this->assertEquals($want_type, $type);
		if ('application/json' == $want_type) {
			$this->assertIsArray($ret);
		}

		return $ret;

	}


	/**
	 * Shitty Stash Data GET-er for Passing around Tests
	 */
	function _data_stash_get()
	{
		if (is_file($f)) {
			if (is_readable($f)) {
				$x = file_get_contents($f);
				$x = json_decode($x, true);
				return $x;
			}
		}

		return null;

	}

	/**
	 * Shitty Stash Data PUT-er for Passing around Tests
	 */
	function _data_stash_put($f, $d)
	{
		if (!is_string($d)) {
			$d = json_encode($d);
		}

		return file_put_contents($f, $d);
	}

}
