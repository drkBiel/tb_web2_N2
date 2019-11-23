<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
        <!-- Favicon -->
        <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" /> 
        <link href="{{URL::asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" /> 

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('js/ajax.js')}}"></script>
        <script src="{{URL::asset('js/lightbox.js')}}"></script>

    </head>
    <body>
    
        <nav class="navbar navbar-inverse navbar-fixed-top">       
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav" id="link-white">
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{url('/')}}" title="Página Inicial" style="margin-top: -3px">

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/home" style="text-decoration: none"> 
                            <h4> <span id="underline"> Projetos</span></h4> 
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a href="/myProjects" style="text-decoration: none"> 
                        <h4> <span id="underline"> Meus projetos</span></h4> 
                        </a>
                    </li>  
                    
                    <li>
                        <a href="/logout" style="text-decoration: none"> 
                            <h4>
                                <span class="glyphicon glyphicon-log-in"></span>  
                                <span id="underline">Sair</span>
                            </h4>
                        </a>
                    </li>  
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </div>       
        </nav>



        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" 
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
        @endif

        

        <div id="line-one">   
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center"> 
                        <h1><b>Projetos</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                                            
                            <li class="active">Projetos</li>
                        </ol>
                        <br>
                        <a class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#modalExemplo">
                            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                        <a href="" 
                           class="btn btn-default btn-sm pull-right">
                            <i class="fa fa-book"></i> Relatório</a>
                        <div id="pesquisa" class="pull-right">
                            <form class="form-group" action="{{route('project.filter')}}">                                   
                                <input type="text" name="pesquisa" class="form-control input-sm pull-left" placeholder="Pesquisar por nome..." required> 
                                <button class="btn btn-default btn-sm pull-right" id="color"> 
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </form>
                        </div>
                    </div>           
                </div>
                


            
                <div class="row">
                    <div class="col-md-12">   
                        <br />
                        <h4 id="center"><b>MEUS PROJETOS</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="center">Código</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                        <th>Tempo</th>                
                                        <th id="center">Imagem</th>
                                         <th id="center">Apoiador</th>                
                                        <th id="center">Ações</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($project as $project)

                                    
                                    @if (Auth::id() == $project->id_User )
                                                                     

                                    <tr id="testeProjetos{{$project->id}}">

                                        @if ($project->finalizado == 1)
                                            
                                            <style> 
                                            #testeProjetos{{$project->id}} {
                                                color: red;
                                            }

                                            #apoiar_p{{$project->id}} {
                                                color: red;
                                            }

                                            #editar_p{{$project->id}} {
                                                color: red;
                                            }

                                            </style>

                                            
                                        @endif

                                        <!-- Modal Editar -->
                                    <div class="modal fade" id="modalEdit_p{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h3 class="modal-title" id="exampleModalLabel" align="center" style="margin-top: 2%;"> Editar projeto</h3>
                                            </div>
                                            
                                            <form action="{{route('project.edit', $project->id)}}">
                                                <div class="modal-body" style="margin-left: 5%; margin-right: 5%;">
                                                    <div class="row" style="margin-top: 2%;">
                                                        <div class="col-xs-12">
                                                            <h4>Nome:</h4> <input class="form-control" name="name" placeholder="Nome" value="{{$project->name}}">  
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top: 2%;">
                                                        <div class="col-xs-12">
                                                            <h4>Descrição:</h4> <textarea class="form-control" name="description" placeholder="Nome" style="height: 100px; resize: none;"> {{$project->description}} </textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 4%;">
                                                        <div class="col-xs-6">
                                                            <h4>Custo:</h4> <input type="text" name="value" class="form-control" value="{{$project->value}}" placeholder="Nome">
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <h4>Tempo de desenvolvimento:</h4> <input type="text" name="temp" value="{{$project->temp}}" class="form-control" placeholder="Nome">
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 4%;">
                                                        <div class="col-xs-6">
                                                            <h4>1ª Foto:</h4> <input type="file" name="imagem" value="{{$project->imagem}}" class="form-control">
                                                        </div>

                                                        <div class="col-xs-6">
                                                            <h4>2ª Foto:</h4> <input type="file" class="form-control" value="{{$project->imagem}}" placeholder="Nome">
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center" >
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-success">Confirmar</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                        <td id="center">{{$project->id}} </td>
                                        <td title="Nome">{{$project->name}}</td>
                                        <td title="Descrição">{{$project->description}}</td>
                                        
                                        <td title="Valor">R$ {{number_format($project->value, 2,',','.')}}</td> 
                                        
                                        <td title="Tempo">{{$project->temp}}</td>
                                        
                                        <td id="center">
                                            <a href="{{URL::asset('projects/'. '1' . $project->imagem)}}" 
                                               data-lightbox="{{URL::asset('project/'. '1' . $project->imagem)}}">
                                                <img src="{{URL::asset('projects/'. $project->imagem)}}" />
                                            </a>
                                        </td>
                                        
                                        <td title="Apoiador">{{$project->supporter}}</td>
                                        
                                        <td id="center">
                                            
                                            @if (Auth::user()->id == $project->id_User)
                                            
                                            @if($project->finalizado == 0)
                                            <a title="Alterar"  data-toggle="modal" data-target="#modalEdit_p{{$project->id}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            &nbsp;
                                            @endif


                                            @if($project->finalizado == 1)
                                            <a title="Alterar" id="editar_p{{$project->id}}" onclick="alert('Projeto finalizado, não é possivel editar')">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            &nbsp;
                                            @endif
                                            

                                            <form style="display: inline-block;" method="POST" action="{{route('project.destroy', $project->id)}}" data-toggle="tooltip" data-placement="top"title="Finish" 
                                                        onsubmit="return confirm('Confirma exclusão?')">
                                                
                                                {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                                <button type="submit" style="background-color: #fff">
                                                    <a><i class="fa fa-trash-o"></i></a>                                                    
                                                </button>
                                            </form>
                                            
                                            @if($project->finalizado == 0)
                                            &nbsp;
                                            <form style="display: inline-block;" method="get" action="{{route('project.finish', $project->id)}}" data-toggle="tooltip" data-placement="top"title="Finish" 
                                                        onsubmit="return confirm('Confirma finalização do projeto: {{$project->name}}?')">
                                                
                                                
                                                <button type="submit" style="background-color: #fff">
                                                    <a><i class="fa fa-ban"></i></a>                                                    
                                                </button>
                                                
                                            </form>
                                            @endif


                                            @endif
                                            
                                            &nbsp;
                                            @if($project->finalizado == 1)
                                            <a title="Apoiar" id="apoiar_p{{$project->id}}" onclick="alert('Projeto finalizado, não é possivel apoiar.')">
                                                <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @endif

                                            @if($project->finalizado == 0)
                                            <a title="Apoiar" id="apoiar_p{{$project->id}}" data-toggle="modal" data-target="#modalApoiador_p{{$project->id}}">
                                                <i class="fa fa-thumbs-up"></i>
                                            </a>
                                            @endif
                                            
                                            
                                        </td>
                                    </tr>

                                    


                                    <div class="modal fade" id="modalApoiador_p{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="modalApoiador" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h3 class="modal-title" id="exampleModalLabel" align="center" style="margin-top: 2%;"> Apoiar projeto</h3>
                                            </div>
                                            
                                            <form action="{{route('project.support', $project->id)}}">
                                                <div class="modal-body" style="margin-left: 5%; margin-right: 5%;">
                                                    <div class="row" style="margin-top: 2%;">
                                                        <div class="col-xs-8">
                                                            <h4>Nome:</h4> <input class="form-control" name="nameSupporter" placeholder="Nome do apoiador">  
                                                        </div>

                                                        <div class="col-xs-4">
                                                            <h4>Valor:</h4> <input type="number" name="value" placeholder="Valor a contribuir" class="form-control" placeholder="Nome">
                                                            <input type="hidden" name="name" value="{{$project->name}}">
                                                            <input type="hidden" name="imagem" value="img">
                                                            <input type="hidden" name="description" value="{{$project->description}}">
                                                            <input type="hidden" name="temp" value="{{$project->temp}}">
                                                        </div>
                                                    </div>

                                                    

                                                </div>
                                                <div class="modal-footer d-flex justify-content-center" >
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-up"></i> Confirmar apoio</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    

                                    
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel" align="center" style="margin-top: 2%;"> Novo projeto</h3>
                    </div>
                    <form action="{{route('project.create')}}">
                        <div class="modal-body" style="margin-left: 5%; margin-right: 5%;">
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-xs-12">
                                    <h4>Nome:</h4> <input type="text" class="form-control" name="name" placeholder="Nome">
                                    <input type="hidden" name="idUser" value="{{Auth::id()}}">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-xs-12">
                                    <h4>Descrição:</h4> <textarea class="form-control" name="description" placeholder="Nome" style="height: 100px; resize: none;"></textarea>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 4%;">
                                <div class="col-xs-6">
                                    <h4>Custo:</h4> <input type="text" name="value" class="form-control" placeholder="Nome">
                                </div>
                                <div class="col-xs-6">
                                    <h4>Tempo de desenvolvimento:</h4> <input type="text" name="temp" class="form-control" placeholder="Nome">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 4%;">
                                <div class="col-xs-6">
                                    <h4>1ª Foto:</h4> <input type="file" name="imagem" class="form-control">
                                </div>

                                <div class="col-xs-6">
                                    <h4>2ª Foto:</h4> <input type="file" class="form-control" placeholder="Nome">
                                </div>
                            </div>
                           
                        </div>
                        <div class="modal-footer d-flex justify-content-center" >
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>

                    </form>
                </div>
            </div>

            
            </div>

            <img src="{{URL::asset('img/subir.png')}}" 
                 id="up" 
                 style="display: none;" 
                 alt="Ícone Subir ao Topo" 
                 title="Subir ao topo?">
            </body>


            </html>

