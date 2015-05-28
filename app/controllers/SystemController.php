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
                return Response::json(['success' => false]);
            } else{
                return Redirect::back()->withInput()->withErrors($validator);
            }

        } else {
            $result = User::addUser($role , $name , $password , $email);
            if($result)
            {
                return Response::json(['success' => true]);
            }else {
                return Response::json(['success' => false]);
            }
        }
    }

    public function viewUser()
    {
        $userInfo = User::getUserInfo();
        return View::make('system.viewUser',compact('userInfo'));
    }

    public function deleteUser()
    {
        $id = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $user = new User();
        if($user->deleteUser($id))
        {
            return Response::json(['success' => true]);
        }else {
            return Response::json(['success' => false]);
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
            return Response::json(['success' => true]);
        }else {
            return Response::json(['success' => false]);
        }
    }

    public function passOrder()
    {
        $orderId = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $Res = Repertoryapplylist::passOrder($orderId);
        if($Res)
        {
            return Response::json(['success' => true]);
        }else {
            return Response::json(['success' => false]);
        }
    }

    public function rejectOrder()
    {
        $orderId = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $Res = Repertoryapplylist::rejectOrder($orderId);
        if($Res)
        {
            return Response::json(['success' => true]);
        }else {
            return Response::json(['success' => false]);
        }
    }

    public function addShopView()
    {
        return View::make('system.addShopView');
    }

    public function addShop()
    {

        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $owner = htmlspecialchars($_POST['owner'],ENT_QUOTES);
        $desc = htmlspecialchars($_POST['desc'],ENT_QUOTES);

        $input = array(
            'name' => $name,
            'owner' => $owner,
            'desc' => $desc,
        );
        $rules = array (
            'name' => 'required',
            'owner' => 'required',
            'desc' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() )
        {
            if(Request::ajax())
            {
                return Response::json(['success' => false]);
            } else{
                return Redirect::back()->withInput()->withErrors($validator);
            }

        } else {
            $shop = new Shop();
            $result = $shop->addProduct($name , $owner , $desc);
            if($result)
            {
                return Response::json(['success' => true]);
            }else {
                return Response::json(['success' => false]);
            }
        }

    }

    public function viewShop()
    {
        $shop = new Shop();
        $shopInfo = $shop->getShopInfo();
        return View::make('system.viewShop',compact('shopInfo'));
    }

    public function deleteShop()
    {
        $id = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $shop = new Shop();
        if($shop->deleteShop($id))
        {
            return Response::json(['success' => true]);
        }else {
            return Response::json(['success' => false]);
        }
    }

    public function updateShopInfo()
    {
        $shopId = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $shopName = htmlspecialchars($_POST['shopName'],ENT_QUOTES);
        $shopOwner = htmlspecialchars($_POST['shopOwner'],ENT_QUOTES);
        $shopDesc = htmlspecialchars($_POST['shopDesc'],ENT_QUOTES);
        $shop = new Shop();

        $result = $shop->updateShopInfo($shopId , $shopName, $shopOwner, $shopDesc);
        if($result)
        {
            return Response::json(['success' => true]);
        }else {
            return Response::json(['success' => false]);
        }
    }
}