<!DOCTYPE html>
<html>
<head>
    <title>Halaman - Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
 <div class="container">    
        <div id="loginbox" style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
               
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:{{$errors->any() ? 'block' : 'none'}};" id="login-alert" class="alert alert-danger col-sm-12">Username Atau Password Salah</div>
                            
                        <form id="loginform" class="form-horizontal" method="post" role="form" action="{{route('login')}}">
                                   @csrf 
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username"  type="text" class="form-control" name="email" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" name="password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    

                            <button type="submit" class="btn btn-sm btn-success shadow-sm btn-block">Login</button>


                                
                            </form>     



                        </div>                     
                    </div>  
        </div>
       
    </div>
    
</body>
</html>