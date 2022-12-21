<?php
namespace controllers;
class users
{
  private $model;
  public function __construct()
  {
    $this->model=new \models\users()
  } 
   public function log()
   {
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['fname'])&& isset($_POST['lname']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['Confpassword']))
        {
            if(stripslashes (trim($_POST["password"]))==stripslashes(trim($_POST["ConfPassword"]))){
                $password=password_hash(trim($_POST["password"]),PASSWORD_DEFAULT);
                $this->model->Insert([stripcslashes(trim($_POST['fname']),stripslashes(trim($_POST['lname'])),stripcslashes(trim($_POST['pseudo'])),$password)]);
            }
        }
    }
   }
}
?>