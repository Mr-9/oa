<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {

    //登录页面展示
    public function login(){

        $this -> display();

    }

    //登录
    public function checkLogin(){

        //接收数据
		$post = I('post.');
        // dump($post);die;
        //实例化数据
        $model = M('User');
        //查询
        $data = $model -> where($post) -> find();
        if($data){
            //用户信息持久化
            session('id',$data['id']);
            session('username',$data['username']);
            $this -> success('登录成功',U('Index/index'),3);
            //跳转到用户首页
        }else{
            $this -> error('用户名密码错误');
        }
        
        
    }
    //登出
    public function logout(){
        //清除session
        // session_destroy();
        session(null);
        //跳转到登录页面
        $this -> success('退出成功',U(login),3);
    }
}