<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PlanController extends Controller
{
    public function purchase($id, Request $request)
    {
        $user = $request->user();
        $product = Product::find($id);
        $paymentMethod = $request->post('payment_method');

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($product->price * 100, $paymentMethod, ['currency' => 'inr']);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect(route('success'));
    }

    public function success() {
        session()->flash('message', 'Payment complated');
        return view("purchase.success");
    }
}
