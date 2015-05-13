<?php
class SystemController extends AdminController {

    public function __construct ()
    {
        parent::__construct();

        $this->authRole();
    }
    private  function authRole()
    {
        if(Session::get('user.role') != self::ROLE_SYSTEM)
        {
           //echo "<br>---role !=1 ----<br>";
            die("sorry ,permission deny");
           return Redirect::to('login');
        }
    }

    public function index()
    {
       return View::make('system.index');
    }

    public function addUser()
    {
        $role = htmlspecialchars($_POST['role'],ENT_QUOTES);
        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'],ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $input = array(
            'role' => $role,
            'name' => $name,
            'password' => $password,
            'email' => $email,
        );
        $rules = array (
            'role' => 'required|in:1,2,3',
            'name' => 'required|min:8|alpha_dash',
            'password' => 'required|min:8',
            'email' => 'email'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() )
        {
            if(Request::ajax())
            {
                return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
            } else{
                return Redirect::back()->withInput()->withErrors($validator);
            }

        } else {
            $result = User::addUser($role , $name , $password , $email);
            if($result)
            {
                return Response::json(['success' => true, 'errors' => $validator->getMessageBag()->toArray()]);
            }else {
                return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
            }
        }
    }

    public function viewOrder()
    {
        $orderLists = Repertoryapplylist::getApplyList();
        return View::make('system.viewOrder',compact('orderLists'));
    }

    public function deleteOrder()
    {
        $orderId = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $deleteRes = Repertoryapplylist::deleteOrder($orderId);
        if($deleteRes)
        {
            return Response::json(['success' => true, 'errors' => '删除成功']);
        }else {
            return Response::json(['success' => false, 'errors' => '删除失败']);
        }
    }

    public function passOrder()
    {
        $orderId = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $Res = Repertoryapplylist::passOrder($orderId);
        if($Res)
        {
            return Response::json(['success' => true, 'errors' => '删除成功']);
        }else {
            return Response::json(['success' => false, 'errors' => '删除失败']);
        }
    }

    public function rejectOrder()
    {
        $orderId = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $Res = Repertoryapplylist::rejectOrder($orderId);
        if($Res)
        {
            return Response::json(['success' => true, 'errors' => '删除成功']);
        }else {
            return Response::json(['success' => false, 'errors' => '删除失败']);
        }
    }
}