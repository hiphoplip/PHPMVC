<?php  
class Model 
{
	protected static $table = "";

	//protected $primaryKey = "id";

	public static function find($condition = array())
	{
		$db = DB::getInstance();
		$list = [];
		$where = "";
		$select = "Select * From ".static::$table." Where 1=1 ";

		if(!empty($condition))
		{
			foreach ($condition as $key => $value) {
				$where = $where . "And " . $key . "=:" . $key . " ";
			}
		}

		$exc = $db->prepare($select.$where);
		$exc->execute($condition);
		foreach ($exc->fetchAll() as $item) {
			$obj = new static();
			
			foreach ($item as $key => $value) {
				if(property_exists(get_class($obj), $key))
					$obj->$key = $value;
			}
		    $list[] = $obj;
		}
	    return $list;
	}

	public static function findById($id)
	{
		$obj = self::find(["id"=>$id]);
		if(count($obj) > 0)
			return $obj[0];
		else 
			return new static();
	}

	public static function all()
	{
		return self::find(null);
	}

	public function save()
	{
		$db = DB::getInstance();
		$data = (array)$this;
		if($this->isExists())
		{
			$sql = "UPDATE ".strtolower((get_class($this)))." SET ";
			$set = "";
			foreach ($this as $property => $value) {
				$set .= $property."=:".$property.",";
			}
			$sql .= trim($set,','). " WHERE id=:id";
		}
		else 
		{
			$sql = "INSERT INTO ".strtolower((get_class($this)))."";
			$column = "";
			$set = "";
			foreach ($this as $property => $value) {
				if($property == "id") 
					continue;
				$column.=$property.",";
				$set .= ":".$property.",";
			}
			$sql.="(".trim($column,',').")"." values(".trim($set,',').")";
			$data = array_slice($data,1);
		}
		
		$exc = $db->prepare($sql);
		$exc->execute($data);
	}

	public function delete()
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM ".strtolower((get_class($this)));
		$sql .= " WHERE id=:id";
		$exc = $db->prepare($sql);
		$data = (array)$this;
		$exc->execute(array_slice($data,0,1));
	}

	public function isExists()
	{
		$db = DB::getInstance();
		$select = "Select count(id) From ".strtolower((get_class($this)))." Where id=:id ";
		$exc = $db->prepare($select);
		$exc->execute(['id'=> $this->id]);
		$result = $exc->fetch(PDO::FETCH_ASSOC);
		return (int)$result['count(id)'];
	}

}
?>