<?php
class BaseController
{
	protected function render($view, $data = array())
	{
		$fileView = "views/".$view.".php";
		if(file_exists($fileView))
		{
			extract($data);
			ob_start();
			require_once($fileView);
			$content = ob_get_clean();
			require_once("views/masterPage.php");
		}
	}
}

?>