<?php
namespace Admin\Controller;
use Think\Controller;
class DocController extends Controller{
        public function add(){
            if (IS_POST) {
                # 处理提交
                $post = I('post.');
                // dump($post);die;
                $model = D('Doc');
                $result = $model -> saveData($post,$_FILES['file']);
                if($result){
                    $this -> success('添加成功',U('showList'),3);
                }else{
                    $this -> error('添加失败');
                }
            }else{
                //查询分类信息
                $user_id = $_SESSION['id'];
                $model = M('Assort');
                $data = $model -> order('sort desc') -> select();

                load("@/tree");
                $data=getTree($data);
                $this->assign('data',$data);
                //数据分配到模板
                $this -> assign('user_id',$user_id);
                //展示模板
                $this -> display();
            }
        }
        public function showList(){
            $user_id = $_SESSION['id'];
            //模型实例化
            $model = M('Doc');
            //分页第一步：查询总的记录数
            $count = $model ->where('user_id ='.$user_id) -> count();
            //分页第二步:实例化分页类，传递参数
            $page = new \Think\Page($count,1);
            //分页第三步：可选，定义提示文字
            $page -> rollPage =5; //分页栏每页显示的页数
            $page -> lastSuffix = false; //true表示最后一页显示总页数
            $page -> setConfig('prev','上一页');
            $page -> setConfig('next','下一页');
            $page -> setConfig('last','末页');
            $page -> setConfig('first','首页');
            //分页第四步：使用show方法生产url
            $show = $page -> show();
            //分页第五步，展示数据
            $data = $model -> field('t1.*,t2.assortname as assortname') -> table('tp_doc as t1,tp_assort as t2') -> where('t1.assort_id = t2.id and user_id ='.$user_id) -> limit($page -> firstRow,$page -> listRows) -> select();
            //分页第六步：传递给模板
            // dump($page);die;
            $this -> assign('data',$data);
            $this -> assign('show',$show);
            $this -> assign('count',$count);
            //分页第七部：展示模板
            $this -> display();

        }

        public function download(){
		//接收id
            $id = I('get.id');
		//查询数据
            $data = M('Doc') -> find($id);
		//下载代码
            $file = WORKING_PATH . $data['filepath'];
		//输出文件
            header("Content-type: application/octet-stream");
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header("Content-Length: ". filesize($file));
		//输出缓冲区
            readfile($file);

        }

        //showContent方法
        public function showContent(){
            //接收id
            $id = I('get.id');
            //查询数据
            $data = M('Doc') -> find($id);
            //输出内容，并且转译
            echo htmlspecialchars_decode($data['content']);
        }

        public function edit(){
            //判断请求类型
            if(IS_POST){

                //处理提交的数据
                $post = I('post.');
                $result = $model = D('Doc') -> updateData($post,$_FILES['file']);
                if($result|| $result == 0){
                    $this -> success('修改成功',U('showlist'),3);
                }else{
                    $this -> error('修改失败');
                }

            }else{

                //接收id
                $id = I('get.id');
                //查询数据
                $model = M('Doc');
                // SELECT t1.*,t2.assortname as assortname FROM tp_doc as t1,tp_assort as t2 WHERE ( t1.assort_id = t2.id and t1.id = 4 ) LIMIT 1

                $data = $model -> field('t1.*,t2.assortname as assortname') -> table('tp_doc as t1,tp_assort as t2') -> where('t1.assort_id = t2.id and t1.id ='.$id) -> find();

                // $data = $model -> find($id);
                $model1 = M('Assort');
                $data1 = $model1 -> order('sort desc') -> select();
                // dump($data);die;

                load("@/tree");
                $data1=getTree($data1);
                //变量分配
                $this -> assign('data',$data);
                $this -> assign('info',$data1);
                // dump($data);die;
                //展示模板
                $this -> display();
            }
        }

        // 查询
        public function search(){
            $user_id = $_SESSION['id'];
            if(IS_GET){
                $get = I('get.');   //获取查询数据
                $model = M("Doc"); //实例化模型
                // 构造查询条件
                if($get['status']==''){
                    $condition['user_id'] =$user_id; //如果查询结果为空则查询条件常成立
                }else{
                    $get_statue=$get['status'];
                    $condition["method"] = array("like","$get_statue%"); //"name"为表中字段  $condition随意指定为了用where方法  like为模糊查询
                    $condition['user_id'] =$user_id;
                    // $condition['wxname'] = array("like","$get_statue%");
                    
                }
                // dump($condition);die;
                $count = $model ->where($condition) ->  count();
                
                // 计算总数
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
                $this -> assign('count',$count);
                $this->display('showList');
            }
        }
}