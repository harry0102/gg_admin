<?php
namespace Agent\Controller;
use Common\Controller\BaseController;
use Think\Verify;

class IndexController extends BaseController {
    public function indexGet(){
        if($_SESSION[MODULE_NAME.'_token']) {//已登陆
            $this->display("Index:index");
        } else {//未登陆
            $this->redirect(MODULE_NAME."/Index/login");
        }
    }

    public function homeGet() {
        $html = $this->fetch("Index:index");
        $this->_result['data']['html'] = $html;
        $this->response($this->_result);
    }

    public function profileGet() {
        $this->_result['data']['html'] = 'Profile';
        $this->response($this->_result, 'json', 200);
    }

    public function loginGet() {
        if($_SESSION[MODULE_NAME.'_token']) {
            $this->display("Index:index");
        } else {
            $this->display("Index:login");
        }
    }

    public function verifyGet() {
        $config = array(
            'fontSize' => 18,
            'useNoise' => false,
            'useCurve' => false,
            'length' => 4,
            'imageW' => 150,
            'imageH' => 37,
            'useImgBg' => true,
            'reset' => false,//验证成功是否重置
        );
        $Verify = new Verify($config);
        $Verify->entry();
    }
}