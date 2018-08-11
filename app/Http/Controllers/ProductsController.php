<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Http\Models\ProductModel;
use App\Http\Models\PaginationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

  public function index() {
     $params = $this->productsToDisplay(1);
     return view('products', $params);
  }

  public function toPage($page) {
    $params = $this->productsToDisplay($page);
    return response()->json(array('nextOrPreviousProducts' => $params['products']), 200);
  }

  private function productsToDisplay($page) {
    $product = new Product();

    $products = $product->getProducts();
    $pagination = new PaginationModel(count($products));

    $productsToDisplay = array();

    $nProductToShowPerPage = $pagination->nProductToShowPerPage;
    $startIndex = ($page - 1) * $nProductToShowPerPage;
    $endIndex = $page * $nProductToShowPerPage;

    for ($i = $startIndex; $i < $endIndex; $i++) {
      array_push($productsToDisplay , $products[$i]);
    }

    $params = ['products' => $productsToDisplay, 'pagination' => $pagination];

    if (Auth::check()) {
      $user = User::where('id', Auth::id())->first();
      $params += ['email' => $user->email];
    }

    return $params;
  }

  public function productDetail($id) {
    $product = new Product();
    $proModel = $product->productDetail($id);
    $params = ['product' => $proModel, 'related' => $product->getRandomProducts($id)];
    if (Auth::check()) {
      $user = User::where('id', Auth::id())->first();
      $params += ['email' => $user->email];
    }
    return view('product_detail', $params);
  }


}
