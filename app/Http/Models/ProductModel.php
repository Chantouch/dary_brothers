<?php namespace App\Http\Models;

use App\Exceptions\Handler;
class ProductModel {

  public $id = 0;
  public $title = "";
  public $description = "";
  public $image_paths = array();
  public $price = 0;

  public function __construct($id, $title, $description, $image_paths, $price) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->image_paths = $image_paths;
    $this->price = $price;
  }

  public function pro_price() {
    return "Price: $" . money_format('%i' , $this->price);
  }

  public function pro_images() {
    $img_array = array();
    $imagePathsArray = $this->image_paths;
    if (is_array($imagePathsArray) || is_object($imagePathsArray)) {
      foreach ($imagePathsArray as $path) {
        array_push($img_array, "/storage/$path");
      }
    }
    return $img_array;
  }

}
