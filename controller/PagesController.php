<?php 
class PagesController extends BaseController
{
	function __construct()
	{

	}

	public function error()
	{
		$this->render("error", ["message"=>"404 Page Not Found"]);
	}
}

?>