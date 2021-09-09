<?php

namespace App\Imports;

use App\ImportCashback;
use Maatwebsite\Excel\Concerns\ToModel;

class CashbackImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportCashback([
            'user_id' => $row[1],
            'amount' => $row[2],
        ]);
    }
}
