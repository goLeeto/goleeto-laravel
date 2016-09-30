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
                    $previewPath='themes/'.$data['name'].'/themePreviews';

                    $i=0;
                    foreach ($previews as $preview) {
                        $previewName=$data['name'].$i.'.'.$preview->guessExtension();
                        $preview->move($previewPath,$previewName);
                        $i++;
                    }

                    

                    //Get Theme Archive

                    $archiveName = $data['name'].'.'.$archive->guessExtension();
                    $archive->move($archivePath,$archiveName);

                    // Unzip theme

                    $archivePathName = $archivePath.'/'.$archiveName;
                    $zip = new \ZipArchive;
                    $zip->open($archivePathName);
                    $zip->extractTo($archivePath);
                    $zip->close();
                }else{
                    return 'Please upload archive of you theme and the preview images!';
                }



        }else{
            return $data;
        }

        //No return Insert into database


        //insert product
        $newProduct = App\Product::create([
            'Name'=>$data['name'],
            'price'=>$data['price'],
            'imgPath'=>$previewPath,
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

        return redirect('/myproducts');

    }

    public function getproduct($id){

    	$product = App\Product::find($id);

        $details = $product->details;

        $features = $product->productFeatures;

        $categories =$product->productCategorys;

        $data[] = $product;

        return $data;

    }




}