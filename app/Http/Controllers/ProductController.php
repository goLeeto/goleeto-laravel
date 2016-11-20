<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
        public function addproduct(Request $request){
        $data = $request->only('name','price','categories','features','description');
        

        //To do unique theme name 
        if (($data['name']!=''||$data['name']!=null)&&
            ($data['price']!=''||$data['price']!=null)&&
            ($data['categories']!=''||$data['categories']!=null)&&
            ($data['features']!=''||$data['features']!=null)&&
            ($data['description']!=''||$data['description']!=null)){
                $previews=$request->file('preview');
                $archive=$request->file('archive');
                $archivePath = 'themes/'.$data['name'];
                
                if ($previews!=null && $archive!=null) {
                    //Get Theme Preview

                    //To Do convert image to jpg, Resize image to a specific resolution
                    $previewPath='themes/'.uniqid().'/themePreviews';
                    $previewPathName = 'themes/'.$data['name'].'/themePreviews';
                    
                    foreach ($previews as $preview) {
                        $previewName=$data['name'].uniqid().'.'.$preview->guessExtension();
                        $preview->move($previewPathName,$previewName);
                        $previewImgPaths[] = $previewPathName.'/'.$previewName;
                        
                    }

                    

                    //Get Theme Archive

                    $archiveName = $data['name'].'.'.$archive->guessExtension();
                    $archive->move('../storage/'.$archivePath,$archiveName);

                    // Unzip theme
                    $pathA = $archivePath.'/'.$archive->getClientOriginalName();

                    $pathA = str_replace('.zip','', $pathA);

                    $archivePathName = '../storage/'.$archivePath.'/'.$archiveName;
                    $zip = new \ZipArchive;
                    $zip->open($archivePathName);
                    $zip->extractTo($archivePath);
                    $zip->close();
                }else{
                    return 'Please upload archive of you theme and the preview images!';
                }



        }else{
            return "You must choose a category";
        }

        //No return Insert into database


        //insert product
        $newProduct = App\Product::create([
            'Name'=>$data['name'],
            'price'=>$data['price'],
            'themePath'=>$pathA,
            'userId'=>Auth::user()->id
        ]);


        $newProductDetails = App\ProductDetail::create([
            'id'=>$newProduct->id,
            'Description'=>$data['description'],
            'Rating'=>0,
            'ratingNo'=>0,
            'path'=>$archivePath
        ]);



        foreach ($data['categories'] as $category) {
            \DB::table('productCategorys')->insert([
                'product_id'=>$newProduct->id,
                'category_id'=>$category
            ]);
        }


        foreach ($data['features'] as $feature) {
            \DB::table('productFeatures')->insert([
                'product_id'=>$newProduct->id,
                'feature_id'=>$feature
            ]);
        }

        foreach ($previewImgPaths as $images) {
            \DB::table('productImages')->insert([
                'productId'=> $newProduct->id,
                'path'=>$images
            ]);
        }

        return redirect('/seller/myproducts');

    }

    public function getproduct($id){

    	$product = App\Product::find($id);

        $details = $product->details;

        $features = $product->productFeatures;

        $categories = $product->productCategorys;

        $images = $product->images;

        $data[] = $product;

        $features= App\Feature::all();

        $categories = App\Category::all();

        $images = $product->images;

        return view('dashboard.editproduct')->with([
            'dashboardClass'=>'Edit Product',
            'product'=>$product,
            'features'=>$features,
            'categories'=>$categories
        ]);

    }


    public function editproduct(Request $request){
        
        $data = $request->only('id','name','price','description','categories','features','photos','preview');

        $id = $data['id'];

        $product = App\Product::find($id);

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->save();

        $product->details->description = $data['description'];
        $product->details->save();


        $q = 'DELETE FROM productCategorys WHERE product_id = ?';
        \DB::delete($q,$data['categories']);

        foreach ($data['categories'] as $category) {
            \DB::table('productCategorys')->insert([
                'product_id'=>$id,
                'category_id'=>$category
            ]);
        }

        $q = 'DELETE FROM productFeatures WHERE product_id = ?';
        \DB::delete($q,$data['features']);
    
        foreach ($data['features'] as $features) {
            \DB::table('productFeatures')->insert([
                'product_id'=>$id,
                'feature_id'=>$features
            ]);
        }

        $previews=$request->file('preview');

        if ($previews!=null) {
            $previewPath='themes/'.$data['name'].'/themePreviews';

                foreach ($previews as $preview) {
                    $previewName=$data['name'].uniqid().'.'.$preview->guessExtension();
                    $preview->move($previewPath,$previewName);
                    $previewImgPaths[] = $previewPath.'/'.$previewName;
                    
                }
    
                foreach ($previewImgPaths as $images) {
                    \DB::table('productImages')->insert([
                        'productId'=> $id,
                        'path'=>$images
                    ]);
                }
        }

        if ($data['photos']!=null) {
            foreach ($data['photos'] as $photo) {
            $img = App\ProductImage::find($photo);

            unlink($img->path);
            $img->delete();

            }
        }

        return redirect()->back();

    }

    public function discount(Request $request){

        $data = $request->only('themeid','price','valid');

        $discount = App\Discount::where('product_id',$data['themeid'])->where('user_id',Auth::user()->id)->first();

        if ($discount) {
            $discount->value = $data['price'];
            $discount->validUntil = $data['valid'];
            $discount->save();

            return $discount;
        }else{
            $discount = App\Discount::create([
                'product_id' => $data['themeid'],
                'user_id' => Auth::user()->id,
                'value' => $data['price'],
                'validUntil' => $data['valid']
            ]);    

        }  

        return redirect()->back();  
    }




}
