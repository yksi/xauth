<?php

class Application_Model_Users extends Zend_Db_Table
{
	protected $_name = 'users';

	public static function getRole($sgnl) {
		switch ($sgnl) {

			case NULL:
				return 'user';
			case 1:
				return 'moderator';
			case 2:
				return 'administrator';
			default:
				return 'unknown';
		}
	}
}

