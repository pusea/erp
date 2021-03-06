<?php

// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class MailerController extends AdminbaseController {

    /**
     * SMTP配置
     */
    public function index() {
        $this->display();
    }

    /**
     * SMTP配置处理
     */
    public function index_post() {
        $post = array_map('trim', I('post.'));

        if (in_array('', $post) && !empty($post['smtpsecure']))
            $this->error("不能留空！");

        $configs['SP_MAIL_ADDRESS'] = $post['address'];
        $configs['SP_MAIL_SENDER'] = $post['sender'];
        $configs['SP_MAIL_SMTP'] = $post['smtp'];
        $configs['SP_MAIL_SECURE'] = $post['smtpsecure'];
        $configs['SP_MAIL_SMTP_PORT'] = $post['smtp_port'];
        $configs['SP_MAIL_LOGINNAME'] = $post['loginname'];
        $configs['SP_MAIL_PASSWORD'] = $post['password'];
        $result = sp_set_dynamic_config($configs);
        sp_clear_cache();
        if ($result) {
            add_system_record($_SESSION['ADMIN_ID'], 1, 3, 'SMTP配置成功');
            $this->success("保存成功！");
        } else {
            add_system_record($_SESSION['ADMIN_ID'], 1, 3, 'SMTP配置失败');
            $this->error("保存失败！");
        }
    }

    /**
     * 会员账号激活
     */
    public function active() {
        $where = array('option_name' => 'member_email_active');
        $option = M('Options')->where($where)->find();
        if ($option) {
            $options = json_decode($option['option_value'], true);
            $this->assign('options', $options);
        }
        $this->display();
    }

    public function active_post() {
        $configs = array();
        $configs['SP_MEMBER_EMAIL_ACTIVE'] = I('post.lightup', 0, 'intval');
        sp_set_dynamic_config($configs);

        $data = array();
        $data['option_name'] = "member_email_active";
        $options = I('post.options/a');
        $options['template'] = htmlspecialchars_decode($options['template']);
        $data['option_value'] = json_encode($options);
        $options_model = M('Options');
        if ($options_model->where("option_name='member_email_active'")->find()) {
            $result = $options_model->where("option_name='member_email_active'")->save($data);
        } else {
            $result = $options_model->add($data);
        }

        if ($result !== false) {
            add_system_record($_SESSION['ADMIN_ID'], 1, 3, '邮件模板保存成功');
            $this->success("保存成功！");
        } else {
            add_system_record($_SESSION['ADMIN_ID'], 1, 3, '邮件模板保存失败');
            $this->error("保存失败！");
        }
    }

    public function test() {
        if (IS_POST) {
            $rules = array(
                array('to', 'require', '收件箱不能为空！', 1, 'regex', 3),
                array('to', 'email', '收件箱格式不正确！', 1, 'regex', 3),
                array('subject', 'require', '标题不能为空！', 1, 'regex', 3),
                array('content', 'require', '内容不能为空！', 1, 'regex', 3),
            );

            $model = M(); // 实例化User对象
            if ($model->validate($rules)->create() !== false) {
                $data = I('post.');
                $result = sp_send_email($data['to'], $data['subject'], $data['content']);
                if ($result && empty($result['error'])) {
                    add_system_record($_SESSION['ADMIN_ID'], 6, 3, '测试邮件发送成功');
                    $this->success('发送成功！');
                } else {
                    add_system_record($_SESSION['ADMIN_ID'], 6, 3, '测试邮件发送失败');
                    $this->error('发送失败：' . $result['message']);
                }
            } else {
                $this->error($model->getError());
            }
        } else {
            $this->display();
        }
    }

}
