 <?php
class Admin extends DController{
	public function __construct()
	{
		parent::__construct();
		Session::checkSession();
		$data = array();
	}
	public function login(){
		$this->load->view("login");
	}
	public function Index(){
		$this->home();
	}
	public function home(){
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$data["user"] = array(
				"username" => Session::get("username")
			);
		$this->load->view("admin/home", $data);
		$this->load->view("admin/footer");

	}
	public function addCategory(){
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$this->load->view("admin/addCategory");
		$this->load->view("admin/footer");
	}
	public function insertCategory(){
		$table  = "category";
		$name   = $_POST['name'];
		$title  = $_POST['title'];


		$data = array(
			'name' => $name,
			'title' => $title
			);
		$catModel = $this->load->model("CatModel");
		$result = $catModel->insertCat($table, $data);
		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Category Added Successfully..";
		} else {
			$mdata['msg'] = "Category Not Added";
		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("location:$url");
		//$this->load->view("addCategory",$mdata);

 

	}
	public function categoryList(){
		
		$table = "category";
		$catModel = $this->load->model("CatModel");
		$data['cat'] = $catModel->catList($table);
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$this->load->view("admin/category", $data);
		$this->load->view("admin/footer");
	}
	public function editCategory($id=NULL){
		
		$table = "category";
		
		$catModel = $this->load->model("CatModel");
		$data['catbyid'] = $catModel->catById($table, $id);
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$this->load->view("admin/catUpdate", $data);
		$this->load->view("admin/footer");
	}
	public function updateCat($id=NULL){
		$table = "category";
	 
		$name  = $_POST['name'];
		$title = $_POST['title'];
	    $cond  = "id=$id ";

		$data = array(
			'name' => $name,
			'title' => $title
			);
		$catModel = $this->load->model("CatModel");
		$result= $catModel->catUpdate($table,$data, $cond);
		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Category Updated Successfully..";
		} else {
			$mdata['msg'] = "Category Not Updated";

		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("location:$url");


	}
	public function deleteCategory($id = NULL){
		$table = "category";
		$cond = "id=$id";
		$catModel = $this->load->model("CatModel");
		$result = $catModel->delCatById($table, $cond);
		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Category Deleted Successfully..";
		} else {
			$mdata['msg'] = "Category Not Deleted";

		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("location:$url");

	}
	public function addArticle(){
		$tableCat = "category";
		
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");

		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);

		$this->load->view("admin/addpost", $data);
		$this->load->view("admin/footer");
	}
	public function addNewPost(){
		if (!($_POST)) {
			header("location: ".BASE_URL."/Admin/addArticle");
		}
		$input = $this->load->validation("Dform");
		$input->post('title')
				->isEmpty()
				->length(10, 500);
		$input->post('content')
				->isEmpty();
		$input->post('cat')
				->isCatEmpty();
		if ($input->submit())
		{
			$tablePost = "post";
			$content    = $input->values['content'];
			$title  	= $input->values['title'];
			$cat  		= $input->values['cat'];
			$data = array(
				'content' => $content,
				'title' => $title,
				'cat' => $cat
				);
			$postModel = $this->load->model("PostModel");
			$result = $postModel->insertPost($tablePost, $data);
			$mdata = array();
			if ($result == 1) {
				$mdata['msg'] = "Article Added Successfully..";
			} else {
				$mdata['msg'] = "Article Not Added";
			}
			$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
			header("location:$url");

		} else {
				$data["postErrors"] = $input->errors;
				$tableCat = "category";
			
			 	$this->load->view("admin/header");
				$this->load->view("admin/sidebar");

				$catModel = $this->load->model("CatModel");
				$data['catlist'] = $catModel->catList($tableCat);

				$this->load->view("admin/addpost", $data);
				$this->load->view("admin/footer");
		}
		


	}
	public function articleList(){
		$tableCat = "category";
		$tablePost = "post";
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$postModel = $this->load->model("PostModel");
		$data['listPost'] = $postModel->getPostlist($tablePost);
		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);
		
		$this->load->view("admin/postlist", $data);
		$this->load->view("admin/footer");
	}
	public function editPost($id=NULL)
	{
		$tableCat = "category";
		$tablePost = "post";
		$postModel = $this->load->model("PostModel");
		$data['postbyid'] = $postModel->postById($tablePost, $id);
		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$this->load->view("admin/postUpdate", $data);
		$this->load->view("admin/footer");

	}
	public function updatePost($id=NULL){
		$input = $this->load->validation("Dform");
		$input->post('title');
		$input->post('content');
		$input->post('cat');
	    $cond  = "id=$id ";
		$tablePost = "post";
		$content    = $input->values['content'];
		$title  	= $input->values['title'];
		$cat  		= $input->values['cat'];
		$data = array(
			'content' => $content,
			'title' => $title,
			'cat' => $cat
			);
		$postModel = $this->load->model("PostModel");
		$result = $postModel->updatePost($tablePost, $data, $cond);
		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Article Updated Successfully..";
		} else {
			$mdata['msg'] = "Article Not Updated";

		}
		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("location:$url");


	}
	public function deletepost($id=NULL){
		$table = "post";
		$cond = "id=$id";
		$postModel = $this->load->model("PostModel");
		$result = $postModel->delPostById($table, $cond);
		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Article Deleted Successfully..";
		} else {
			$mdata['msg'] = "Article Not Deleted";

		}
		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("location:$url");

	}


}



?> 