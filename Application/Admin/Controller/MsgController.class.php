<?php
namespace Admin\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function edit(){
        //判断请求类型
        $id = $_SESSION['id'];
        if(IS_POST){
            if($id==''){
                $this -> error('请先登录');die;
            }
            //处理提交的数据
            $post = I('post.');
            $data = M('msg') ->where('userid='.$id) -> find();
            if($data){
                $result = $model = D('Msg') -> updateData($post,$_FILES['file']);
                if($result || $result == 0){
                    $this -> success('修改成功');
                }else{
                    $this -> error('修改失败');
                }
            }else{
                $model = D('Msg');
                $result = $model -> saveData($post,$_FILES['file']);
                if($result){
                    $this -> success('添加成功');
                }else{
                    $this -> error('添加失败');
                }
            }
            
        }else{
            //展示数据有数据则展示，没有数据则为空
            //接收id
            //查询数据
            $userid = $data['userid'];
            $data = M('msg') -> where('userid='.$id) -> find();
            $file = __ROOT__."/".$data['filepath'];
            //变量分配

            $this -> assign('data',$data);
            $this -> assign('file',$file);
            //展示模板
            $this -> display();
        }
    }
}