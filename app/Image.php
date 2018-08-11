<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamp = false;

    public function getImages($imgStr) {
    	$images = Image::find($this->getImageArray($imgStr));
  		$img_array = array();
  		foreach ($images as $img) {
  			array_push($img_array, $img->resource);
  		}
  		return $img_array;
    }

    private function getImageArray($imgStr) {
  		return explode(',', $imgStr);
  	}

}
