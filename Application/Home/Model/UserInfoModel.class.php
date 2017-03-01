<?php


namespace Home\Model;

use Think\Model;
use Home\Common\Util;

class UserInfoModel extends Model
{
    public function login($loginData)
    {
        $util = new Util();
        if($loginData) {
            if($loginData['Password']) {
                $data['Password'] = $loginData['Password'];// $util->getEncryptCode($loginData['password']);
            }
            if($loginData['OpCode']) {
                $data['OpCode'] = $loginData['OpCode'];
            }
        }
        $list = M('user_info')->where($data)->find();
        return $list;
    }

}