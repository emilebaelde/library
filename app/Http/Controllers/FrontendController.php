<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Stock;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
        $stocks = Stock::leftJoin('books', 'books.id', '=', 'stocks.book_id')
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->select('stocks.*', 'authors.name', 'books.title', 'books.isbn', 'books.year', 'books.edition', 'books.description', 'books.photo_id')
            ->where('stocks.available', "=", 1)
            ->where('books.title', 'like', '%' . $search . '%')->orWhere('authors.name', 'like', '%' . $search . '%')->orWhere('books.isbn', 'like', '%' . $search . '%')->orWhere('books.description', 'like', '%' . $search . '%')
            ->orderBy('id')
            ->paginate(20);
        return view('welcome', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $user_rentals = Rental::where('user_id', '=', $user_id)->where('rental_back', '=', null)->count();
        if ($user_rentals < 7) {
            $test = Stock::findOrFail($id);

            if ($test['available'] == 1) {
                //stock part
                $test['available'] = 0;

                //rental part
                $rental = [
                    'user_id' => Auth::id(),
                    'stock_id' => $id,
                    'rental_start' => date("Y-m-d"),
                    'rental_end' => date("Y-m-d", strtotime("+2 week")),
                    'rental_back' => Null,
                ];

                Rental::create($rental);
                $test->update();
            } else {
                echo "you already reached the max number of rentals";
            }
        }


        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myRentals()
    {
        $user = Auth::id();
        $rentals = Rental::where('user_id', '=', $user)->where('rental_back', '=', null)->paginate(7);

        return view('rentals', compact('rentals', 'user'));
    }

    public function history()
    {
        $user = Auth::id();

        $rentals = Rental::where('user_id', '=', $user)->where('rental_back', '!=', null)->paginate(7);

        return view('history', compact('rentals', 'user'));
    }

    public function returnBook($id)
    {
        $stock = Stock::findOrFail($id);
        $rental = Rental::where("stock_id", "$id")->where("rental_back", null)->first(); //get() werkt hier niet?
        $stock['available'] = 1;

        $rental['rental_back'] = date("Y-m-d");

        $rental->update();
        $stock->update();
        return redirect()->back();
    }

    public function downloadPDF()
    {
        $user = Auth::id();
        $rentals = Rental::where('user_id', '=', $user)->where('rental_back', '=', null)->paginate(7);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf', compact('rentals', 'user'));
        return $pdf->download('invoice.pdf');
    }
}
