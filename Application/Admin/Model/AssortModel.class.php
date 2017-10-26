<?php
//声明命名空间
namespace Admin\Model;
//引入父类模型
use Think\Model;
//声明模型并且继承父类模型
class AssortModel extends Model{

    //开启批量验证
    // protected $patchValidate = true;
	protected $_validate        =   array(
        //针对部门名称的规则
        array('assortname','require','部门名称不能为空！'),
        array('assortname','','部门名称已经存在！',0,'unique'),
        //针对排序字段的验证
        //array('sort','number','排序必须是数字'),
        //使用函数的方式来验证排序是不是数字
        array('sort','is_numeric','排序必须是数字',0,'function'),

    );  // 自动验证定义
}