<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $id = $_SESSION['id'];
        $model = M('Msg');
        $data = $model -> where('userid='.$id) -> find();
        $file = __ROOT__.'/'.$data['filepath'];
        $this -> assign('data',$data);
        $this -> assign('file',$file);
        // dump($data);die;
        //展示模板
        $this -> display();
    }
    public function home(){
        //展示模板
        $this -> display();
    }

    //charts方法
    public function charts(){
        //select t2.name as deptname,count(*) as count from sp_user as t1,sp_dept as t2 where t1.dept_id = t2.id group by deptname;
        $model = M('dept');
        //连贯操作
        // $data = $model -> field('t2.name as deptname,count(*) as count') -> table('tp_user as t1,tp_dept as t2') -> where('t1.dept_id = t2.id') -> group('deptname') -> select();
        $data = $model -> field('address,count(*) as count') -> group('address')-> select();
        //如果当前使用的php版本是5.6之后的版本，则可以直接将data二维数组assign，不需要任何处理；但是当前的php是5.3，所以需要进行字符串拼接
        $str = '[';
        //循环遍历字符串
        foreach ($data as $key => $value) {
            $str .= "['" . $value['address'] . "'," . $value['count'] . "],";
        }
        //去除最后的逗号
        $str = rtrim($str,',') . ']';
        //[['总裁办',1],['程序部',2],['管理部',2],['财务部',1],['运营部',1]]
        //传递给模版
        // dump($data);die;
        $this -> assign('str',$str);
        //展示模版
        $this -> display();
    }
}