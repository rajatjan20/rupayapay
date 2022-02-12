<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection , WithHeadings
{


    public $transactionData;


    public function __construct($transactiondata){
        $this->transactionData = $transactiondata;
    }

    public function headings(): array
    {
        return ["Merchant GId", 
        "Id", 
        "TransactionId",
        "Transaction Amount",
        "Status",
        "Transaction Date",
        "Transaction Mode",
        "Transaction Type",
        "Merchant Id",
        "GST",
        "Percentage Charge",
        "Percntage Charged Amount",
        "GST Charged",
        "Adjustment Charged",
        "Total Adjustment Amount"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->transactionData);
    }

    
}
