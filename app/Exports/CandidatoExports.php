<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidatoExports implements FromCollection, WithHeadings
{
    use Exportable;
	
	public function __construct(int $id, string $nome)
    {
		$this->id = $id;
        $this->nome = $nome;
    }
	
    public function collection()
    {
        return DB::table('processo_seletivo_'.$this->nome)
        ->join('questionario_'.$this->nome,
               'processo_seletivo_'.$this->nome.'.id',
               '=','questionario_'.$this->nome.'.candidato_id')
        ->select('nome as NOME','email','vaga','cpf',
        'data_inscricao','telefone_fixo','lugar_nascimento','estado_nascimento','cidade_nascimento',
        'data_nascimento','rua','numero','bairro','cidade','estado','cep','complemento',
        'escolaridade','status_escolaridade','habilitacao','periodo_integral','periodo_noturno',
        'meio_periodo','outra_cidade','como_soube','parentesco','parentesco_nome','trabalha_oss',
        'trabalha_oss2','nome_social','pronome','genero','cor','aceito','foto','nomearquivo',
        'telefone','formacao','cursos','deficiencia','cid',
        'exp_01_empresa','exp_01_cargo','exp_01_atribuicoes','exp_01_data_ini','exp_01_data_fim','exp_01_soma',
        'exp_02_empresa','exp_02_cargo','exp_02_atribuicoes','exp_02_data_ini','exp_02_data_fim','exp_02_soma',
        'exp_03_empresa','exp_03_cargo','exp_03_atribuicoes','exp_03_data_ini','exp_03_data_fim','exp_03_soma',
        'soma')
        ->orderby('vaga', 'ASC')->get();
    }

    public function headings(): array
    {
        return [
            'NOME',
            'EMAIL',
            'VAGA',
            'CPF',
            'DATA_INSCRICAO',
            'TELEFONE FIXO',
            'LUGAR NASCIMENTO',
            'ESTADO NASCIMENTO',
            'CIDADE NASCIMENTO',
            'DATA NASCIMENTO',
            'RUA',
            'NUMERO',
            'BAIRRO',
            'CIDADE',
            'ESTADO',
            'CEP',
            'COMPLEMENTO',
            'ESCOLARIDADE',
            'STATUS ESCOLARIDADE',
            'HABILITACAO',
            'PERIODO INTEGRAL',
            'PERIODO NOTURNO',
            'MEIO PERIODO',
            'OUTRA CIDADE',
            'COMO SOUBE',
            'PARENTESCO',
            'PARENTESCO NOME',
            'TRABALHA OSS',
            'TRABALHA OSS2',
            'NOME SOCIAL',
            'PRONOME',
            'GENERO',
            'COR',
            'ACEITO',
            'FOTO',
            'NOME ARQUIVO',
            'TELEFONE',
            'FORMACAO',
            'CURSOS',
            'DEFICIÊNCIA',
            'CID',
            'EMPRESA 01',
            'CARGO 01',
            'ATRIBUICOES 01',
            'DATA INICIO 01',
            'DATA FIM 01',
            'EXP 1 SOMA',
            'EMPRESA 02',
            'CARGO 02',
            'ATRIBUICOES 02',
            'DATA INICIO 02',
            'DATA FIM 02',
            'EXP 2 SOMA',
            'EMPRESA 03',
            'CARGO 03',
            'ATRIBUICOES 03',
            'DATA INICIO 03',
            'DATA FIM 03',
            'EXP 3 SOMA',
            'QUESTIONÁRIO'
        ];
    }
}