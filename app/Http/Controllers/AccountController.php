<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('accounts', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_account');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     
        $this->validate($request , [
            'logo'=> 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name'=>"required |string",
            'address'=>"required|string",
            'phonenumber'=>"required|string"

        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
        }

        $user = Auth::user();
        $accounts = new Account([
            'user_id' => $user->id,
            'logo' => $logoPath,
            'name'=>$request->input('name'),
            'address'=> $request->input('address'),
            'phonenumber'=>$request->input('phonenumber'),
            'is_active'=> true,
        ]);

        $accounts->save();

        return  redirect()->route('accounts')->with('success', 'Account  Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        $opportunities = $account->opportunities()->get();
        return view('account_show', compact('account', 'opportunities'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
