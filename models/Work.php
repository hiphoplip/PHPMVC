<?php 
class Work extends Model
{
	protected static $table = "work";

	public $id;
	public $name;
	public $startDate;
	public $endDate;
	public $status;
	
	function getStatus()
	{
		$st = Status::findById($this->status);
		return $st;
	}
}

?>