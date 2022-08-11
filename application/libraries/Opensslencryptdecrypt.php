<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Opensslencryptdecrypt
{
	public $secret_key = '976a25a6603aa45f1cbaff75ac939157';
	public $secret_iv  = '976a25a6603aa45f1cbaff75ac939157';
	public $method     = "AES-256-CBC";

	public $secret_token = 'f4dc1370215cf235';
	public $secret_v     = 'f4dc1370215cf235';

	public $FILE_ENCRYPTION_BLOCKS = 10000;
	public $CHUNK_SIZE = 1024 * 1024;


	function encrypt($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_key);
		$iv = substr(hash('sha256', $this->secret_iv), 0, 16);
		$output = openssl_encrypt($string, $this->method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}

	function decrypt($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_key);
		$iv = substr(hash('sha256', $this->secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $this->method, $key, 0, $iv);
		return $output;
	}

	function encryptToken($string)
	{
		$output = false;
		$key = hash('sha256', $this->secret_token);
		$v = substr(hash('sha256', $this->secret_v), 0, 16);
		$output = openssl_encrypt($string, $this->method, $key, 0, $v);
		$output = base64_encode($output);
		return $output;
	}



}