<!DOCTYPE html>
<!--[if IE 8]> <html lang="pt-br" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="pt-br" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    @include('auth.partials.head')
   
    
    <body class=" login">
        {{-- logo --}}
        <div class="logo">
            <a href="index.html">
                <img src="{{asset('admin/assets/pages/img/logo-big.png')}}" alt="" /> </a>
        </div>
        
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{ url('/login') }}" method="post">
                {{ csrf_field() }}
                <h3 class="form-title">Login de usuario</h3>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="email" value="{{ old('email') }}"/> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div>
                <div class="form-actions">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label>
                   <button type="submit" class="btn green pull-right"> Login </button>
                </div> 
                <div class="login-options">
                    <h4>Ou use sua rede social</h4>
                    <ul class="social-icons social-icons-color">
                        <li>
                            <a class="facebook" data-original-title="facebook" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="twitter" data-original-title="Twitter" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="googleplus" data-original-title="Goole Plus" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="linkedin" data-original-title="Linkedin" href="javascript:;"> </a>
                        </li>
                    </ul>
                </div>
                <div class="forget-password">
                    <h4>Esqueceu a sua senha ?</h4>
                    <p>Não se preocupe, você pode redeefinir ela clicando nesse botão. </p>
                    <p><a href="javascript:;" id="forget-password" class="btn green"> Redefinir senha </a> </p>
                </div>
                <div class="create-account">
                    <p> Ainda não tem uma conta?&nbsp;
                        <a href="{{url('register')}}" id="register-btnZZ" class="btn green btn-block"> Crie sua conta agora mesmo, é bem simples</a>
                    </p>
                </div>
            </form>

            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="{{ url('/password/reset') }}" method="post">
                <h3>Esqueceu a senha  ?</h3>
                <p> Insira seu e-mail de acesso que iremos te enviar um e-mail para redefinir a senha </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn red btn-outline">Volta </button>
                    <button type="submit" class="btn green pull-right"> Enviar </button>
                </div>
            </form>


        </div>

        <div class="copyright"> 2016 &copy; Graça Sistemas de Gestão para igrejas - Todos direitos reservados. </div>
    
        @include('auth.partials.scripts')
    </body>

</html>
