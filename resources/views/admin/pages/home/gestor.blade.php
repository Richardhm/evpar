@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('plugins.Chartjs', true)
@section('content_header')
    <h1>Dashboard - Gestor</h1>
    
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

<section>
    <h3 class="text-center bg-navy my-5">Graficos Por Especialidades</h3>
    <section class="grafico_anual" style="width:100%;height:400px;margin-bottom:20px;">
            
            <canvas id="anual" width="1400" height="350" 
                data-label-anual="{{$anualLabel}}" 
                data-label-anual-quantidade_rh="{{$anualQuantidaderh}}"
                data-label-anual-quantidade_ti="{{$anualQuantidadeti}}"
                data-label-anual-quantidade_fi="{{$anualQuantidadefi}}"
                
            ></canvas>
        </section>
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

            let anual = $("#anual") 
            new Chart(anual, {
                type: 'bar',
                data: {
                    labels: anual.data('label-anual').split("|"),
                    datasets: [{
                        label: 'Recursos Humanos',
                        data: [anual.data('label-anual-quantidade_rh')],
                        backgroundColor: [
                            'rgba(80, 200, 30, 0.2)'
                        ],
                        borderColor: [
                            'rgba(0,0,0,1)'
                            
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'TI',
                        data: [anual.data('label-anual-quantidade_ti')],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                            
                        ],
                        borderColor: [
                            'rgba(0,0,0,1)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Financeiros',
                        data: [anual.data('label-anual-quantidade_fi')],
                        backgroundColor: [
                            'rgba(30,144,255, 0.2)'
                            
                        ],
                        borderColor: [
                            'rgba(0,0,0,1)'
                        ],
                        borderWidth: 1
                    }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
                }
            });






            $(".listarfuncionariosti").DataTable({
                

                "language": {
                    "url": "{{asset('traducao/pt-BR.json')}}"
                },
                ajax: {
                    "url":"{{ route('funcionarios.listarfuncionariostigt') }}",
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
                    "url":"{{ route('funcionarios.listarfuncionariosrhgt') }}",
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
                    "url":"{{ route('funcionarios.listarfuncionariosfinanceirogt') }}",
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
