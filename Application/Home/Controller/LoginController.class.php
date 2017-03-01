<?php
namespace Home\Controller;
header("Access-Control-Allow-Origin: *");
use Think\Controller;

class LoginController extends Controller
{
    public function ajaxLogin()
    {
        $result = null;
        $data['Password'] = $_POST['checkPass'];
        $data['OpCode'] = $_POST['account'];
        $result = D('UserInfo')->login($data);

        if ($result) {
            $result["password"] = '';
            $_SESSION["user"] = $result;
            $this->success($result, null, true);
        } else {
            $this->error($data, null, true);
        }
    }


    public function ajaxLogout()
    {
        if ($_SESSION["user"] != null) {
            unset($_SESSION["user"]);
        }
        $this->success(true);
    }

}