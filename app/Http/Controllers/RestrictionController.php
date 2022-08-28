<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestrictionController extends Controller
{
    /**
     * Swaping the places of the restricted numbers.
     *
     * @param Request $request
     * @return array $input
     */
    public function swap(Request $request)
    {
        $input = $request->input_array;
        $input_collection = collect($request->input_array);

        $element_eight = $input_collection->where('value', 8)->first();
        $element_one = $input_collection->where('value', 1)->first();

        $temp = $input[0];
        $temp1 = $input[1];

        $input[0] = $element_one;
        $input[1] = $element_eight;

        $input[$element_one['position']] = $temp;
        $input[$element_eight['position']] = $temp1;

        return $input;
    }

    /**
     * Change the position for the given elements in array.
     *
     * @param Request $request
     * @return void
     */
    public function changePosition(Request $request)
    {
        $input_array = $request->array;
        $digit = $request->digit;
        $position = $request->position;

        $is_odd_position = $request->position % 2;

        if(($input_array[1] !== $digit && $input_array[3] !== $digit) && !$is_odd_position){
            $temp = $input_array[1];
            $input_array[1] = $digit;
            $input_array[$position] = $temp;
        }
        
        if(($input_array[3] !== $digit && $input_array[1] !== $digit) && !$is_odd_position){
            $temp = $input_array[3];
            $input_array[3] = $digit;
            $input_array[$position] = $temp;
        }

        return response()->json($input_array);
    }
}
