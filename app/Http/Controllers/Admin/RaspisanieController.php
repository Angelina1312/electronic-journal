<?php

namespace App\Http\Controllers\Admin;

use App\Models\Raspisanie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function view;

class RaspisanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     //   dd($request->all());
       $raspisaniesQuery = Raspisanie::query();
        //  фильтр по дню недели
        if ($request->filled('den_ned')) {
            $raspisaniesQuery->where('den_ned', '=', $request->den_ned);
        }

        // фильтр четной,нечетной недели
        if ($request->filled('type_week')) {
            $raspisaniesQuery->where('type_week', '=', $request->type_week);
        }

        $raspisanies = DB::table('raspisanies')->distinct()->get('type_week');
        $days = DB::table('raspisanies')->distinct()->get('den_ned');

        $data = $raspisaniesQuery->paginate(25)->withPath("?" . $request->getQueryString());
        return view('auth.raspisanie.index', compact('raspisanies','data', 'days'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.raspisanie.form');
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
        Raspisanie::create($params);
        return redirect()->route('raspisanie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raspisanie  $raspisanie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Raspisanie $raspisanie)
    {
        return view('auth.raspisanie.show', compact('raspisanie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raspisanie  $raspisanie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Raspisanie $raspisanie)
    {
        return view('auth.raspisanie.form', compact('raspisanie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raspisanie  $raspisanie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Raspisanie $raspisanie)
    {
        $params = $request->all();
        $raspisanie->update($params);
        return redirect()->route('raspisanie.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        Raspisanie::destroy($id);
        return redirect()->route('raspisanie.index')->with('success','Успешно удален');
    }
}
