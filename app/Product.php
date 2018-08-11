<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamp = false;

    public function getProducts() {
  		$products = array();
  		$pros = Product::all();
  		$image = new Image();
  		foreach($pros as $p) {
  			$img_array = $image->getImages($p->images);
  			$proModel = new \App\Http\Models\ProductModel($p->id, $p->en_name, "", $img_array, $p->price);
  			array_push($products, $proModel);
  		}
  		return $products;
  	}

    public function paginationProduct($count) {
      $pros = Product::paginate($count);
    }

    public function findProduct($id) {
      $pro = Product::where('id', $id)->first();
      $img_array = (new Image())->getImages($pro->images);
      $proModel = new \App\Http\Models\ProductModel($pro->id, $pro->en_name, $pro->en_description, $img_array, $pro->price);
      return $proModel;
    }

    public function productDetail($id) {
    	$pro = Product::where('id', $id)->first();
    	$img_array = ((new Image())->getImages($pro->images));
    	$proModel = new \App\Http\Models\ProductModel($pro->id, $pro->en_name, $pro->en_description, $img_array, $pro->price);
    	return $proModel;
  	}

  	public function getRandomProducts($id) {
  		$products = array();
  		$randProducts = Product::all()->random(5);
  		$image = new Image();
  		foreach($randProducts as $rP) {
  			if ($rP->id == $id) {
  				continue;
  			}
  			$img_array = $image->getImages($rP->images);
  			$proModel = new \App\Http\Models\ProductModel($rP->id, $rP->en_name, "", $img_array, $rP->price);
  			array_push($products, $proModel);
  		}
  		if (count($products) == 5) {
  			return array_splice($products, 4);
  		}
  		return $products;
  	}

}
