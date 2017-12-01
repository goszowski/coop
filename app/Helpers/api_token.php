<?php

// use Session;

function api_token()
{
	$token = str_random(64);
	Session::put('api_token', $token);
	return $token;
}