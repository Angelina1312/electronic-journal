<?php

namespace App\Exports;

use App\Models\Journal;
use App\Models\Report;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{

    // здесь мы задаем правила выгрузки в эксель
    use Exportable;

    private $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * @return Journal[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection
     */
    public function collection()
    {
        if (!$this->query) {
            return Journal::all();
        }

        $data = [];

        foreach ($this->query as $key => $item) {
            $data[] = [$key,'=',$item];
        }

        return DB::table('journals')->where($data)->get();

    }

}
