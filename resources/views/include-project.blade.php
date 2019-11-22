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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />       

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('js/ajax.js')}}"></script>        
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">       
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}" 
                   title="Página Inicial" style="margin-top: -3px">
                                    
                    <li><a href="#" 
                           style="text-decoration: none">
                            <span class="glyphicon glyphicon-log-in"></span> 
                            <span id="underline">Sair</span></a></li>  
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
              </div>   
        </nav> 
        <br><br>      
        <div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center">              
                        <h1><b></b></h1>
                        <br>
                    </div>
                </div>
            
                <div class="row">  
                    <br>
                    <center><h3 id="center"><b>CADASTRO DE PROJETOS</b></h3></center>
                    <br> 
                    <form method="post" 
                          action="{{route('project.store')}}" 
                          enctype="multipart/form-data">
                       
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto"> Foto </label>
                                <input type="text" name="imagem"
                                       accept=".gif,.jpg,.png"
                                       class="form-control"
                                       data-toggle="tooltip" 
                                       data-placement="top"
                                       title="Usar arquivo com dimensões 300x300 
                                       - JPG, GIF, PNG">
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" name="description" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                                       

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="value"> Valor </label>
                                <input type="text" name="value"                               
                                       class="form-control">
                            </div>
                        </div>  

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="temp">Tempo</label>
                                <input type="text" name="temp" 
                                       class="form-control" 
                                       required>                     
                        <div class="col-md-12"> 
                            <br><br>

                            <center>
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Cadastrar
                            </button></center>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </body>
</html>