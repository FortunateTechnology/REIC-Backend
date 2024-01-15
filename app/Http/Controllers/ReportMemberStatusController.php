<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ReportMemberStatusController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:member-list|member-create|member-edit|member-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:member-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:member-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $numberOfRows = 5;
        $datas = [];

        $no = [1, 2, 3, 4, 5];
        $name = ['วิเชียร เก่งอ่าง', 'สมชาย มงคล','สมหญิง เก่งอ่าง','วิเชียร ศรีสุข','วิเชียร มงคล'];
        $status = ['ต่ออายุแล้ว', 'กำลังจะหมดอายุใน 1 เดือน', 'หมดอายุแล้ว', 'กำลังจะหมดอายุใน 3 เดือน', 'หมดอายุแล้ว'];

        for ($i = 1; $i <= $numberOfRows; $i++) {

            //$ivrno  = $rivrno[array_rand($rivrno)];
            //$createDate = now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            $datas[] = (object) [
                'id' => $no[$i-1],
                'name' => $name[$i-1],
                'status' => $status[$i-1],
            ];
        }

        if ($request->ajax()) {
            return datatables()->of($datas)
            //    ->editColumn('checkbox', function ($row) {
            //        return '<input type="checkbox" id="" class="flat" name="table_records[]" value="" >';
            //})->rawColumns(['checkbox', 'action'])
            ->toJson();
        }
        return view('reportmemberstatus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]); */

        $validator =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required'
        ]);



        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role'));

        /*  return redirect()->route('users.index')
            ->with('success', 'User created successfully'); */
        return response()->json(['success' => 'User Add successfully']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*   public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        //$userRole = $data->roles->pluck('name', 'name')->all();
        //dd($roles);
        //dd($userRole);

        if (!empty($data->getRoleNames())) {
            foreach ($data->getRoleNames() as $v) {
                $urole = $v;
            }
        }

        $rolese = '';
        foreach ($roles as $role) {
            if ($role == $urole) {
                $sselected = "selected";
            } else {
                $sselected = "";
            }

            $rolese .= '<option value="' . $role . '" ' . $sselected . '>' . $role . '</option>';
        }


        $html = '<div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" name="name" id="editName" value="' . $data->name . '">
                </div>
                <div class="form-group">
                    <label for="Name">Email:</label>
                    <input type="text" class="form-control" name="email" id="editEmail" value="' . $data->email . '">
                </div>
                    <div class="form-group">
                    <label for="Name">Password:</label>
                    <input type="password" class="form-control" name="password" required autocomplete="new-password"
                        id="EditPassword" >
                </div>
                <div class="form-group">
                    <label for="Name">Confirm Password:</label>
                    <input type="password" class="form-control" name="password_confirmation" id="EditPasswordC"
                        required autocomplete="new-password" >
                </div>
                <div class="form-group">
                    <label for="Name">Level:</label>
                    <select class="form-control" id="editRole" name="role">
                     ' . $rolese . '
                    </select>
                </div>';



        return response()->json(['html' => $html]);
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
        /* $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
       */

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ];

        if ($request->get('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validator =  Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $users = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            //'password' => Hash::make($request->get('password')),
        ];


        if ($request->get('password')) {
            $users['password'] = Hash::make($request->get('password'));
        }
        $user = User::find($id);
        $user->update($users);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('role'));

        return response()->json(['success' => 'User updated successfully']);

        /* return redirect()->route('users.index')
            ->with('success', 'User updated successfully'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        User::find($id)->delete();
        return ['success' => true, 'message' => 'User Deleted Successfully'];
        /* return redirect()->route('users.index')
            ->with('success', 'User deleted successfully'); */
    }

    public function destroy_all(Request $request)
    {

        $arr_del  = $request->get('table_records'); //$arr_ans is Array MacAddress

        for ($xx = 0; $xx < count($arr_del); $xx++) {
            User::find($arr_del[$xx])->delete();
        }
        //$ids = $request->get('table_records');
        //User::whereIn('id',explode(",",$ids))->delete();
        return redirect('/popup')->with('success', 'Users Deleted Successfully');
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}