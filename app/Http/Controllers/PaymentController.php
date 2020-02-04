<?php

namespace App\Http\Controllers;

use App\Order;

use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dnetix\Redirection\PlacetoPay;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $order = Order::findOrFail($id);
        $user = Auth::user();
        $message = null;

        if($order->placetopay_request_id and $order->placetopay_process_url){
            if($order->status == 'CREATED'){
                $placetopay = new PlacetoPay([
                    'login' => env('PLACETOPAY_API_SERVICE_LOGIN'),
                    'tranKey' => env('PLACETOPAY_API_SERVICE_TRANKEY'),
                    'url' => env('PLACETOPAY_API_SERVICE_URL_BASE'),
                ]);

                $response = $placetopay->query($order->placetopay_request_id);

                if ($response->isSuccessful()) {
                    $order->status = $response->status()->status();
                    $order->save();
                } else {
                    $message = $response->status()->message();
                }
            }
        }

        return view('payment.status', [
            'order' => $order,
            'user' => $user,
            'message' => $message,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\
     * Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('payment.show', [
            'order' => $order,
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = Order::findOrFail($request->get('orders_id'));
        $product = Product::findOrFail($order->products_id);

        if($order->placetopay_request_id and $order->placetopay_process_url and $order->status == 'CREATED'){
            return new RedirectResponse($order->placetopay_process_url);
        }

        $placetopay = new PlacetoPay([
            'login' => env('PLACETOPAY_API_SERVICE_LOGIN'),
            'tranKey' => env('PLACETOPAY_API_SERVICE_TRANKEY'),
            'url' => env('PLACETOPAY_API_SERVICE_URL_BASE'),
        ]);

        $request = [
            'locale' => "en_CO",
            'buyer' => [
                'name' => $order->customer_name,
                'surname' => $order->customer_surname,
                'email' => $order->customer_email,
                'document' => $order->customer_number_identification,
                'documentType' => $order->customer_type_identification,
                'mobile' => $order->customer_mobile
            ],
            'payment' => [
                'reference' => $order->id,
                'description' => $product->name,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $product->price,
                    ],
                ],
            'expiration' => date('c', strtotime('+1 hours')),
            'returnUrl' => env('APP_URL') .  '/payment/status/' . $order->id,
            'ipAddress' => $request->server('SERVER_ADDR'),
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
            ];

        $response = $placetopay->request($request);

        if ($response->isSuccessful()) {
            $order->placetopay_request_id = $response->requestId();
            $order->placetopay_process_url = $response->processUrl();
            $order->save();

            return new RedirectResponse($order->placetopay_process_url);
        } else {
            return view('payment.status', [
                'order' => $order,
                'user' => Auth::user(),
                'message' => $response->status()->message()
            ]);
        }
    }
}
