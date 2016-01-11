<?php
class Sex extends ORM
{
	public $table = "sexs";

  public $has_many = array('user');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
