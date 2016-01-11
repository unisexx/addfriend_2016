<?php
class Province extends ORM
{
	public $table = "provinces";

  public $has_many = array('user');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
