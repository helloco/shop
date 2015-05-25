<?php

class Shop extends Eloquent {


    protected $table = 'shop';


    public static function addProduct($name , $owner, $description)
    {
        if(empty($name) || empty($owner))
        {
            return false;
        }
        $result = DB::table('shop')->insert(
            array('name' => $name , 'owner' => $owner , 'description' => $description )
        );
        return $result ? true : false;
    }

    public function getShopInfo()
    {
        $result = DB::table('shop')->get();
        return $result ? $result : null;
    }

    public function deleteShop($shopId)
    {
        $result = DB::table('shop')->where('id', '=', $shopId)->delete();
        return $result ? true : false;
    }

    public function updateShopInfo($shopId , $shopName, $shopOwner, $shopDesc)
    {
        if(empty($shopId))
        {
            return false;
        }
        $result = DB::table('shop')->where('id','=', $shopId)->update(array('name' =>$shopName , 'owner' => $shopOwner , 'description' => $shopDesc));
        return $result ? true : false;
    }
}
