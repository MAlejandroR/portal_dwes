<?php

namespace App\Imports;

use App\Models\Alumnos;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;



class AlumnosImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
//    public function model(array $row)
//    {
//        $alumno = new Alumnos($row);
//        return ($alumno);
//        return new Alumnos([
//            //
//            "Apellido1"=>$row['Apellido1'],
//            "Apellido2"=>$row['Apellido2'],
//            "Nombre"=>$row['Nombre'],
//            "DNI"=>$row['DNI']
//        ]);
//    }
    public function collection(Collection $rows)
    {


        $rows =$rows->toArray();

        foreach ($rows as $index=>$row)
        {
            if ($index==0)
                continue;
            Log::info($row);
            Alumnos::create([
                'Apellido1' => $row[0],
                'Apellido2' => $row[1],
                'Nombre' => $row[2],
                'Ciclo' => $row[3],
                'DNI' => $row[4],
            ]);
        }
    }
}
