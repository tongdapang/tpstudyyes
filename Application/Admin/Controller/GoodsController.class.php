<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {

	public function showlist(){
		$list = M('goods')->order('goods_id desc')->select();

		$this->assign('list',$list);
		$this->display();
	}

	public function add(){
			// 方法一
            // if(IS_POST){
            //     $data['goods_name'] = $_POST['goods_name'];
            //     $data['goods_category_id'] = $_POST['goods_category_id'];
            //     $data['goods_price'] = $_POST['goods_price'];
            //     $data['goods_introduce'] = $_POST['goods_introduce'];
            //     $msg = '添加失败';
            //     if(M('goods')->add($data)){
            //     	$msg = '添加成功';
            //     };
            //     $this->redirect('showlist',array(),3,$msg);	
            // }
            

			// 方法二
            $goods = M('goods');
            if(IS_POST){
            	if($data = $goods->create())   //收集数据
                {
                    if($_FILES['goods_image']['error'] == 0) //图片接收成功
                    {
                        $config = array(
                            'rootPath'      =>  './application/public/uploads/', 
                            );
                        $upload = new \Think\Upload($config);
                        $info = $upload->uploadOne($_FILES['goods_image']);
                        $data['goods_big_img'] = $info['savepath'].$info['savename'];   //放入数据路的图片路径  通过上传成功的返回信息取得
                        if($goods->add($data))
                        {
                            $this->success('添加成功','showlist',3);
                        }
                        else
                        {
                            $this->error('添加失败');
                        }
                    }
                    else
                    {
                        $errorinfo = $upload->getError();
                        var_dump($errorinfo);
                        $this->error($errorinfo);
                        die;
                    }

            		
	            }
            }
            $category = M('category')->select();
            $this->assign('category',$category);
            $this->display();


			// 方法三
	// if (IS_POST) {
 //            if (M('goods')->add(I('post.'))) {
 //                $this->success('添加成功', 'showlist',2);
 //            } else {
 //                $this->error('添加失败');
 //            }
 //        }

 //        $category = M('category')->select();
 //            $this->assign('category',$category);
 //            $this->display();
	}

	public function update($goods_id){
            if(IS_POST){
                $goods = M('goods');
                $data = $goods->create();
                $data['goods_create_time'] = time();
                if($goods->save($data)){
                   $this->success('修改成功', U('showlist'),2); 
                }else{
                    $this->redirect('update', $data = array('goods_id'=>$goods_id), 3, '修改失败');
                }
                
            }
            
            $data = M('goods')->find($goods_id);
            $this->assign('data',$data);
            $category = M('category')->select();
            $this->assign('category',$category);
            $this->display();
	}

	public function del($goods_id){
            if(M('goods')->delete($goods_id)){
                $this->success('删除成功', U('showlist'), 2);
            } else {
                $this->error('删除失败', U('showlist'), 2);
            }
	}
	
}