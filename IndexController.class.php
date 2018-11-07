<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $cookie=cookie('status');
        $session=session('status');
        if (empty($cookie)&&empty($session)) {
            $this->success('非法登录',U('Index/login'));
            die;
        }
        $bod=I('get.bod');
        $where="1";
        if (!empty($bod)) {
            $where.=" and s_name like '%$bod%'";
        }

        $cookie=cookie('status');
        $user_id=$cookie['id'];
        $page=I('get.page',true);
        $res=D('shuo')->getpage($page,3,$where);
        $this->assign('res',$res['list']);
        $this->assign('page',$res['page']);
        $this->assign('pagenum',$res['pagenum']);
        $this->assign('p',$page);
        $this->assign('user_id',$user_id);
        $this->assign('bod',$bod);
        $this->display();
    }
    public function user_name(){
        $name=I('get.name');
        $res=D('shuo')->where("s_name='$name'")->select();
        if ($res){
            echo "1";
        }else{
            echo "0";
        }
    }
    public function login(){
        $this->display();
    }
    public function login_do(){
        $user_name=I('post.user_name');
        $user_pwd=I('post.user_pwd');
        $pwd=md5($user_pwd);
        $res=D('login')->where("user_name='$user_name' and user_pwd='$pwd'")->find();
        $id=$res['id'];
        if ($res) {
            $status=array("user_name"=>$user_name,"id"=>$id);
            cookie("status",$status);
            session("status",$status);
            $this->success('登陆成功',U('Index/index'));
        }else{
            $this->error('登录失败');

        }
    }
    public function zhuce_do(){
        $this->display();
    }
    public function zhuce(){
        $data['user_name']=I('post.user_name');
        $user_pwd=I('post.user_pwd');
        $data['user_pwd']=md5($user_pwd);
        $res=D('login')->add($data);
        if ($res) {
            $this->success('注册成功',U('Index/login'));
        }else{
            $this->error('注册失败');

        }
    }

    public function sear(){
        $page=I('get.p');
        $bod=I('get.bod');
        $list=D('shuo')->getpage($page,3,$bod);
        $this->assign('res',$list['list']);
        $this->assign('page',$list['page']);
        $this->display();
    }
    public function del(){
        $page=I('get.p');
        $id=I('get.id');
        $id=rtrim($id,',');
        $res=D('shuo')->where("id IN($id)")->delete();
        if ($res) {
            $list=D('shuo')->getpage($page,3,'');
            $this->assign('p',$page);
            $this->assign('res',$list['list']);
            $this->assign('page',$list['page']);
            $this->display('table');
        }
    }

     public function send(){
        $this->display();
    }
    public function send_do(){
        $data=I('post.');
        $data['s_time']=time();
        $res=D('shuo')->add($data);
        if ($res) {
            $this->success('发表成功',U('Index/index'));
        }else{
            $this->error('发表失败');

        }
    }
    public function zan(){
        $id=I('get.id');
        $res=D('shuo')->where("id='$id'")->setInc('s_set');
        if ($res) {
            $list['msg']=D('shuo')->where("id='$id'")->getField('s_set',true);
            
        }else{
            echo "点赞失败";
        }
        echo json_encode($list);
    }
    public function up(){
        $id=I('get.id');
        $res=D('shuo')->where("id='$id'")->find();
        $this->assign('res',$res);
        $this->display();
    }
    public function up_do(){
        $id=I('post.id');
        $data['s_name']=I('post.s_name');
        $data['s_test']=I('post.s_test');
        $res=D('shuo')->where("id='$id'")->save($data);
        if ($res) {
            $this->success('修改成功',U('Index/index'));
        }else{
            $this->error('修改失败');

        }


    }
    public function cang(){
        $data['s_id']=$id=I('get.id');
        $cookie=cookie('status');
        $data['user_id']=$cookie['id'];
        $res=D('cang')->add($data);
        if ($res) {
            echo "1";
        }else{
            echo "2";
        }
    }
    public function delcang(){
        $data['s_id']=$id=I('get.id');
        $cookie=cookie('status');
        $user_id=$data['user_id']=$cookie['id'];
        $res=D('cang')->where("s_id='$id' and user_id='$user_id'")->delete();
        if ($res) {
            echo "1";
        }else{
            echo "2";
        }
    }
    public function delcangc(){
        $data['s_id']=$id=I('get.id');
        $cookie=cookie('status');
        $user_id=$data['user_id']=$cookie['id'];
        $res=D('cang')->where("s_id='$id' and user_id='$user_id'")->delete();
        if ($res) {
            $this->success('删除收藏成功',U('Index/wcang'));
        }else{
            $this->error('删除收藏失败');

        }
    }
    public function wcang(){
        $cookie=cookie('status');
        $user_id=$cookie['id'];
        $res=D('cang')->where("user_id='$user_id'")->join("left join shuo on cang.s_id=shuo.id")->select();
        
        $this->assign('res',$res);
        $this->display();
    }

}