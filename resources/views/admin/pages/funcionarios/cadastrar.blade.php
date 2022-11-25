@extends('adminlte::page')

@section('title', 'Listar Funcionarios')

@section('content_header')
    <h1>Formulario de Cadastrar <a href="" class="btn btn-warning">
    <i class="fas fa-plus"></i>
    </a></h1>
@stop

@section('content')
    <div class="card">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif    

        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Aba 01</button>
                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Aba 02</button>
                    
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form action="{{route('funcionarios.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o seu Nome:" value="{{old('nome')}}">
                            </div>
                            <div class="col">
                                <label for="nome_pai">Nome Pai:</label>
                                <input type="text" name="nome_pai" id="nome_pai" class="form-control" placeholder="Digite o seu Nome do seu Pai:" value="{{old('nome_pai')}}">
                            </div>
                            <div class="col">
                                <label for="nome_mae">Nome Mãe:</label>
                                <input type="text" name="nome_mae" id="nome_mae" class="form-control" placeholder="Digite o seu Nome do seu Mãe:" value="{{old('nome_mae')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="data_nascimento">Data Nascimento:</label>
                                <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" placeholder="dd/mm/aaaa" value="{{old('data_nascimento')}}">
                            </div>
                            <div class="col">
                                <label for="cpf">CPF:</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="XXX.XXX.XXX-XX" value="{{old('cpf')}}">
                            </div>
                            <div class="col">
                                <label for="cidade">Cidade:</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Digite a sua cidade:" value="{{old('cidade')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="bairro">Bairro:</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Digite a seu Bairro:" value="{{old('bairro')}}">
                            </div>
                            <div class="col">
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Digite a seu Logradouro:" value="{{old('logradouro')}}">
                            </div>
                            <div class="col">
                                <label for="cep">Cep:</label>
                                <input type="text" name="cep" id="cep" class="form-control" placeholder="XXXXX-XXX" value="{{old('cep')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(XX) X XXXX-XXXX" value="{{old('telefone')}}">
                            </div>
                            <div class="col">
                                <label for="complemento">Complemento:</label>
                                <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento" value="{{old('complemento')}}">
                            </div>
                            
                        </div>
                    
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="form-group">
                        <label for="especialidade_id">Especialidade:</label>
                        <select name="especialidade_id" id="especialidade_id" class="form-control">
                            <option value="">--Escolher Especialidade--</option>
                            @foreach($especialidades as $es)
                                <option value="{{$es->id}}" {{old('especialidade_id') == $es->id ? 'selected' : ''}}>{{$es->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                      
                    <div class="form-group">
                        <label for="experiencia_id">Experiencia:</label>
                        <select name="experiencia_id" id="experiencia_id" class="form-control">
                            <option value="">--Escolher Experiencia--</option>
                            @foreach($experiencias as $ex)
                                <option value="{{$ex->id}}" {{old('experiencia_id') == $ex->id ? 'selected' : ''}}>{{$ex->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" value="Cadastrar">  
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script>
        $(function(){
            $('#cpf').mask('000.000.000-00'); 
            $('#data_nascimento').mask('00/00/0000');
            $('#cep').mask('00000-000');
            $('#telefone').mask('(00) 0 0000-0000');
        });
    </script>
@stop    