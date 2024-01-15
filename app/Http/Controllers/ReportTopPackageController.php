<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Services\GraphService;

class ReportTopPackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:member-list|member-create|member-edit|member-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:member-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:member-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $numberOfRows = 5;
        $datas = [];

        $no = [1, 2, 3, 4, 5];
        $name = ['Package1', 'Package2','Package3','Package4','Package5'];
        $status = [50, 100, 70, 90, 40];

        for ($i = 1; $i <= $numberOfRows; $i++) {

            //$ivrno  = $rivrno[array_rand($rivrno)];
            //$createDate = now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            $datas[] = (object) [
                'id' => $no[$i-1],
                'name' => $name[$i-1],
                'status' => $status[$i-1],
            ];
        }

        if (!empty($request->get('rstatus'))) {
            $chart_data = array();
            $chart_label = array();
            foreach ($datas as $data) {
                $chart_data[] = $data->status;
                $chart_label[] = $data->name;
            }
            return response()->json(['datag' => $chart_data,'datal' => $chart_label]);
        }

        if ($request->ajax()) {
            return datatables()->of($datas)
            //    ->editColumn('checkbox', function ($row) {
            //        return '<input type="checkbox" id="" class="flat" name="table_records[]" value="" >';
            //})->rawColumns(['checkbox', 'action'])
            ->toJson();
        }

        return view('reporttoppackage.index');
    }
}
