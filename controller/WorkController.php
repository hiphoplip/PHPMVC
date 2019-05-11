<?php 
class WorkController extends BaseController
{
	function __construct()
	{

	}

	public function index()
	{
		$list = Work::all();
		$this->render("list", ["title"=>"List Task", "listTask" => $list]);
	}

	public function show()
	{
		$this->render("show", ["title"=>"Show Calendar Task"]);
	}

	public function edit($id=null)
	{
		$work = Work::findById((int)$id);
		$listStatus = Status::all();
		$type = $id == null ? "add" : "update";
		$this->render("edit", ["title"=>"Information Task", "task" => $work, "type" => $type, "listStatus" => $listStatus]);
	}

	public function update($data)
	{
		$work = Work::findById((int)$data['id']);
		$work->name = $data['name'];
		$work->startDate = $data['startDate'];
		$work->endDate = $data['endDate'];
		$work->status = (int)$data['status'];
		//update
		$work->save();
		setSession("success", "Update Task Success");
		redirect('work/edit/'.$data['id']);
	}

	public function add($data)
	{
		$work = new Work;
		$work->name = $data['name'];
		$work->startDate = $data['startDate'];
		$work->endDate = $data['endDate'];
		$work->status = (int)$data['status'];
		$work->save();
		setSession("success", "Add New Task Success");
		redirect('work');
	}

	public function delete($data)
	{
		$work = Work::findById((int)$data['id']);
		$work->delete();
		setSession("success", "Delete Task Success");
	}

	public function submit()
	{
		$request = new Request;
		$param = $request->getParams();
		$typeSubmit = $param['action'];
		switch ($typeSubmit) {
			case "update":
				$this->update($param);
				break;
			case "add":
				$this->add($param);
				break;
			case "delete":
				$this->delete($param);
				break;
			default:
				redirect('work');
				break;
		}
		
	}

	function GetAllTask()
	{
		$list = Work::all();
		echo json_encode($list);
	}


}
?>