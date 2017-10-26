<?php
namespace Admin\Controller;
use Think\Controller;
class AssortController extends Controller {
    
    //添加数据
    public function add(){

        if(IS_POST){

            $model = D('Assort');
            $data = $model -> create();//不传参数接收数据

            if(!$data){
                $this -> error($model->getError());exit;
            }

            $result=$model->add();
                       
            if($result>0){
                //成功
                $this -> success('添加成功',U('showList'),3);
            }else{
                //失败
                $this -> error('添加失败',3);
            }
        }else{
            
            $model = M('Assort');
            $data = $model -> order('sort asc') ->select();
            $this -> assign('data',$data);
            $this -> display();
        }
    }

    // 展示列表
    public function showList(){

        $model = M('Assort');

        $data = $model -> order('sort desc') -> select();
        //二次遍历查询顶级部门
		foreach($data as $key=>$value){
			if($value['pid']>0){
				//查询pid对应的部门信息
				$info=$model->find($value['pid']);
				//只需要保留其中的name
				$data[$key]['passortname']=$info['assortname'];
			}
        }
		//使用load方法载入文件 只能在分组目录中使用
		load("@/tree");
		$data=getTree($data);
		$this->assign('data',$data);
        // dump($data);die;
		$this->display();
    }

    //修改数据
    public function edit(){
        if(IS_POST){
            
            $model = D('Assort');
            $data = $model -> create();//不传参数接收数据

            if(!$data){
                $this -> error($model->getError());exit;
            }

            $result=$model->save($data);
                    //    dump($result);die;
            if($result >= 0){
                //成功
                $this -> success('添加成功',U('showList'),3);
            }else{
                //失败
                $this -> error('添加失败',3);
            }

        }else{
            $id = I('get.id');
            $model = M('Assort');
            $data = $model -> find($id);
            $info = $model -> where('id !='.$id) -> select();
            $this -> assign('data',$data);
            $this -> assign('info',$info);
            $this ->display();
        }
    }

    //删除数据
    public function del(){
        $id = I('get.id');
        $model = M('Assort');
        $result = $model -> delete($id); 
        if($result){
            $this -> success('删除成功');
        }else{
            $this -> error('删除失败');
        }
    }

}