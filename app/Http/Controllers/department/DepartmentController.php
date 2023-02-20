<?php

namespace App\Http\Controllers\department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use PDF;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Department access|Department create|Department edit|Department delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Department create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Department edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Department delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        try {
            $department=Department::all();
            return view('department.create',compact('department'));
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
        // print_r($request->all());
        // abort_unless(auth()->user()->can('create_department'),403,'you dont have required authorization to this resource');
//        try {
        $request->validate([
            'dept_name'=>'required|unique:departments',
            'dept_code'=>'required|unique:departments',
//            'description'=>'required'

        ]);
            $department=new Department;
            $department->dept_name=$request->dept_name;
            $department->dept_code =$request->dept_code;

            $department->description=$request->description;
            $department->save();
            return redirect(route('admin.index'))->with('success','Department Created Successfully',array('timeout' => 3000),'error');
//        }catch (Exception $e){
//
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
            $department=Department::find($id);
            return view('department.editform',compact('department'));
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
            $department=Department::find($id);
            $department->dept_name=$request->dept_name;
            $department->dept_code =$request->dept_code;
 
            $department->description=$request->description;
            $department->save();
            return redirect(route('admin.index'))->with('success','Department Update Successfully');
        }catch (Exception $e){
 
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
            Department::destroy($id);
            return redirect(route('admin.index'))->with('success','Department Delete Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
    // pdf generate all pdf
    public function pdf(){
        $department=Department::all();
        $pdf=PDF::loadView('department.pdf',compact('department'));
        return $pdf->download('department.pdf');
   }
   // generate pdf one row
   public function pdfForm(Request $request,$id){
       // $department = Department::find($id);
       // $pdf=PDF::loadView('department.pdf_download',compact('department'));
       //  return $pdf->download('department.pdf');
       // view()->share('department',$department);
       //     //   if($request->has('download')){
       //         $pdf = PDF::loadView('department.pdf_download');
       //         return $pdf->download('pdf_download.pdf');
       // //   }
//         $url = explode('/', url()->current()); // something like [..., '127.0.0.1:8000', 'pengajuan', '3']
// $id = end($url); // result is 3
//         $department = Department::find( $id)->first();

// // Rest is just same
//       $pdf = PDF::loadview('department.pdf_download', ['department' => $department]);
// return $pdf->stream();


//         // return view('department.create')->with('listing', $listing);
//     }
   $department1 = Department::all()->where('id', $id);
   $pdf=PDF::loadView('department.pdf_download',compact('department1'));
   return $pdf->download('department.pdf');
   }

   // search

   public function search(Request $request){
       // Get the search value from the request
      $search = $request->input('search');

      // Search in the title and body columns from the posts table
      $posts = Department::query()
          ->where('dept_name', 'LIKE', "%{$search}%")
          ->orWhere('description', 'LIKE', "%{$search}%")
          ->get();
       

       // Return the search view with the resluts compacted
       return view('department.search', compact('posts'));
   }
}
