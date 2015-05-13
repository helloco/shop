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

}
