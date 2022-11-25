@extends('adminlte::page')

@section('title', 'Listar Funcionarios')
@section('plugins.Datatables', true)
@section('plugins.Stars', true)
@section('content_header')
    <h1>Cadastrar Funcionarios <a href="{{route('listar.funcionarios.cadastrar')}}" class="btn btn-warning">
    <i class="fas fa-plus"></i>
    </a></h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <table id="tabela" class="table listarfuncionarios">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data Nascimento</th>
                        <th>Cidade</th>
                        <th>Especialidade</th>
                        <th>Experiencia</th>
                        <th>Classi.</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>      
        </div>
    </div>


    <div class="modal fade" id="editarFuncionario" tabindex="-1" aria-labelledby="editarFuncionarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarFuncionarioLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('funcionarios.editar')}}" method="POST">
                        <input type="hidden" name="funcionario_id" id="funcionario_id">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o seu Nome:">
                            </div>
                            <div class="col">
                                <label for="nome_pai">Nome Pai:</label>
                                <input type="text" name="nome_pai" id="nome_pai" class="form-control" placeholder="Digite o seu Nome do seu Pai:">
                            </div>
                            <div class="col">
                                <label for="nome_mae">Nome Mãe:</label>
                                <input type="text" name="nome_mae" id="nome_mae" class="form-control" placeholder="Digite o seu Nome do seu Mãe:">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="data_nascimento">Data Nascimento:</label>
                                <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" placeholder="dd/mm/aaaa">
                            </div>
                            <div class="col">
                                <label for="cpf">CPF:</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="XXX.XXX.XXX-XX">
                            </div>
                            <div class="col">
                                <label for="cidade">Cidade:</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Digite a sua cidade:">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="bairro">Bairro:</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Digite a seu Bairro:">
                            </div>
                            <div class="col">
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Digite a seu Logradouro:">
                            </div>
                            <div class="col">
                                <label for="cep">Cep:</label>
                                <input type="text" name="cep" id="cep" class="form-control" placeholder="XXXXX-XXX">
                            </div>
                        </div>
                        

                        <div class="form-row">
                            <div class="col">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(XX) X XXXX-XXXX">
                            </div>
                            <div class="col">
                                <label for="complemento">Complemento:</label>
                                <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento">
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="especialidade_id">Especialidade:</label>
                            <select name="especialidade_id" id="especialidade_id" class="form-control">
                                <option value="">--Escolher Especialidade--</option>
                                @foreach($especialidades as $es)
                                    <option value="{{$es->id}}">{{$es->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="experiencia_id">Experiencia:</label>
                            <select name="experiencia_id" id="experiencia_id" class="form-control">
                                <option value="">--Escolher Experiencia--</option>
                                @foreach($experiencias as $ex)
                                    <option value="{{$ex->id}}">{{$ex->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="classificacao" id="classificacao">
                        <div style="background-color:#666;width:90px;margin:0 auto;padding:10px 0;border-radius:5px;">
                            <div id="rateYo"></div>
                        </div>
                        


                        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>


                </form>        
            </div>
           
            </div>
        </div>
    </div>



@stop

@section('js')
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#rateYo").rateYo({spacing: "10px",starWidth: "20px",numStars: 3,minValue: 0,maxValue: 3,normalFill: 'white',ratedFill: 'orange',fullStar: true,onSet: function (rating, rateYoInstance) {$("input[name='classificacao']").val(rating);}});
            let ta = $(".listarfuncionarios").DataTable({
                dom: '<"d-flex justify-content-between"<"#title">ft><t><"d-flex justify-content-between"lp>',

                "language": {
                    "url": "{{asset('traducao/pt-BR.json')}}"
                },
                ajax: {
                    "url":"{{ route('funcionarios.listarfuncionariosajaxgt') }}",
                    "dataSrc": ""
                },
                "lengthMenu": [50,100,150,200,300,500],
                "ordering": false,
                "paging": true,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                columns: [
                    {data:"nome",name:"nome"},
                    {data:"cpf",name:"cpf"},
                    {data:"data_nascimento",name:"data_nascimento"},
                    {data:"cidade",name:"cidade"},
                    {data:"especialidade.nome",name:"especialidade"},
                    {data:"experiencia.nome",name:"experiencia"},
                    {data:"classificacao",name:"classificacao"},
                    {data:"id",name:"editar"},
                    {data:"id",name:"deletar"},
                    
                ],
                "columnDefs": [
                    {
                        "targets": 2,
                        "createdCell": function (td, cellData, rowData, row, col) {
                            let datas = cellData.split("T")[0]
                            let alvo = datas.split("-").reverse().join("/")
                            $(td).html(alvo)    
                        }
                    },
                    {
                        "targets": 6,
                        "createdCell": function (td, cellData, rowData, row, col) {
                            if(cellData == 1) {
                                $(td).html('<span>&#9733;</span>')
                            } else if(cellData == 2) {
                                $(td).html('<span>&#9733;&#9733;</span>')
                            } else {
                                $(td).html('<span>&#9733;&#9733;&#9733;</span>')
                            }
                        }
                    },
                    {
                        "targets": 7,
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).html('<a href="" class="btn btn-info btn-sm editar" data-id='+cellData+'>Editar</a>')    
                        }
                    },
                    {
                        "targets": 8,
                        "createdCell": function (td, cellData, rowData, row, col) {
                            $(td).html('<a href="" class="btn btn-danger btn-sm deletar" data-id='+cellData+'>Deletar</a>')    
                        }
                    }    
                ],
                rowCallback: function (row, data) {
                    
                },
                drawCallback: function () {
                
                },
                "initComplete": function( settings, json ) {
                    $('#title').html("<h4>Listagem de Funcionarios</h4>");
                }
            });

            $('body').on('click','.editar',function(){
                let id = $(this).attr('data-id');
                $("#funcionario_id").val(id);
                $('#editarFuncionario').modal('show')
                return false;
            });

            $('body').on('click','.deletar',function(){
                let id = $(this).attr('data-id');
                $.ajax({
                    method:"POST",
                    data:"id="+id,
                    url:"{{route('funcionarios.deletar')}}",
                    success(res) {
                        ta.ajax.reload();
                        
                    }
                });
                return false;
            }); 

            var table = $('#tabela').DataTable();

            $('table').on('click', 'tbody tr', function () {
                let data = table.row(this).data();
                if(data.classificacao) {
                    if(data.classificacao == 1) {
                        $("#rateYo").rateYo('rating', 1);
                    } else if(data.classificacao == 2) {
                        $("#rateYo").rateYo('rating', 2);
                    } else if(data.classificacao == 3) {
                        $("#rateYo").rateYo('rating', 3);
                    } else {
                        $("#rateYo").rateYo('rating', 0);
                    }
                } 
                $("#nome").val(data.nome);
                $("#nome_pai").val(data.nome_pai);
                $("#nome_mae").val(data.nome_mae);
                $("#data_nascimento").val(data.data_nascimento.split("-").reverse().join("/"));
                $("#cpf").val(data.cpf);
                $("#cidade").val(data.cidade);
                $("#bairro").val(data.bairro);
                $("#logradouro").val(data.logradouro);
                $("#cep").val(data.cep);
                $("#telefone").val(data.telefone);
                $("#complemento").val(data.complemento);
                $("#especialidade_id option[value='"+data.especialidade.id+"']").attr('selected',true);
                $("#experiencia_id option[value='"+data.experiencia_id+"']").attr('selected',true);
            })


        });
    </script>
@stop