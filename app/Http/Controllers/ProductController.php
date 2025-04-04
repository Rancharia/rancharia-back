<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
class ProductController extends Controller
{  
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }   

    public function create(Request $request){
       return $this->productRepository->create($request);

    }

    public function update(Request $request, $id){
        return $this->productRepository->update($request, $id);
    }
    
    public function show($id){
        return $this->productRepository->show($id);
    }   

    public function index(){
        return $this->productRepository->index();
    }
    
    
}
