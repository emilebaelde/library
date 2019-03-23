<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rental;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function searchBooks()
    {

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

    public function rent($id)
    {
        $test = Stock::findOrFail($id);

            //stock part
            $test['available'] = 0;

            //rental part
            $rental = [
                'user_id' => Auth::id(),
                'stock_id' => "test",
                'rental_start' => date("Y-m-d"),
                'rental_end' => date("Y-m-d", strtotime("+2 week")),
                'rental_back' => Null,
            ];

            Rental::create($rental);
            $test->update();

            return redirect('/rentals');
    }
    public function bookDetail($id)
    {
        $stock=Stock::findOrFail($id);
        return view('book',compact('stock'));
    }
}
