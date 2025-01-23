<?php

namespace App\Livewire;

use App\Models\category;
use App\Models\product;
use App\Models\variation;
use App\Models\variationObtion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use PharIo\Manifest\ExtensionElement;

class Lproduct extends Component
{
    use WithFileUploads;

    public $pageStatus = null;
    public $newProduct = [];
    public $editProduct = [];
    public $search = '';
    public $addImage = null;
    public $editImage = null;
    
    public $variationName = '' ;
    public $variationValue = '';
    public $arrayOfVariations = [] ;

    public $category = [] ;

    public function render()
    {
        $category = category::get();
        $product = product::where('name', 'LIKE', '%' . $this->search . '%')->get();
        $variation = variation::get();
        return view('livewire.product.index', [
            'products' => $product,
            'categories' => $category,
            'variations' => $variation,
        ])
            ->extends('welcome')
            ->section('content');
    }

    public function rules()
    {
        if ($this->pageStatus === 'changeToEditProduct') {
            return [
                'editProduct.name' => 'required',
                'editProduct.description' => 'required',
                'editProduct.unitPrice' => 'required',
                'editProduct.Quantity' => 'required',
                'editImage' => 'required|image', // Optional new image validation
                'editProduct.categoryId' => 'nullable|exists:categories,id',
            ];
        }
        return [
            'newProduct.name' => 'required',
            'newProduct.description' => 'required',
            'newProduct.unitPrice' => 'required',
            'newProduct.Quantity' => 'required',
            'addImage' => 'required|image', // 10 MB
            'newProduct.categoryId' => 'nullable|exists:categories,id',
        ];
    }

    public function backToList(){
        $this->pageStatus = null ; 
        $this->newProduct = [];
        $this->arrayOfVariations = [];
        $this->variationName = '';  
    }

    public function createProduct()
    {
        $validation = $this->validate();
        
        DB::beginTransaction();
        try{

            if($this->addImage != null){
                $path = $this->addImage->store('upload', 'public');
                $imagePath = 'storage/'.$path;
            }

            // if ($this->newProduct['imagePath']->isValid()) {
            //     $path = $this->newProduct['imagePath']->store('upload', 'public');
            //     $validation['newProduct']['imagePath'] = $path;
            // }
    
            $newProduct = product::create([
                ...$validation['newProduct'],
                'imagePath'=>$imagePath
            ]); 
    
            if(isset($this->newProduct['categoryId'])){
                $newProduct->update(['categoryId'=>$this->newProduct['categoryId']]);
            }
            
            if(!empty($this->arrayOfVariations)){
                foreach($this->arrayOfVariations as $variation){
                    variation::create([
                        'name' => $this->variationName,
                        'value' => $variation ,
                        'productId' => $newProduct['id']
                    ]);
                }
            }
                DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            $this->dispath($e);
        }

        $this->pageStatus = null;
        $this->newProduct = [];
        $this->arrayOfVariations = [];
        $this->variationName = '';

    }

    public function goToEditPage($id)
    {
        $this->pageStatus = 'changeToEditProduct';
        $this->editProduct = product::with('variations','category')->find($id)->toArray();
        $this->variationName = DB::table('variations')->where('productId',$id)->pluck('name')->first();
        
        $getVariationByProduct = variation::where('productId','=',$id)->get() ;

        foreach($getVariationByProduct as $item){
            array_push($this->arrayOfVariations , $item->value);
        }
        
    }

    public function updateProduct()
    {
        $validatedData = $this->validate();
        
        
        DB::beginTransaction();
        try {        
            
           if($this->editImage != null){
            $path = $this->editImage->store('upload','public');
            $imagePath = 'storage/' . $path ;
           }
           
            product::find($this->editProduct['id'])->update([
                ...$validatedData['editProduct'],
                'imagePath' => $imagePath
            ]);
            variation::where('productId', $this->editProduct['id'])->delete();
            
            foreach($this->arrayOfVariations as $variation){
                variation::create([
                    'name' => $this->variationName ,
                    'value' => $variation ,
                    'productId' => $this->editProduct['id']
                ]);
            }
            DB::commit();
            
            $this->editProduct = [];
            $this->arrayOfVariations = [];
        }catch (\Exception $e){
            DB::rollback();
            alert($e);
        }
        $this->pageStatus = null;
        $this->editImage = null ;
    }

    public function addNewCategory(){
        
        $validateCategory = $this->validate([
            'category.name' => 'required'
        ]);

        category::create($validateCategory['category']);
        $this->category = [];
    }


    public function fillVariationArray(){
        if(!empty($this->variationValue)){
            array_push($this->arrayOfVariations , $this->variationValue);
        }
        $this->variationValue = '';
    }

    public function deleteFromArrayOfVariations($var){
        unset($this->arrayOfVariations[$var]);
    }

    
    
}
