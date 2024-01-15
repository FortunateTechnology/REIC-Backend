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

class ReportMemberExpireController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:contact-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $numberOfRows = 2;
        $datas = [];

        $rivrname = ['เวลาทำการ', 'เบอร์โทรศัพท์'];
        $rivrno = ['จันทร์ - ศุกร์ 8.30 - 15.30', 'โทร. 0-2645-9000'];

        for ($i = 1; $i <= $numberOfRows; $i++) {

            //$ivrno  = $rivrno[array_rand($rivrno)];
            //$createDate = now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59));

            $datas[] = (object) [
                'id' => $i,
                'faq' => $rivrname[$i-1],
                'afaq' => $rivrno[$i-1],
                'status' => 1,
            ];
        }

        if ($request->ajax()) {
            return datatables()->of($datas)
            //    ->editColumn('checkbox', function ($row) {
            //        return '<input type="checkbox" id="" class="flat" name="table_records[]" value="" >';
            //})->rawColumns(['checkbox', 'action'])
            ->toJson();
        }
        return view('reportmemberexpire.index');
    }
    
    public function report(Request $request)
    {
        if (!empty($request->get('sdate'))) {
            $dateRange = $request->input('sdate');
            if ($dateRange) {
                $dateRangeArray = explode(' - ', $dateRange);
                if (!empty($dateRangeArray) && count($dateRangeArray) == 2) {
                    $startDate = $dateRangeArray[0];
                    $endDate = $dateRangeArray[1];
                }
            }
        }else{
                    $startDate = date("Y-m-d");
                    $endDate = date("Y-m-t", strtotime($startDate));  
        }
            $datas = DB::table('crm_cases')
                ->select('casetype1', DB::raw('count(casetype1) as sumcases'))
                ->whereRaw('adddate between "' . $startDate . '" and "' . $endDate . '"')
                ->groupBy('casetype1')
                ->orderBy("sumcases", "desc")
                ->get();
                $chart_data = array();
                $chart_label = array();
                foreach ($datas as $data) {
                    $chart_data[] = $data->sumcases;
                    $chart_label[] = $data->casetype1;
                }
        return response()->json(['datag' => $chart_data,'datal' => $chart_label]);
    }

}
