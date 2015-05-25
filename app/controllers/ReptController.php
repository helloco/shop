<?php
class ReptController extends AdminController {
    public function __construct()
    {
        parent::__construct();
        self::authRole();
    }

    private function authRole()
    {
        if(Session::get('user.role') != self::ROLE_REPERTORY)
        {
            die("sorry ,permission deny");
            return Redirect::to('login');
        }
    }
    public function index()
    {
        return View::make('rept.index');
    }

    public function addProduct()
    {
        $id = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $maker = htmlspecialchars($_POST['maker'],ENT_QUOTES);
        $input = array(
            'id' => $id,
            'name' => $name,
        );
        $rules = array (
            'id' => 'required|alpha_dash',
            'name' => 'required',
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
            $result = Productdetail::addProduct($id , $name , $maker , $addTime = time());
            //$result = $pro_det->addProduct($id , $name , $maker , $addTime = time());
            if($result)
            {
                return Response::json(['success' => true, 'errors' => $validator->getMessageBag()->toArray()]);
            }else {
                return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
            }
        }
    }

    public function viewProduct()
    {
        $products = DB::table('product_detail')->paginate(1000);
        return View::make('rept.viewProduct',compact('products'));
    }

    public function addApplyView()
    {
        return View::make('rept.addApply');
    }

    public function addApply()
    {
        if($_POST)
        {
            $input = Input::all();
            $num = 1;
            $dataDetail = array();
            (int)$order_id = DB::table('repertory_apply_detail')->max('order_id');
            ++$order_id;
            while(!empty($input["id".$num]))
            {
                $productId = $input["id".$num];
                $proNum = $input["num".$num];
                $price =  $input["price" . $num];

                $dataItem = array(
                    'product_id' => $productId,
                    'num' => $proNum,
                    'price' => $price,
                );

                $rules = array (
                    'product_id' => 'required|numeric',
                    'num' => 'required|integer|min:1',
                    'price' => 'required|numeric',
                );
                $validator = Validator::make($dataItem, $rules);
                if($validator->fails()) {
                    echo "please fill blanks in right rules";  ////####
                    die($validator);
                }
                $dataDetail[] = array(
                   'order_id' => $order_id, 'product_id' => $input["id" . $num], 'num' => $input["num" . $num], 'price' => $input["price" . $num]
                );
                $num++;
            }
            $result = DB::table('repertory_apply_detail')->insert($dataDetail);

            $orderList = array(
                'order_id' => $order_id, 'proposer' => Session::get('user.name'), 'status' => self::$apply_status['applying'], 'apply_time' => time()
            );
            DB::table('repertory_apply_list')->insert($orderList);

        } else {
            die("please come with right enterence");
        }
    }

    public function viewOrder()
    {
        $orderLists = Repertoryapplylist::getApplyList();
        return View::make('rept.viewOrder',compact('orderLists'));
    }
}