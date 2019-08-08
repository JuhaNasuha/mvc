<?php
class PostModel extends DModel{
	
	public function __construct()
	{
		parent::__construct();
		//echo "Category model....";
	}
	public function getAllPost($table){
		$sql = "select * from $table order by id desc limit 3 ";
		return  $this->db->select($sql);
	} 
	public function getPostlist($table){
		$sql = "select * from $table order by id desc ";
		return  $this->db->select($sql);
	}
	public function getPostById($tablePost, $tableCat, $id){
		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
		INNER JOIN $tableCat
		ON $tablePost.cat = $tableCat.id
		WHERE $tablePost.id = $id";
		return  $this->db->select($sql);
	} 	
	public function getPostByCat($tablePost, $tableCat, $id){
		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
		INNER JOIN $tableCat
		ON $tablePost.cat = $tableCat.id
		WHERE $tableCat.id = $id";
		return  $this->db->select($sql);

	}
	public function getLatestPost($table){
		$sql = "select * from $table order by id desc limit 5 ";
		return  $this->db->select($sql);

	}
	public function getPostBySearch($tablePost, $keyword, $cat){
		if (empty($keyword) && $cat == 0) {
			header("location: ".BASE_URL."/Index/home");
		}
		if (isset($keyword) && !empty($keyword) ) {
			$sql = "SELECT * FROM $tablePost WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
		}
		elseif (isset($cat)) {
			$sql = "SELECT * FROM $tablePost WHERE cat = $cat"; 
		}
		
		return  $this->db->select($sql);

	}
	public function insertPost($tablePost, $data){
		return $this->db->insert($tablePost, $data);

	}
	public function postById($tablePost, $id){
		$sql  = "select * from $tablePost where id=$id";
		return $this->db->select($sql);
	}
	public function updatePost($tablePost, $data, $cond){

		return $this->db->update($tablePost, $data, $cond);
	}
	public function delPostById($table, $cond){
		return $this->db->delete($table, $cond);
	}
}



?>