<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidatoExportsOld implements FromCollection, WithHeadings
{
    use Exportable;
	
	public function __construct(int $id, string $nome)
    {
		$this->id = $id;
        $this->nome = $nome;
    }
	
    public function collection()
    {
        return DB::table('processo_seletivo_'.$this->nome)->select('nome as NOME','email','vaga','cpf','telefone','formacao','cursos','cidade',
        'exp_01_empresa','exp_01_cargo','exp_01_atribuicoes','exp_01_data_ini','exp_01_data_fim',
        'exp_02_empresa','exp_02_cargo','exp_02_atribuicoes','exp_02_data_ini','exp_02_data_fim',
        'exp_03_empresa','exp_03_cargo','exp_03_atribuicoes','exp_03_data_ini','exp_03_data_fim','deficiencia')
        ->get();
    }

    public function headings(): array
    {
        return [
            'NOME',
            'EMAIL',
            'VAGA',
            'CPF',
            'TELEFONE',
            'FORMAÇÃO',
            'CURSOS',
            'CIDADE',
            'EMPRESA 01',
            'CARGO 01',
            'ATRIBUICOES 01',
            'DATA INÍCIO 01',
            'DATA FIM 01',
            'EMPRESA 02',
            'CARGO 02',
            'ATRIBUICOES 02',
            'DATA INÍCIO 02',
            'DATA FIM 02',
            'EMPRESA 03',
            'CARGO 03',
            'ATRIBUICOES 03',
            'DATA INÍCIO 03',
            'DATA FIM 03',
            'DEFICIÊNCIA'
        ];
    }
}