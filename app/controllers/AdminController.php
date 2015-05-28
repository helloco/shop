<?php

class AdminController extends BaseController {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function __construct()
    {

        if(!(Session::get('user.name') && Session::get('user.role'))){
            die("please login in, thanks.");
            //return Redirect::to('/');
            exit;
        }
    }
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }


    public function orderDetail()
    {
        $order_id = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $order_detail = Repertoryapplydetail::getOrderDetail($order_id);
        return Response::json($order_detail);
        //echo json_encode($order_detail,true);
    }

}
