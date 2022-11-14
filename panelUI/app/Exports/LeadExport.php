<?php

namespace App\Exports;

use App\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Name',
            'Email',
            'Country-Code',
            'Mobile',
            'Subject',
            'Country',
            'State',
            'City',
            'Created_at',
            'Updated_at'
        ];
    }

    public function collection()
    {
        return Lead::all();
    }
}
