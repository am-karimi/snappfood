<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    /**
     * @param Request $request
     * get address from athenticated user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAddresses(Request $request)
    {
//        hard code
//        $user=User::where('email',$request->mail)->first();
//        $addresses=Address::where('addressable_type',User::class)
//            ->where('addressable_id',$user->id)->get();
        $user = Auth::user();
        return response()->json($user->addresses);
    }

    /**
     * @param Request $request
     * add new address for user ** relation user and address table
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAddress(Request $request)
    {
        $user = Auth::user();
        $address=$user->addresses()->create(
            [
                'title'=>$request->title,
                'address'=>$request->address,
//                'point'=>
            ]
        );

        return response()->json(
            [
                'address' => $address,
                'message' => 'address Created Successfully',
            ]
            ,201);
    }

    /**
     * @param int $address_id
     * set current address to user table
     * @return \Illuminate\Http\JsonResponse
     */
    public function setCurrent(int $address_id)
    {
        $user = Auth::user();
        $user->update([
            'address_id' => $address_id
        ]);
        return response()->json(['message' => 'Current Address Change Successfully'],200);
    }
}
