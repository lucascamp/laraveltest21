@extends('layouts.admin_template')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Cadastro de Imóveis</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">

            <form method="post" action="{{ url('/imobiliaria') }}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <label for="titulo">Título</label>
                    <input name="titulo" class="form-control" id="titulo">
                  </div>

                  <div class="col-md-4">
                    <label>Tipo</label>
                    <select class="form-control" name="tipo">
                      <option value="Casa" selected>Casa</option>
                      <option value="Apartamento">Apartamento</option>
                    </select>
                  </div>
                </div>

                <br>
                <div class="row"> 
                  <div class="col-md-2">
                    <label for="cep">CEP</label>
                    <input name="cep" class="form-control" id="cep">
                  </div>

                  <div class="col-md-8">
                    <label for="endereco">Endereço</label>
                    <input name="endereco" class="form-control" id="endereco">
                  </div>

                  <div class="col-md-2">
                    <label for="numero">Número</label>
                    <input name="numero" class="form-control" id="numero">
                  </div>

                  <div class="col-md-4">
                    <label for="bairro">Bairro</label>
                    <input name="bairro" class="form-control" id="bairro">
                  </div>

                  <div class="col-md-6">
                    <label for="cidade">Cidade</label>
                    <input name="cidade" class="form-control" id="cidade">
                  </div>

                  <div class="col-md-2">
                    <label for="estado">Estado</label>
                    <input name="estado" class="form-control" id="estado">
                  </div>

                  <div class="col-md-12">
                    <label for="complemento">Complemento</label>
                    <input name="complemento" class="form-control" id="complemento">
                  </div>

                </div>

                <br>
                <div class="row"> 

                  <div class="col-md-4">
                    <label for="preco_venda">Preço de venda</label>
                    <input name="preco_venda" class="form-control" id="preco_venda">
                  </div>

                  <div class="col-md-4">
                    <label for="preco_locacao">Preço Locação</label>
                    <input name="preco_locacao" class="form-control" id="preco_locacao">
                  </div>

                  <div class="col-md-4">
                    <label for="preco_temporada">Preço Temporada</label>
                    <input name="preco_temporada" class="form-control" id="preco_temporada">
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="col-md-3">
                    <label for="area">Área em Metros</label>
                    <input name="area" class="form-control" id="area">
                  </div>

                  <div class="col-md-3">
                    <label for="dormitorios">Dormitórios</label>
                    <input name="dormitorios" class="form-control" id="dormitorios">
                  </div>

                  <div class="col-md-3">
                    <label for="suites">Suítes</label>
                    <input name="suites" class="form-control" id="suites">
                  </div>

                  <div class="col-md-3">
                    <label for="banheiros">Banheiros</label>
                    <input name="banheiros" class="form-control" id="banheiros">
                  </div>

                  <div class="col-md-3">
                    <label for="salas">Salas</label>
                    <input name="salas" class="form-control" id="salas">
                  </div>

                  <div class="col-md-3">
                    <label for="garagem">Vagas de Garagem</label>
                    <input name="garagem" class="form-control" id="garagem">
                  </div>

                  <div class="col-md-3">
                    <label for="banheiros">Banheiros</label>
                    <input name="banheiros" class="form-control" id="banheiros">
                  </div>

                </div>

                <br>

                <div class="row">

                  <div class="col-md-6">
                    <label for="img_url">Imagem do Imóvel</label>
                    <input type="file" id="img_url">

                    <p class="help-block">Coloque a foto do ímovel acima</p>
                  </div>
                </div>
                
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
        </div>

      </div><!-- /.col -->

    </div><!-- /.row -->
    @endsection