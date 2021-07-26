<?php

namespace App\Http\Controllers;
use DB;
use App\Models\book;
use App\Models\placedorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;

class orderbookController extends Controller
{
    public function orderbook()
    {
        // Do something here.

        $booklist = book::all();
        return view('orderbook',compact('booklist'));

    }
    public function getbookqtyt(Request $request)
    {
        $books = DB::table("books")
        ->where("title",$request->title)
        ->pluck("bookqty","title");
        return response()->json($books);
    }
    public function orderbookpost(Request $request)
    {
        $placedqty=$request->Input('placebook');
        $bookname=$request->Input('title');
        DB::table('books')->where("title", $bookname)->decrement('bookqty',$placedqty);
        $placedorder = new placedorder;
        $placedorder->ordername=$request->Input('title');
        $placedorder->qty=$request->Input('placebook');
        $placedorder->status='Confirmed';
        $placedorder->save();
        alert()->success('ordered successful');
        return back();
    }
    public function cancelbook()
    {
        $cancellist =DB::table("placedorders")

        ->where('status','Confirmed')->get(); //only those book whose status is Confirmed
        // placedorder::all();
        return view('cancelbook',compact('cancellist'));
    }
    public function cancelbookpost(Request $request)
    {
/**first change the status from confirmation to cancel */
            $placedqty=(int)$request->Input('title'); //fetch orderid from interface

            DB::table("placedorders")
                ->where("id", $placedqty)
                ->update(["status"=>'Cancel']);

/**select the quantity and the name of canceled order */

            $qty=DB::table("placedorders")
            ->where("id", $placedqty)
            ->where('status','Cancel')
            ->value('qty');

            $ordername=DB::table("placedorders")
            ->where("id", $placedqty)
            ->where('status','Cancel')
            ->value('ordername');
            //print_r($qty);

 /**now update book table with the cancel quantitity of cancelorder id */
            DB::table("books")->where("title", $ordername)
            ->increment('bookqty',$qty);

            alert()->success('order Cancel successfully');
            return back();
    }
    public function getbookcancelqty(Request $request)
    {
        $books1 = DB::table("placedorders")
        ->where("id",$request->id)
        ->pluck("qty","id");
        return response()->json($books1);
    }
}


