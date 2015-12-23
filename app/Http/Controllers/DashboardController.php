<?php

namespace App\Http\Controllers;

use App\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //限管理員
        $this->middleware('role:admin', [
            'except' => [
                'getIndex'
            ]
        ]);
    }

    public function getIndex()
    {
        if (!\Entrust::hasRole('admin')) {
            return view('dashboard.guest');
        }
        return view('dashboard.index');
    }

    public function getRecord()
    {
        //Records
        $nid = Input::get('nid');
        if ($nid) {
            $q = '%' . $nid . '%';
            $records = Record::where('nid', 'like', $q)->paginate(50);
        } else {
            $records = Record::paginate(50);
        }
        //Stats
        $stats['total'] = [
            'count' => Record::count(),
            'https' => Record::where('https', '=', true)->count()
        ];
        if ($nid) {
            $stats['nid'] = [
                'count' => Record::where('nid', 'like', $q)->count(),
                'https' => Record::where('nid', 'like', $q)->where('https', '=', true)->count()
            ];
        }
        return view('dashboard.record')->with('records', $records)->with('stats', $stats);
    }

    public function export()
    {
        //統計
        $records = Record::all();
        $data = [];
        foreach ($records as $record) {
            if (!isset($data[$record->nid])) {
                $data[$record->nid] = [];
            }
            if ($record->https) {
                $data[$record->nid]['https'] = (isset($data[$record->nid]['https']))
                    ? $data[$record->nid]['https'] + 1 : 1;
            } else {
                $data[$record->nid]['http'] = (isset($data[$record->nid]['http']))
                    ? $data[$record->nid]['http'] + 1 : 1;
            }

        }
        $time = Carbon::now()->format('Ymd_His');
        Excel::create('Export_' . $time, function ($excel) use ($data) {
            $excel->sheet('名單', function ($sheet) use ($data) {
                //凍結第一列
                $sheet->freezeFirstRow();
                //自動篩選
                $sheet->setAutoFilter('A1:D1');
                //設定寬度
                $sheet->setWidth([
                    'A' => 20,
                    'B' => 20,
                    'C' => 20,
                    'D' => 20
                ]);
                //型態
                $sheet->setColumnFormat([
                    'A' => '@'
                ]);
                //標題列
                $sheet->rows([
                    [
                        'NID', '總次數', 'HTTPS', 'NON-HTTPS'
                    ]
                ]);
                //資料
                $nidList = Record::select('nid')->groupBy('nid')->lists('nid')->toArray();
                foreach ($nidList as $nid) {
                    $count['https'] = isset($data[$nid]['https']) ? $data[$nid]['https'] : 0;
                    $count['http'] = isset($data[$nid]['http']) ? $data[$nid]['http'] : 0;
                    $sheet->rows([
                        [
                            $nid,
                            $count['https'] + $count['http'],
                            $count['https'],
                            $count['http']
                        ]
                    ]);
                }
            });
        })->download('xlsx');
    }
}
