<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
                'count' => Record::where('nid', '=', $nid)->count(),
                'https' => Record::where('nid', '=', $nid)->where('https', '=', true)->count()
            ];
        }
        return view('dashboard.record')->with('records', $records)->with('stats', $stats);
    }
}
