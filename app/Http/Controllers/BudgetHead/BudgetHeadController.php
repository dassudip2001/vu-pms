<?php

namespace App\Http\Controllers\BudgetHead;

use App\Http\Controllers\Controller;
use App\Models\BudgetHead;
use Exception;
use Illuminate\Http\Request;

class BudgetHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Budget access|Budget create|Budget edit|Budget delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Budget create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Budget edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Budget delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        try {
            $budget=BudgetHead::all();
            return view('budget.create',compact('budget'));
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //        try {
            $request->validate([
                'budget_title'=>'required|unique:budget_heads',
                'budget_type'=>'required',
//            'description'=>'required'

            ]);
            $budget=new BudgetHead;
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('admin.budget.index'))->with('success','Budget Created Successfully');
//        }catch (Exception $e)
//        {
//            return ["message" => $e->getMessage(),
//                "status" => $e->getCode()
//            ];
//        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $budget=BudgetHead::find($id);
            return view('budget.edit',compact('budget'));
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $budget=BudgetHead::find($id);
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('admin.budget.index'))->with('success','Budget Update Successfully');

        } catch (Exception $e)
        {
            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            BudgetHead::destroy($id);
            return redirect(route('admin.budget.index'))->with('success','Budget delete Successfully');
        }catch (Exception $e)
        {
            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
