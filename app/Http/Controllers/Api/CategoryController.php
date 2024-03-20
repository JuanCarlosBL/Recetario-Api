<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  
      public function list()
    {
        $categories = Category::all();
        $List =[];

        foreach($categories as $category){

            $objetc = [
                "id"=> $category->id,
                "category"=> $category->category,
                "description"=> $category->description,
                "created_at"=> $category->created_at,
                "updated_at"=> $category->updated_at,
            ];

            array_push($List,$objetc);


    }

    return response() ->json($List);

    }

    public function category($id)
    {
        $categories = Category::where('id', '=', $id )->frist();
        $List =[];

        
            $objet = [
                "id"=> $categories->id,
                "category"=> $categories->category,
                "description"=> $categories->description,
                "created_at"=> $categories->created_at,
                "updated_at"=> $categories->updated_at,
            ];
    

    return response() ->json($objet);

}


   /*public Function create (Request $request)
   {
      $data = $request->validate([
        'category'=> 'required|min:10',
        'description' => 'required|max:255'
      ]); 
      
      $person=Person::created([
        "category"=> $data['category'],
        "description"=> $data['description']
       
      ]);
      
      Person(
        name =string =Luis
        name =int =Luis
      ),

    }
*/
    public function update(Request $request){
      $data = request->validate([
        'id'=> 'required|integer|min:1',
        'name'=> 'required|min:3',
        'moto'=> 'required',



      ]);

      $brand = Brand::where('id', '=', $data['id'])->first();

      if($brand){
        
       


        $object = [
        "response" => 'Success. Item updated correctly.',
        "data" => $brand,
        ""
        ];
        return response()->json($object);
      } 
      
    else {

        $object = [
          "response" => 'Error: please comeback later.',
       
          ];
          return response()->json($object);
          
      } else {

        $object = [
          "response" => 'Error: Element not fount.',
       
          ];
          return response()->json($object);
              }

    }

     

}
