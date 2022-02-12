<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Product extends Model
{
    protected $table;

    public function __construct(){

        $this->table = "product";
    }

    protected $fillable = [
        "product_title","product_price","product_description","status"
    ];



    public function get_products()
    {
        $where_condition = "created_merchant=:merchant_id AND status='active' ORDER BY $this->table.created_date DESC";
        $apply_condition["merchant_id"] = Auth::user()->id;

        $query = "SELECT id,product_gid,product_title,product_price,product_description,`status`,DATE_FORMAT(created_date,'%d-%m-%Y %h:%i:%s %p') as created_date FROM $this->table WHERE";

        return DB::select($query." ".$where_condition,$apply_condition);
    }

    public function add_product($product)
    {
        return DB::table($this->table)->insert($product);
    }

    public function edit_product($id)
    {
        $where_condition = "created_merchant=:merchant_id AND status='active' AND id=:id";

        $apply_condition["merchant_id"] = Auth::user()->id;
        $apply_condition["id"] = $id;

        $query = "SELECT id,product_title,product_price,product_description FROM $this->table WHERE";

        return DB::select($query." ".$where_condition,$apply_condition);
    }

    public function update_product($product,$id)
    {
        return DB::table($this->table)->where($id)->update($product);
    }
}
