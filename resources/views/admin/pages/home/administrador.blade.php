@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Dashboard - Administrador</h1>
    
@stop

@section('content')
    
<section class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$ti}}</h3>
                <p>T.I</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$rh}}</h3>
                <p>Recursos Humanos</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$fi}}</h3>
                <p>Financeiro</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total}}</h3>
                <p>Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</section>

<h3 class="bg-navy text-center rounded">Filtragem por Especialidades</h3>
<section class="row">
    
    <div class="col-6">
        <div class="card card-info">

            
            
                <div class="card-header">
                    <h1 class="card-title">T.I</h1>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

            



            <div class="card-body">

                <table id="tabela_id" class="table table-sm listarfuncionariosti">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            
                            <th>Cidade</th>
                            
                            <th>Experiencia</th>
                        
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>



            </div>



        </div>
              
    </div>
    <div class="col-6">
        <div class="card card-warning">

        <div class="card-header">
                    <h1 class="card-title">Recursos Humanos</h1>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

            <div class="card-body">
            <table id="tabela_rh" class="table table-sm listarfuncionariosrh">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        
                        <th>Cidade</th>
                        
                        <th>Experiencia</th>
                        
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            </div>

            
        </div>             
    </div>  
    
    <div class="col-12">
        <div class="card card-success">
                <div class="card-header">
                    <h1 class="card-title">Financeiro</h1>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>    
                <div class="card-body">
                <table id="tabela_financeiro" class="table table-sm listarfuncionariosfinanceiro">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Cidade</th>
                        <th>Experiencia</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
                </div>
        </div>      
    </div>    
    
</section>
@stop


@section('js')
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $(".listarfuncionariosti").DataTable({
                

                "language": {
                    "url": "{{asset('traducao/pt-BR.json')}}"
                },
                ajax: {
                    "url":"{{ route('funcionarios.listarfuncionariosti') }}",
                    "dataSrc": ""
                },
                "lengthMenu": [50,100,150,200,300,500],
                "ordering": false,
                "paging": false,
                "searching": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                columns: [
                    {data:"nome",name:"nome"},
                    {data:"cpf",name:"cpf"},
                    
                    {data:"cidade",name:"cidade"},
                    
                    {data:"experiencia.nome",name:"experiencia"},
                    
                    
                ],
                "columnDefs": [
                    
                        
                ],
                rowCallback: function (row, data) {
                    
                },
                drawCallback: function () {
                
                },
                "initComplete": function( settings, json ) {
                    
                }
            });



            $('.listarfuncionariosrh').DataTable({
                

                "language": {
                    "url": "{{asset('traducao/pt-BR.json')}}"
                },
                ajax: {
                    "url":"{{ route('funcionarios.listarfuncionariosrh') }}",
                    "dataSrc": ""
                },
                "lengthMenu": [50,100,150,200,300,500],
                "ordering": false,
                "paging": false,
                "searching": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                columns: [
                    {data:"nome",name:"nome"},
                    {data:"cpf",name:"cpf"},
                    
                    {data:"cidade",name:"cidade"},
                    
                    {data:"experiencia.nome",name:"experiencia"},
                    
                    
                ],
                "columnDefs": [
                    
                       
                ],
                rowCallback: function (row, data) {
                    
                },
                drawCallback: function () {
                
                },
                "initComplete": function( settings, json ) {
                    
                }
            });


            $('.listarfuncionariosfinanceiro').DataTable({
                

                "language": {
                    "url": "{{asset('traducao/pt-BR.json')}}"
                },
                ajax: {
                    "url":"{{ route('funcionarios.listarfuncionariosfinanceiro') }}",
                    "dataSrc": ""
                },
                "lengthMenu": [50,100,150,200,300,500],
                "ordering": false,
                "paging": false,
                "searching": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                columns: [
                    {data:"nome",name:"nome"},
                    {data:"cpf",name:"cpf"},
                    
                    {data:"cidade",name:"cidade"},
                    
                    {data:"experiencia.nome",name:"experiencia"},
                    
                    
                ],
                "columnDefs": [
                    
                        
                ],
                rowCallback: function (row, data) {
                    
                },
                drawCallback: function () {
                
                },
                "initComplete": function( settings, json ) {
                    
                }
            });






        })
    </script>
@stop                
