<?php
class ShopController extends AdminController {
    public function __construct()
    {
        parent::__construct();
        self::authRole();
    }

    private function authRole()
    {
        if(Session::get('user.role') != self::ROLE_SHOP)
        {
            die("sorry ,permission deny");
            return Redirect::to('login');
        }
    }

    public function index()
    {
        return View::make('shop.index');
    }

    public function addApply()
    {
        $repertoryApply = new Repertoryapplylist();
        $res = $repertoryApply->addApplyInfo();
        if($res)
        {
            return View::make('shop.pubSuccess');
        }
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

    public function viewOrder()
    {
        $orderLists = Repertoryapplylist::viewOrderInfo();
        return View::make('shop.viewOrder',compact('orderLists'));
    }

    public function viewProduct()
    {
        $products = Productdetail::viewProduct();
        return View::make('shop.viewProduct',compact('products'));
    }
}