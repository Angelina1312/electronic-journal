<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\Journal;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function export(Request $request)
    {
        return (new ReportsExport($request->all()))->download('report.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reportsQuery = Journal::query();
        // филтр по началу выгрузки
        if ($request->filled('date_start')) {
            $reportsQuery->where('date_start', '>=', $request->date_start);
        }

        // филтр по концу выгрузки
        if ($request->filled('date_end')) {
            $reportsQuery->where('date_end', '<=', $request->date_end);
        }

        // филтр по группе
        if ($request->filled('group')) {
            $reportsQuery->where('name_group', '=', $request->group);
        }

        // филтр по предмету
        if ($request->filled('predmet')) {
            $reportsQuery->where('predmet', '=', $request->predmet);
        }


        $predmet = DB::table('journals')->distinct()->get(['predmet']);
        $name_group = DB::table('journals')->distinct()->get(['name_group']);
        $date_end = DB::table('journals')->distinct()->get(['date_end']);
        $date_start = DB::table('journals')->distinct()->get(['date_start']);

        $reports = $reportsQuery->paginate(25);
        return view('auth.report.index', compact('reports','predmet','name_group','date_end','date_start'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
  /*  public function create()
    {
        return view('auth.report.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   /* public function store(Request $request)
    {
        $params = $request->all();
        Report::create($params);
        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
 /*   public function show(Report $report)
    {
        return view('auth.report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
  /*  public function edit(Report $report)
    {
        return view('auth.report.form', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
  /*  public function update(Request $request, Report $report)
    {
        $params = $request->all();
        $report->update($params);
        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
 /*   public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('report.index');
    } */
}
