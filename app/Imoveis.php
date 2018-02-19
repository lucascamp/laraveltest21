<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    protected $fillable = ['id','titulo','tipo','cep','cidade','estado','bairro', 'endereco',
    						'numero','complemento','preco_venda','preco_locacao',
    						'preco_temporada','area','dormitorios','suites','banheiros',
    						'salas','garagem','img_url'];
    						
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'imoveis';
}