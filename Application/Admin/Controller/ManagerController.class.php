<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller {
	public function index(){
		$this->display();
	}

	public function managertest(){
		echo '这是manager控制器的managertest()方法';
	}
}