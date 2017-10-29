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
             //找到管理员
            $manager = M('manager')->find($mg_id); 
            //根据管理员找到角色
            $role = M('role')->find($manager['mg_role_id']);
            //根据管理员的角色是否是超级管员找到零级 和 一级 权限的集合
            $auth_ids = $role['role_auth_ids'];
            if($manager['mg_role_id'] == 0){
                $info1 = M('auth')->where("auth_level=0")->select();
                $info2 = M('auth')->where("auth_level=1")->select();
            }else{
                $info1 = M('auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
                $info2 = M('auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
            }
           $this->assign('info1', $info1);
           $this->assign('info2', $info2);
           
            $this->display();
        }
         public function right(){
            $this->display();
        }
}