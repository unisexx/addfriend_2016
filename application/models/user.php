<?php
class User extends ORM
{
	public $table = "users";

	public $has_one = array('sex','province');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
