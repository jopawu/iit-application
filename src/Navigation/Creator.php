<?php

namespace iit\Application\Navigation;

class Creator
{
	const SCRIPT_NAME = 'run.php';

	public function getLink()
	{
		return self::SCRIPT_NAME;
	}
}