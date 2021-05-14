<?php

namespace App\Exports;

use App\Models\form;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AnswersExport implements FromView, WithStyles, ShouldAutoSize, WithTitle
{
    use Exportable;

    private $id;
    
    public function forId($id){
        $this->id = $id;

        return $this;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true,'size' => 14]],
            2    => ['font' => ['bold' => true,'size' => 12]],
        ];
    }

    public function view(): View
    {
        return view('forms.export',[
            'forms' => $this->id
        ]);
    }

    public function title(): string
    {
        return "Respuestas";
    }
}
