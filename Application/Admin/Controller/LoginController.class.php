<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
	public function login(){
            if(IS_POST){
                $code = I('post.captcha','','trim');
                $obj =new \Think\Verify();
                if($obj->check($code))
                {
                    $manager = M('manager');
                    $data = $manager->create();
                    $row = $manager->where($data)->find();
                    if($row){
                        $this->redirect('Manager/index');
                    }
                    else
                    {
                        $this->error('用户名和密码不正确',U('login'),1);
                    }
                }
                else
                {
                    $this->error('验证码不正确',U('login'),1);
                }
            
            }
           
            $this->display();
	}

	public function verifyImg(){
            $config = array(
                'fontSize'  =>  15,              // 验证码字体大小(px)
                'useCurve'  =>  false,            // 是否画混淆曲线
                'useNoise'  =>  true,            // 是否添加杂点	
                'imageH'    =>  30,               // 验证码图片高度
                'imageW'    =>  120,               // 验证码图片宽度
                'length'    =>  4,               // 验证码位数
                'fontttf'   =>  '4.ttf', 
            );
            $obj = new \Think\Verify($config);
            $obj->entry();
        }
}