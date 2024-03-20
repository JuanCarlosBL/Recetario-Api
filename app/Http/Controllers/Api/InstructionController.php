<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instruction;
class InstructionController extends Controller
{ 
    
    
  
    public function list()
    {
        $instructions = Instruction::all();
        $List =[];

        foreach($instructions as $instruction){

            $objetc = [
                "id"=> $instruction->id,
                "author"=> $instruction->author,
                "description"=> $instruction->description,
                "recipe_id"=> $instruction->recipe_id,
                "created_at"=> $instruction->created_at,
                "updated_at"=> $instruction->updated_at,
            ];

            array_push($List,$objetc);


    }

    return response() ->json($List);

    }

    public function category($id)
    {
        $instructions = Instruction::where('id', '=', $id )->frist();
        $List =[];

        
            $objet = [
                "id"=> $instructions->id,
                "author"=> $instructions->category,
                "description"=> $instructions->description,
                "recipe_id"=> $instructions->recipe_id,
                "created_at"=> $instructions->created_at,
                "updated_at"=> $instructions->updated_at,
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
*/

}
