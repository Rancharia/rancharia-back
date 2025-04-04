<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function create($request){
        $product = $this->model->create($request->all());
        return response()->json($product, 200);
    }

    public function update($request, $id){
        $product = $this->model->find($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function show($id){
        $product = $this->model->find($id);
        return response()->json($product, 200);
    }        
    public function index(){
        $products = $this->model->all();
        return response()->json($products, 200);
    }
}
