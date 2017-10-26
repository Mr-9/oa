<?php
//声明命名空间
namespace Admin\Model;
//引入父类模型
use Think\Model;
//声明模型并且继承父类模型
class DocModel extends Model {
    # 处理提交
    public function saveData($post,$file){
    // dump($file);die;
    //实例化上传类
    //先判断是否有上传文件
    if(!$file['error']){
        //配置
        $cfg = array(
            // 'rootPath'      =>  './Uploads/', //保存根路径
            'rootPath'      =>  WORKING_PATH.UPLOAD_ROOT_PATH, //保存根路径
        );
        //处理上传
        $upload = new \Think\Upload($cfg);
        //上传
        $info = $upload -> uploadOne($file);

        // dump($info);die;
        if($info){
            $post['filepath'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
            $post['filename'] = $info['name'];
            $post['hasfile']  = 1;
        }
    }
            $post['addtime'] = time();
            return $this -> add($post);
    }

    //更新保存信息
    public function updateData($post,$file){
        //判断如果有文件则处理，没有文件则不处理
        if($file['error'] == '0'){
            //配置数组
            $cfg = array('rootPath' => WORKING_PATH.UPLOAD_ROOT_PATH);
            //实例化上传类
            $upload = new \Think\Upload($cfg);
            //上传
            $info = $upload -> uploadOne($file);
            // dump($info);die;
            //判断上传的结果
            if($info){
                //成功
                $post['filepath'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                $post['filename'] = $info['name'];
                $post['hasfile'] = 1;
            }
        }
        // dump($post);die;
        
            //写入数据
            return $this -> save($post);

    }
}