<?php

namespace App\Http\Controllers;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $user = Auth::user(); 
        $accounts = $user->accounts;
        $opportunities = $user->opportunities()->get();
        $opportunities = Opportunity::with('account')->get();
        return view('opportunities', compact('user','accounts','opportunities'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $accounts = $user->accounts;

        return view('create_opportunity' , compact('user','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
           
            'name'=>"required |string",
            'type'=>'required | string',
            'description'=>'required | string',
            'amount'=>'required | string',
            'stage'=>'required | string'
        ]);

        $selectedAccountId = $request->input('account');
       


        $user = Auth::user();
        $opportunity = new Opportunity([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'description'=> $request->input('description'),
            'amount'=>$request->input('amount'),
            'stage'=>$request->input('stage'),
            'account_id' => $selectedAccountId,
        ]);

        

        $user->opportunities()->save($opportunity);

        return  redirect()->route('opportunities')->with('success', 'Opportunity Created Successfully');
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
        $user = Auth::user();
        $accounts = $user->accounts;
        $opportunity = Opportunity::findorFail($id);
        return view('edit_opportunities', compact('opportunity','user','accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'name'=>'required',
            'type'=>'required',
            'description'=>'required',
            'amount'=>'required',
            'stage'=>'required',
        ]);

        $opportunity = Opportunity::findOrFail($id);
        $opportunity -> name = $request->name;
        $opportunity -> type = $request ->type;
        $opportunity -> description = $request ->description;
        $opportunity -> amount = $request ->amount;
        $opportunity -> stage = $request -> stage;

        $res = $opportunity->save();

        return redirect()->route('opportunities')->with('Opportunity updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Opportunity $opportunity)
    {
      $opportunity->delete();

     return redirect()->back()->with('status', 'Opportunity deleted successfully');
    }

}
