<?php

namespace App\Http\Controllers\createUser;

use App\Http\Controllers\Controller;
use App\Models\CreateUser;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use Exception;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        try {
            $createUser = CreateUser::paginate(4);
            if (session('success_massage')) {
                alert()->success('SuccessAlert', 'Budget Created Successfully.');
            }
            //        $faculty=Faculty::all();
            $data = Department::all();
            return view('user.create', compact('data', 'createUser',));
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
        // abort_unless(auth()->user()->can('create_user'),403,'you dont have required authorization to this resource');
        //        try {
        //               dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'fac_code' => 'required|unique:faculties|max:50',
            'fac_title' => 'required',
            'fac_join' => 'required',
            'fac_retirement' => 'required',
            'fac_designtion' => 'required',
            'fac_phone' => 'required',
            'fac_status' => 'required',
            'fac_description' => 'required',
        ]);
        $fields = $request->only([
            'name', 'email', 'password', 'fac_code', 'fac_title', 'fac_join', 'fac_retirement',
            'fac_designtion', 'fac_phone', 'fac_status', 'fac_description',
            'department_id',
        ]);
        $user = new User([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);
        $user->save();
        $faculty = new Faculty([
            'fac_code' => $fields['fac_code'],
            'fac_title' => $fields['fac_title'],
            'fac_designtion' => $fields['fac_designtion'],
            'fac_join' => $fields['fac_join'],
            'fac_retirement' => $fields['fac_retirement'],
            'fac_phone' => $fields['fac_phone'],
            'fac_status' => $fields['fac_status'],
            'fac_description' => $fields['fac_description'],
        ]);
        $faculty->save();
        $pivot = new CreateUser();
        $pivot->user_id = $user->id;
        $pivot->faculty_id = $faculty->id;
        $pivot->department_id = $fields['department_id'];
        $pivot->save();
        return redirect(route('admin.usercreate.index'))->withSuccessMassage('success', 'User Created Successfully');
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
        // if (Auth::user()->id == '1' || auth()->user()->id == $id + 1) {
            $createUser = CreateUser::with(
                [
                    'user' => function ($q) {
                        $q->select(['id', 'name', 'email',]);
                    },
                    'faculty' => function ($q) {
                        $q->select([
                            'id', 'fac_code', 'fac_title', 'fac_designtion',
                            'fac_join', 'fac_retirement', 'fac_phone', 'fac_status', 'fac_description'
                        ]);
                    },
                    'department' => function ($q) {
                        $q->select(['id',  'dept_code']);
                    }
                ]
            )->find($id);
            return view('user.edit', compact('createUser'));
        // } else {
        //     return "You cannot edit details ";
        // }
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

        // if (Auth::user()->id == '1' || Auth::user()->id == $id+2) {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                //                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'fac_title' => 'required',
                'fac_designtion' => 'required',
                'fac_phone' => 'required',
                'fac_status' => 'required',
                'fac_description' => 'required',
            ]);
            $fields = $request->only([
                'name', 'password', 'fac_title', 'fac_designtion', 'fac_phone', 'fac_status', 'fac_description',
            ]);
            $fc = CreateUser::find($id)->faculty_id;
            $uc = CreateUser::find($id)->user_id;
            //            faculty Delete
            $faculty = Faculty::find($fc);
            //            $faculty->fac_code=$fields->fac_code;
            $faculty->fac_title = $fields['fac_title'];
            $faculty->fac_designtion = $fields['fac_designtion'];
            $faculty->fac_phone = $fields['fac_phone'];
            $faculty->fac_status = $fields['fac_status'];
            $faculty->fac_description = $fields['fac_description'];
            $faculty->save();
            //            user delete
            $user = User::find($uc);
            $user->name = $fields['name'];
            $user->password = bcrypt($fields['password']);
            $user->save();
            //            create user delete
            CreateUser::find($id)->save();
            return redirect(route('admin.usercreate.index'))
                ->with('success', 'User Update Successfully');
            //code...
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
        // }
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

            $fc = CreateUser::find($id)->faculty_id;
            $uc = CreateUser::find($id)->user_id;
            //            create user delete
            CreateUser::find($id)->delete();
            //            faculty Delete
            Faculty::find($fc)->delete();
            //            user delete
            User::find($uc)->delete();
            return redirect(route('admin.usercreate.index'))->with('success', 'User Deleted Successfully');
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    // pdf generate all pdf
    public function pdf()
    {
        $createUser2 = CreateUser::all();
        $pdf = PDF::loadView('user.print', compact('createUser2'));
        return $pdf->download('user.pdf');
    }
    // generate pdf one row
    public function pdfForm(Request $request, $id)
    {
        $createUser1 = CreateUser::all()->where('id', $id);
        $pdf = PDF::loadView('user.pdf_download', compact('createUser1'));
        return $pdf->download('user.pdf');
    }

    // search

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');



        // Search in the title and body columns from the posts table
        $posts = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            //            ->orWhere('dept_code', 'LIKE', "%{$search}%")
            ->get();


        // Return the search view with the resluts compacted
        return view('user.search', compact('posts'));
    }
}
