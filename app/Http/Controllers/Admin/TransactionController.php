<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::with('user')->select('id', 'user_id', 'name', 'slug', 'email', 'phone', 'courier', 'status', 'payment', 'payment_url', 'address', 'total_price')->latest()->get();
        return view('pages.admin.transaction.index', compact(
            'transaction'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get data transaction by  id
        $transaction = Transaction::findOrFail($id);

        try {
            //update status transaction
            $transaction->update([
                'status' => $request->status
                ]);

                return redirect()->route('admin.transaction.index')->with('success', 'Status berhasil diubah');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('admin.transaction.index')->with('error', 'Status gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showTransactionUserByAdminWithSlugAndId($slug, $id)
    {
        $transaction = Transaction::where('slug', $slug)->where('id', $id)->first();
        
        // dd($transaction);

        return view('pages.admin.transaction.show', compact(
            'transaction'
        ));
    }
}
