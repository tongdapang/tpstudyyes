<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->display();
	}

	public function _empty(){
		echo '这是index控制器的非法操作';
	}
}