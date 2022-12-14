<?php

namespace App\Exports;

use App\Models\Alumnos;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlumnosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumnos::all();
    }
    public function headings(): array
    {
        return ["Apellido1", "Apellido2", "Nombre","DNI"];
    }
}
