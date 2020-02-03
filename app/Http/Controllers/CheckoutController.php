<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $orders = $type == 'user' ? Order::where('users_id', Auth::user()->id)->paginate(10) : Order::paginate(10);

        return view('checkout.index', [
            'orders' => $orders,
            'products' => Product::all(),
            'type' => $type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);

        return view('checkout.create', [
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'type_identification' => 'required',
            'number_identification' => 'required|numeric|min:5',
            'name' => 'required|string|min:1|max:80',
            'surname' => 'required|string|min:1|max:80',
            'email' => 'required|email|max:120',
            'phone' => 'required|numeric|min:10',
        ]);

        $order = new Order();
        $order->customer_type_identification = $validData['type_identification'];
        $order->customer_number_identification = $validData['number_identification'];
        $order->customer_name = $validData['name'];
        $order->customer_surname = $validData['surname'];
        $order->customer_email = $validData['email'];
        $order->customer_mobile = $validData['phone'];
        $order->status = 'CREATED';
        $order->quantity = $request->get('quantity');
        $order->products_id = $request->get('products_id');
        $order->users_id = Auth::user()->id;
        $order->save();

        $product = Product::findOrFail($order->products_id);
        $product->stock = $product->stock - 1;
        $product->save();

        return redirect('/checkout/'.$order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\
     * Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $product = Product::findOrFail($order->products_id);

        return view('checkout.resume', [
            'order' => $order,
            'product' => $product,
            'user' => Auth::user()
        ]);
    }
}
