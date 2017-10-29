<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends Controller {
    public function showlist(){
        $list = $M('role')->select();
        $this->assign('list',$list);
        $this->display();
    }
    
    public function distribute(){
        
    }
}
