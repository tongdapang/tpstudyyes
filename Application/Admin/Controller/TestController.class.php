<?php
namespace Admin\Controller;
use Think\Controller;
class TestController extends Controller {
		public function test(){
		echo __MODULE__;
	}

	public function test1(){
		$goods = M('goods')->getbygoods_id(9);
		var_dump($goods);
	}

	public function test2(){
		echo C('DB_PWD','123').'<br/>';
		$goods = M('goods');
		echo $goods->count().'<br/>';
		echo $goods->max('goods_price').'<br/>';
		echo $goods->min('goods_price').'<br/>';
	}

	public function test3(){
		var_dump(C('cur_model'));
	}

	public function test4(){
		/*$data = array(
			'goods_name'=>'手机',
			'goods_price'=>'2000'
			);
		echo M('goods')->add($data);*/

		$goods = M('goods');
		$goods->goods_name = '裤子';
		$goods->goods_price = 120;
		echo $goods->add();
	}

	public function test5(){
		$data = array (
			'goods_name'=>'手机222',
			'goods_price'=>222222,
			'goods_id'=>142,143
			);
		echo M('goods')->save($data);
	}

	public function test6(){
		echo M('goods')->delete('142,143');
	}

	public function test7(){
		M('goods')->goods_id=138;
		echo M('goods')->delete();
	}

	public function test8(){
		$list = M()->query('select * from sw_goods');
		var_dump($list);
	}

	public function test9(){
		echo M()->execute('delete from sw_goods where goods_id=128');
	}
        
        public function test10(){
            $a = getimagesize('./application/admin/public/img/admin.png');
            echo '<pre>';
            var_dump($a);
        }

}

