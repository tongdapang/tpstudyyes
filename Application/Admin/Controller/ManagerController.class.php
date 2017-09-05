<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller {
	public function index(){
		$this->display();
	}

	public function head(){
            $this->display();
        }
        
        public function left(){
            $mg_id = session('mg_id');
            $manager = M('manager')->find($mg_id);  //管理员
            $role = M('role')->find($manager['mg_role_id']);
            $auth_ids = $role['role_auth_ids'];
            $info = M('auth')->where("auth_id in ($auth_ids)")->select();
            var_dump($info);die;
            $this->display();
        }
         public function right(){
            $this->display();
        }
}