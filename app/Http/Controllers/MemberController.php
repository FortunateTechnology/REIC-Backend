<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:member-list|member-show|member-create|member-edit|member-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:member-show', ['only' => ['show']]);
        $this->middleware('permission:member-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:member-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $parents = Parents::all();
        // foreach ($parents as $key => $parent) {
        //     $students = $parent->students();
        //     # code...
        // }
        // dd($students);

        if ($request->ajax()) {

            $datass = Parents::orderBy('id', 'desc');
            if (!Gate::allows('all-centre')) {
                $datass->where('centre_id', Auth::user()->department->id);
            }
            $datas = $datass->get();
            return datatables()->of($datas)

                ->editColumn('student_name', function ($row) {
                    $stdName = '';

                    if ($row->students()->count() > 0) {
                        $stds = $row->students();

                        if ($stds->count() > 1) {
                            # code...
                            foreach ($stds as $std) {
                                $stdName .= $std->name . ' , ';
                            }
                        } else {
                            # code...
                            foreach ($stds as $std) {
                                $stdName .= $std->name;
                            }
                        }
                    } else {
                        $stdName = 'N/A';
                    }
                    return $stdName;
                })
                ->editColumn('checkbox', function ($row) {
                    return '<input type="checkbox" id="' . $row->id . '" class="flat" name="table_records[]" value="' . $row->id . '" >';
                })
                ->editColumn('centre', function ($row) {
                    // $code= 1;
                    if ($row->department) {

                        $centre = $row->department->name;
                    } else {
                        $centre = 'N/A';
                    }
                    return $centre;
                })
                ->editColumn('parent_name', function ($row) {
                    // $code= 1;
                    if ($row->full_name) {

                        $full_name = $row->full_name;
                    } else {
                        $full_name = 'N/A';
                    }
                    return $full_name;
                })

                ->editColumn('parent_telp', function ($row) {
                    // $code= 1;
                    if ($row->telp_email) {

                        $telp_email = $row->telp_email;
                    } else {
                        $telp_email = 'N/A';
                    }
                    return $telp_email;
                })



                // ->editColumn('name', function ($row) {
                //     // $name = 1;
                //     if ($row->student) {
                //         $name = $row->student->name;
                //     } else {
                //         $name = 'N/A';
                //     }
                //     return $name;
                // })
                ->addColumn('more', function ($row) {
                    return '';
                })
                ->addColumn('action', function ($row) {
                    $html = '';
                    if (Gate::allows('student-edit')) {
                        $html = '<button type="button" class="btn btn-sm btn-primary btn-view" id="getViewData" data-id="' . $row->id . '"><i class="fa fa-eye"></i> View</button> ';
                    } else {
                        $html = '<button type="button" class="btn btn-sm btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="You Not Have Permission"><i class="fa fa-edit"></i> Edit</button> ';
                    }

                    if (Gate::allows('student-edit')) {
                        $html .= '<button type="button" class="btn btn-sm btn-warning btn-edit" id="getEditData" data-id="' . $row->id . '"><i class="fa fa-edit"></i> Edit</button> ';
                    } else {
                        $html .= '<button type="button" class="btn btn-sm btn-warning disabled" data-toggle="tooltip" data-placement="bottom" title="You Not Have Permission"><i class="fa fa-edit"></i> Edit</button> ';
                    }

                    if (Gate::allows('student-delete')) {
                        $html .= '<button type="button" data-rowid="' . $row->id . '" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>';
                    } else {
                        $html .= '<button type="button" class="btn btn-sm btn-danger disabled" data-toggle="tooltip" data-placement="bottom" title="You Not Have Permission"><i class="fa fa-trash"></i> Delete</button> ';
                    }
                    return $html;
                })->rawColumns(['checkbox', 'action', 'more'])->toJson();
        }

        $centre = Department::where([['status', '1']])
            ->orderBy("name", "asc")->get();
        $term = term::where([['status', '1']])
            ->orderBy("name", "asc")->get();
        $sterm = Sterm::where([['status', '1']])
            ->orderBy("name", "asc")->get();
        $bookuse = bookuse::where([['status', '1']/* , ['type', '1'] */])
            ->orderBy("name", "asc")->get();
        $level = level::where([['status', '1']])
            ->orderBy("name", "asc")->get();

        // dd($last_book,$last_level,$graduated);
        // $histories = Histrories::all();

        return view('parents.index', [
            'centre' => $centre,
            'bookuse' => $bookuse,
            'term' => $term,
            'sterm' => $sterm,
            // 'histories' => $histories,
            'level' => $level
        ]);
        // return view('parents.index');
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
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
