<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
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
      $string = file_get_contents('http://imob21.com.br/acc/imob21/publish/integracao.xml');
      $xml = new SimpleXMLElement($destinationPath.$fileName, null, true);
While the DomDocument would be:

$xml = new DomDocument('1.0', 'utf-8'); // Or the right version and encoding of your xml file
$xml->load($destinationPath.$fileName);
      dd($string);
      $xml = new SimpleXMLElement($string);

      dd($xml);
      foreach($xml->users->user as $item){
          echo $item->ID.' - ';
          echo $item->username.' - ';
          echo $item->email.' - ';
          echo '<br/>';
          mysqli_query($conn, "INSERT INTO users (ID, username ,email ) VALUES (". $item->ID.", '". $item->username."', '" .$item->email."')" );
      }

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
          'numero' => 'numeric',
          'area' => 'numeric',
          'suites' => 'numeric',
          'banheiros' => 'numeric',
          'salas' => 'numeric',
          'garagem' => 'numeric'
        ]);
        
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
        $imoveis->suites = $request->suites;
        $imoveis->banheiros = $request->banheiros;
        $imoveis->salas = $request->salas;
        $imoveis->garagem = $request->garagem;
        $imoveis->save();

        return redirect()->route('imobiliaria.index')->with('message', 'Imovel Atualizado!');
    }
  
    public function destroy($id)
    {
        $imoveis = imoveis::findOrFail($id);
        $imoveis->delete();
        return redirect()->route('imobiliaria.index')->with('message', 'Imovel Deletado!');
    }
}