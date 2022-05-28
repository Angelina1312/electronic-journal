<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $journalsQuery = Journal::query();
        // фильтр по дате
        if ($request->filled('date')) {
            $journalsQuery->where('date', '=', $request->date);
        }

        // фильтр по группе
        if ($request->filled('group')) {
            $journalsQuery->where('name_group', '=', $request->group);
        }

        // фильтр по предмету
        if ($request->filled('predmet')) {
            $journalsQuery->where('predmet', '=', $request->predmet);
        }

        $groups = DB::table('journals')->distinct()->get('name_group');
        $predmets = DB::table('journals')->distinct()->get('predmet');

        $journals = $journalsQuery->paginate(25);
        return view('auth.journal.index', compact('journals', 'groups', 'predmets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.journal.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $params = $request->all();
        Journal::create($params);
        return redirect()->route('journal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        return view('auth.journal.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        return view('auth.journal.form', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Journal $journal)
    {
        $params = $request->all();
        $journal->update($params);
        return redirect()->route('journal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect()->route('journal.index');
    }
}
