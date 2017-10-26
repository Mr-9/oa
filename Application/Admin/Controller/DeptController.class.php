<?php
namespace Admin\Controller;
use Think\Controller;
class DeptController extends Controller {
    public function add(){
        
                //判断请求类型
                if(IS_POST){
                    $post=I('post.');
                    //写入数据
                    $model=M('Dept');
                    //数据对象的创建
                    $data=$model->create();//不传递参数则接收post数据
                    if(!$data){
                        //提示用户验证失败
                        $this->error($model->getError());exit;
                    }
                    $result=$model->add();
                    //判断返回值
                    if($result>0){
                        //成功
                        $this->success('添加成功',U('showList'),3);
                    }else{
                        //失败
                        $this->error('添加失败',3);
                    }
        
                }else{
                    $data = time();
                    //展示数据
                    $this->assign('data',$data);
                    //展示模版
                    $this->display();
                }
        
            }
        
            // public function showList(){
            // 	$model=M('Dept');
            // 	$data=$model->order('id asc')->select();
        
            // 	$this->assign('data',$data);
            // 	$this->display();
        
            // }
        
                public function showList(){
                    //实例化模型
                    $model = M('Dept');
                    //分页第一步计算总数
                    $count = $model -> count();
                    //分页第二步实例化分页类传递参数
                    $page = new \Think\Page($count,10); 	     //每页显示1条
                    //分页第三步定制分页按钮的提示文字
                    $page -> rollPage = 4;                   //显示页码的数量
                    $page -> lastSuffix = false;	         //最后是否显示页码总数
                    //一些样式
                    $page -> setConfig('prev','上一页');
                    $page -> setConfig('next','下一页');
                    $page -> setConfig('last','末页');
                    $page -> setConfig('first','首页');
                    //分页第四步通过show方法输出分页的url链接
                    $show = $page -> show();
                    //分页第五步 查询列表数据
                    $data = $model -> limit($page -> firstRow,$page -> listRows) -> order('id asc') -> select();
                    //分页第六部 传递给模板
                    $this -> assign('data',$data);
                    $this -> assign('show',$show);
                    ///分页第七部 展示模板
                    $this ->display();
                }
        
        
            public function edit(){
        
                if(IS_POST){
                    //处理post请求
                    $post = I('post.');
                    $post['addtime'] = time();
                    // dump($post);die;			
                    //实例化
                    $model = M('dept');
                    //保存操作
                    $result = $model -> save($post);
                    //判断结果
                    if($result !== false){
                        $this -> success('修改成功',U('showList'),3);
                    }else{
                        $this -> error('修改失败');
                    }
        
                }else{
        
                    //获取数据
                    $id = I('get.id');
        
                    //实例化模型
                    $model = M('Dept');
                    //查询部门信息
                    $data = $model -> find($id);
                    //变量分配
                    $this -> assign('data',$data);
                    //展示模板
                    $this->display();
                }
            }
        
            //del
            public function del(){
                //接收参数
                $id = I('get.id');
                //模型实例化
                $model = M('Dept');
                //删除
                $result = $model -> delete($id);
                //根据结果判断
                if($result){
                    //删除成功
                    $this -> success('删除成功');
                    
                }else{
                    //删除失败
                    $this -> error('删除失败');
                }
            }
        
            public function search(){
                if(IS_GET){
                    $get = I('get.');   //获取查询数据
                    $model = M("Dept"); //实例化模型
                    // 构造查询条件
                    if($get['status']==''){
                        $condition = 1; //如果查询结果为空则查询条件常成立
                    }else{
                        $get_statue=$get['status'];
                        $condition["name|wxname"] = array("like","$get_statue%"); //"name"为表中字段  $condition随意指定为了用where方法  like为模糊查询
                        // $condition['wxname'] = array("like","$get_statue%");
                        
                    }
                    // 计算总数
                    $count = $model ->where($condition)->  count();
                    foreach($condition as $key=>$val) {						//手册中传递数值的方法
                            $Page->parameter   .=   "$key=".urlencode($val).'&';
                        }
                    // 实例化分页类
                        $Page = new \Think\Page($count,1);
                        $Page -> rollPage = 4;
                        $Page -> lastSuffix = false;
                        $Page -> setConfig('prev','上一页');
                        $Page -> setConfig('next','下一页');
                        $Page -> setConfig('last','末页');
                        $Page -> setConfig('first','首页');
                    // 分页显示输出
                    $show = $Page->show();
                    // 当前页数据查询
                    $data = $model->where($condition)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
                    // 赋值赋值
                    $this->assign('show', $show);			//输出页码到模板
                    $this->assign('data', $data);			//输出列表到模板
                    $this->display('showList');
                }
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
        