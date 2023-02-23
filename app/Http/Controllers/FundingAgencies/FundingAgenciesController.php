<?php

namespace App\Http\Controllers\FundingAgencies;

use App\Http\Controllers\Controller;
use App\Models\FundingAgency;
use Exception;
use Illuminate\Http\Request;

class FundingAgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    function __construct()
    {
        $this->middleware('role_or_permission:FundingAgency access|FundingAgency create|FundingAgency edit|FundingAgency delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:FundingAgency create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:FundingAgency edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:FundingAgency delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        try {
            $agency = FundingAgency::paginate(4);
            if (session('success_massage')) {
                alert()->success('SuccessAlert', 'Funding Agency Created Successfully.');
            }
            return view('funding.create', compact('agency'));
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
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
            'agency_name' => 'required|unique:funding_agencies'
        ]);
        $agency = new FundingAgency;
        $agency->agency_name = $request->agency_name;
        $agency->save();
        return redirect(route('admin.funding.index'))->withSuccessMassage('success', 'Funding Agency Created Successfully');
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
     * @return array
     */
    public function edit($id)
    {
        try {
            $agency = FundingAgency::find($id);
            return view('funding.edit', compact('agency'));
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        try {
            $agency = FundingAgency::find($id);
            $agency->agency_name = $request->agency_name;
            $agency->save();
            return redirect(route('admin.funding.index'))->with('success', 'Funding Agency Update Successfully');
        } catch (Exception $e) {
            return [
                "message" => $e->getMessage(),
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
            FundingAgency::destroy($id);
            return redirect(route('admin.funding.index'))->with('success', 'Funding Agency Deleted Successfully');
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
