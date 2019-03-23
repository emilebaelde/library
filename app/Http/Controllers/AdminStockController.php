<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rental;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class AdminStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks= Stock::paginate(10);

        //admin/users/index.blade.php
        return view('admin.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::pluck('title', 'id')->all();
        return view('admin.stock.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $i=$request->only('quantity');
        $i = (int)$i['quantity'];
        while($i!=0){
            $input = $request->only('book_id');
            $input['barcode']='123456789';
            Stock::create($input);
            $i--;
        }

        return redirect('/admin/stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $test=Stock::findOrFail($id);

        if ($test['available']==1){
            //stock part
            $test['available']=0;

            //rental part
            $rental=[
                'user_id'=>Auth::id(),
                'stock_id'=>$id,
                'rental_start'=>date("Y-m-d"),
                'rental_end'=>date("Y-m-d",strtotime("+2 week")),
                'rental_back'=>Null,
            ];

            Rental::create($rental);
            $test ->update();
        }else{
            $rental=Rental::where("stock_id","$id")->first(); //get() werkt hier niet?
            $test['available']=1;

            $rental['rental_back']=date("Y-m-d");

            $rental->update();
            $test ->update();

        }

        return redirect('admin/stock');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock=Stock::findOrFail($id);
        $stock->delete();
        Session::flash('deleted_user', 'The user is deleted');
        return redirect('/admin/stock');
    }
}
