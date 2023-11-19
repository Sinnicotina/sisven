<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=DB::table('customers')
        ->join('categories', 'customers.id', '=', 'categories.id')
        ->select('customers.*', "categories.name")
        ->get();
        return json_encode(['customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$validate = Validator::make ($request->all(), [
            'first_name'=>['required', 'max:30', 'unique'],
            'id'=>['required','numeric','min:1']
        ]);

        if($validate->fails()){
            return response()->json([
                'msg'=>'se produjo un error en la validación de la información.',
                'statusCode'=>400
            ]);
        }*/

        $customer=new Customer();
        $customer->first_name=$request->first_name;
        $customer->id=$request->id;
        $customer->save();
        return json_encode(['customer'=>$customer]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        /*if(is_null($customer)){
            return abort(404);
        }*/
        $categories=DB::table('categories')
        ->orderBy('name')
        ->get();
        return json_encode(['customer'=>$customer, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        /*$validate = Validator::make($request->all(), [
            'first_name'=>['required', 'max:30', 'unique'],
            'id'=>['required','numeric','min:1']
        ]);

        if($validate->fails()){
            return response()->json([
                'msg'=>'se produjo un error en la validación de la información.',
                'statusCode'=>400
            ]);
        }*/
                    $customer=Customer::find($id);
        /*if(is_null($customer)){
            return abort(404);
        }*/
        $customer->first_name=$request->first_name;
        $customer->id=$request->id;
        $customer->save();
        return json_encode(['customer'=>$customer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer= Customer::find($id);
        /*if(is_null($customer)){
            return abort(404);
        }*/
        $customer->delete();
        $customers=DB::table('customers')
        ->join('categories', 'customers.id', '=', 'categories.id')
        ->select('customers.*', "categories.name")
        ->get();
        return json_encode(['customers'=>$customers, 'success'=>true]);
    }
}
