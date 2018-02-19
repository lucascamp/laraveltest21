@extends('layouts.admin_template')

@section('content')
<div class='row'>
    <div class='col-md-12'>
        <!-- Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Imóveis</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Localização</th>
                            <th>Preços</th>
                            <th>Área</th>
                            <th>Comodos</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Localização</th>
                            <th>Preços</th>
                            <th>Área</th>
                            <th>Comodos</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($imoveis as $imovel)
                        <tr>
                            <td>{{ $imovel->id }}</td>
                            <td>{{ $imovel->titulo }}</td>
                            <td>{{ $imovel->tipo }}</td>
                            <td>
                                {{ $imovel->endereco }}, {{ $imovel->numero }} - {{ $imovel->cep }}<br> {{ $imovel->bairro }} - {{ $imovel->cidade }} - {{ $imovel->estado }} 
                            </td>
                            <td>
                                Venda: {{ $imovel->preco_venda }}<br>
                                Locação: {{ $imovel->preco_locacao }}<br>
                                Temporada: {{ $imovel->preco_temporada }}<br>
                            </td>
                            <td>{{ $imovel->area }} Metros</td>
                            <td>
                                Dormitórios: {{ $imovel->dormitorios }}<br>
                                Suítes: {{ $imovel->suites }}<br>
                                Banheiros: {{ $imovel->banheiros }}<br>  
                                Salas: {{ $imovel->salas }}<br>
                                Garagem: {{ $imovel->garagem }}<br>
                            </td>
                            <td>
                            <img class="img-fluid" style="max-width: 100px" src={{ asset('uploads/'.$imovel->img_url) }} />
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('imobiliaria.edit', $imovel->id) }}"><span class="fa fa-edit"></span></a>
                                <form action="{{ action('ImobiliariaController@destroy', $imovel->id) }}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>

            </div><!-- /.col -->

        </div><!-- /.row -->
        @endsection