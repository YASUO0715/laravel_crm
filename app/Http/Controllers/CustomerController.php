<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        // Itemsティレクトリーの中のindexページを指定し、itemsの連想配列を代入
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // インスタンスの作成
        $customer = new Customer;
        // 値の用意
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;


        $customer->save();
        // 登録したらindexに戻る
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        // Itemsティレクトリーの中のindexページを指定し、itemsの連想配列を代入
        return view('customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::find($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = customer::find($id);

        // 値の用意
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;

        // 保存
        $customer->save();

        // 登録したらindexに戻る
        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();

        return redirect('/customers');
    }

    public function write1(Request $moji)
    {
        $data1 = $moji->name;

        $method = 'GET';
        $url = config('zipcode.url') . '/api/search?zipcode=' . $data1;
        $options = [];

        $client = new Client();

        try {
            $response = $client->request($method, $url, $options);
            $body = $response->getBody();
            $customers = json_decode($body, false);
            // dd($customers);

            $zipcode = $customers->results[0]->zipcode;
            $address1 = $customers->results[0]->address1;
            $address2 = $customers->results[0]->address2;
            $address3 = $customers->results[0]->address3;
            
            $data = [
                'zipcode' => $zipcode,
                'address1' => $address1,
                'address2' => $address2,
                'address3' => $address3,
            ];

            // return view('/customers.address', $data);

        } catch (\Throwable $th) {
            $customers = null;
            $data = [
                'zipcode' => null,
                'address1' => null,
                'address2' => null,
                'address3' => null,

            ];
        }
        // return view('/customers.address', $data, $address1, $address2, $address3);
        // return view('/customers.address', $data);
        return view('/customers.address', $data);
    }
}
