<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use XmlParser;
use Storage;
//use App\Http\Requests\imoveisRequest;

use App\Imoveis;

class ImobiliariaController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index() {
    //     return view('index')->with($data);
    // }

    public function index()
    {
      $imoveis = Imoveis::orderBy('created_at', 'desc')->get();
      return view('index',['imoveis' => $imoveis]);
    }

    public function create()
    {
      return view('create');
    }

    public function store(Request $request)
    {
        $imovel = $this->validate(request(), [
          'titulo' => 'required',
          'tipo' => 'required',
          'cep' => 'numeric',
          'cidade' => 'alpha_num',
          'estado' => 'alpha_num',
          'bairro' => 'alpha_num',
          'endereco' => 'alpha_num',
          'complemento' => 'alpha_num',
          'numero' => 'numeric',
          'preco_venda' => 'alpha_num',
          'preco_locacao' => 'alpha_num',
          'preco_temporada' => 'alpha_num',
          'area' => 'numeric',
          'suites' => 'numeric',
          'dormitorios' => 'numeric',
          'banheiros' => 'numeric',
          'salas' => 'numeric',
          'garagem' => 'numeric'
        ]);

        $imovel['img_url'] = $imovel['numero'].'_'.$imovel['cep'].'.jpeg';

        $request->file('img_url')->move(public_path("/uploads"), $imovel['numero'].'_'.$imovel['cep'].'.jpeg');

        Imoveis::create($imovel);
        return redirect()->route('imobiliaria.index')->with('message', 'Imovel Atualizado!');
    }

    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $imovel = Imoveis::findOrFail($id);
        return view('edit',['imovel' => $imovel]);
    }
  
    public function update(Request $request, $id)
    {
        $imoveis = imoveis::findOrFail($id);
        
        $imoveis->titulo = $request->titulo;
        $imoveis->tipo = $request->tipo;
        $imoveis->cep = $request->cep;
        $imoveis->cidade = $request->cidade;
        $imoveis->estado = $request->estado;
        $imoveis->bairro = $request->bairro;
        $imoveis->endereco = $request->endereco;
        $imoveis->numero = $request->numero;
        $imoveis->complemento = $request->complemento;
        $imoveis->preco_venda = $request->preco_venda;
        $imoveis->preco_locacao = $request->preco_locacao;
        $imoveis->preco_temporada = $request->preco_temporada;
        $imoveis->area = $request->area;
        $imoveis->dormitorios = $request->dormitorios;
        $imoveis->suites = $request->suites;
        $imoveis->banheiros = $request->banheiros;
        $imoveis->salas = $request->salas;
        $imoveis->garagem = $request->garagem;
        
        // $imoveis->img_url = $imoveis->numero.'_'.$imoveis->cep.'.jpeg';
        // $request->file('img_url')->move(public_path("/uploads"), $imoveis->img_url);

        $imoveis->save();

        return redirect()->route('imobiliaria.index')->with('message', 'Imovel Atualizado!');
    }
  
    public function destroy($id)
    {
        $imoveis = imoveis::findOrFail($id);
        $imoveis->delete();
        return redirect()->route('imobiliaria.index')->with('message', 'Imovel Deletado!');
    }

    public function xml_upload()
    {
        
    $xml = XmlParser::load('http://imob21.com.br/acc/imob21/publish/integracao.xml');

      $user = $xml->parse([
        'Cidade' => ['uses','Imoveis.Imovel'],
      ]);

      dd($user);

      $products = $xml->getContent();

      foreach($products as $product) {
        foreach ($product as $prod) {
          $item = $prod->CodigoImovel;
          dd($item);
          $item->title = $product['title'];
          $item->save();
        }

          
        }
    }
}