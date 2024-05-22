<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Exception;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();

        return view('pages.frontend.index', compact(
            'category',
            'product'
        ));
    }

    public function detailProduct($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $recommendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();

        return view('pages.frontend.detail-product', compact(
            'product',
            'category',
            'recommendation'
        ));
    }

    public function detailCategory($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('product_galleries')->where('category_id', $categories->id)->latest()->get();

        return view('pages.frontend.detail-category', compact(
            'category',
            'categories',
            'product'
        ));
    }

    public function cart()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->latest()->get();
        return view('pages.frontend.cart', compact(
            'category',
            'cart'
        ));
    }

    public function addToCart(Request $request, $id)
    {
        try {
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('cart');
            // return redirect()->route('cart')->with('success', 'berhasil dijalankan');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }

    public function deleteCart($id)
    {
        try {
            Cart::findOrFail($id)->delete();
            return redirect()->route('cart');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back();
        }
    }

    public function checkout(Request $request)
    {
        try {
        //    request data
        $data = $request->all();

        // get data cart user
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        // dd($cart);

        // create transaction
        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'total_price' => $cart->sum('product.price')
        ]);

        // cerate transactionn item
        foreach ($cart as $item) {
            Transaction::create([
                'user_id' => auth()->user()->id,
                'product_id' => $item->product_id,
                'transaction_id' => $transaction->id
            ]);
        }

        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back();
        }
    }
}
