<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidatoExports implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
	
	public function __construct(int $id, string $nome)
    {
		$this->id = $id;
        $this->nome = $nome;
    }
	
    public function collection()
    {
        return DB::table('processo_seletivo_'.$this->nome)
        ->get();
    }

    public function headings(): array
    {
        return [
            'NOME',
            'VAGA',
            'DATA_INSCRICAO',
            'CPF'
        ];
    }
}