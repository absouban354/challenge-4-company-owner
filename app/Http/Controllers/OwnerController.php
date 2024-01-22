<?php

namespace App\Http\Controllers;

use App\Services\groupByOwnersService;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function __construct(protected groupByOwnersService $service)
    {
        
    }

    public function index(Request $request){
       
        $inputString = $request->getContent();
        if(is_array($inputString)){
        
            $result = $this->service->groupByOwners($inputString);
        
        }else{ //when the variable is a string
        
            $jsonString = str_replace(['=>', '][', ']', '['], [':', ',', '}', '{'], $inputString);
            $result = $this->service->groupByOwners(json_decode($jsonString,true));
        
        }
        return response()->json($result);
    }
}
