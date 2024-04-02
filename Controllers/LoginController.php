<?php

require_once "Models\LoginModel.php";


Class LoginController{
  

    public function Login($username,$MotDePasse)
    {
        $model=new LoginModel();
        $r=$model-> Login($username,$MotDePasse);
        return $r;
    }
    public function  getUserId($username){
        $model= new LoginModel();
        $r=$model-> getUserId($username);
        return $r;
    }
    public function ifAdmin($username,$MotDePasse)
    {
        $model=new LoginModel();
        $r=$model->ifAdmin($username,$MotDePasse);
        return $r;
    }
    public function Logout(){
        session_destroy();
        echo"<script type='text/javascript'>location.href = '/home';</script>";
    }
}