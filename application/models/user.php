<?php
class User extends ORM
{
	public $table = "users";
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>