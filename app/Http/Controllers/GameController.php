<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return array $result
     */
    public function checkForFoundNumbers(Request $request)
    {
        $result['found_bulls'] = 0;
        $result['found_cows'] = 0;
        $result['guessed_digits_count'] = 0;
        $result['guessed_digits'] = [];

        foreach($request->input_array as $element){
            $input = $element['value'];

            $found = array_search($input, $request->generated_array);

            if($found !== false){
                $actual_index = $element['position'];
                $found_index = array_search($input, $request->generated_array);
                // $input_record = $request->input_array[$found_index];
                // $record = $request->generated_array[$actual_index];
    
                // If so check the position
                if($found_index == $actual_index){
                    // Increment the number of found bulls
                    $result['found_bulls'] += 1;
                    $result['guessed_digits_count'] += 1;
                    $result['guessed_digits'][] = $input;
                }else{
                    // Increment the number of found cows
                    $result['found_cows'] += 1;
                    $result['guessed_digits_count'] += 1;
                    $result['guessed_digits'][] = $input;
                }
    
            }
        }
        return response()->json($result);
    }
}
