<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $header;
    public $id;

    public function __construct($id, $header)
    {
        $this->id = $id;
        $this->header = $header;
    }

    public function headings(): array
    {
        return $this->header;
    }


    public function collection()
    {
        return Category::whereIn('id', $this->id)->get()->map(function ($Category) {

            $field = [];
            $field['id']    = $Category->id;
            $field['name']  = $Category->category_name;

            return $field;
        });
    }
}
