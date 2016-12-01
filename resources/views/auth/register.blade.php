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

            <!-- BEGIN REGISTRATION FORM -->
            <form action="{{ url('/register') }}" method="post">
                {{ csrf_field() }}
                <h3>Registre-se</h3>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Nome Completo</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Nome Completo" name="name" value="{{ old('name') }}"> </div>
                </div>
                
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email"  name="email" value="{{ old('email') }}" required> </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Endereço</label>
                    <div class="input-icon">
                        <i class="fa fa-location-arrow"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Endereço" name="endereco" value="{{ old('endereco') }}"/> </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Cidade</label>
                    <div class="input-icon">
                        <i class="fa fa-location-arrow"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Cidade" name="cidade" value="{{ old('cidade') }}"/> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Estado</label>
                    <select name="estado" id="country_list" class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="estado">Selecione o Estado</option> 
                        <option value="ac">Acre</option> 
                        <option value="al">Alagoas</option> 
                        <option value="am">Amazonas</option> 
                        <option value="ap">Amapá</option> 
                        <option value="ba">Bahia</option> 
                        <option value="ce">Ceará</option> 
                        <option value="df">Distrito Federal</option> 
                        <option value="es">Espírito Santo</option> 
                        <option value="go">Goiás</option> 
                        <option value="ma">Maranhão</option> 
                        <option value="mt">Mato Grosso</option> 
                        <option value="ms">Mato Grosso do Sul</option> 
                        <option value="mg">Minas Gerais</option> 
                        <option value="pa">Pará</option> 
                        <option value="pb">Paraíba</option> 
                        <option value="pr">Paraná</option> 
                        <option value="pe">Pernambuco</option> 
                        <option value="pi">Piauí</option> 
                        <option value="rj">Rio de Janeiro</option> 
                        <option value="rn">Rio Grande do Norte</option> 
                        <option value="ro">Rondônia</option> 
                        <option value="rs">Rio Grande do Sul</option> 
                        <option value="rr">Roraima</option> 
                        <option value="sc">Santa Catarina</option> 
                        <option value="se">Sergipe</option> 
                        <option value="sp">São Paulo</option> 
                        <option value="to">Tocantins</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Senha</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Senha" name="password" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Confirme a senha</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirme a senha" name="password_confirmation" /> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="termo" />Eu aceito
                        <a href="javascript:;">os termos de serviço </a> &
                        <a href="javascript:;">politica de privacidade </a>
                        <span></span>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div>
                <div class="form-actions">
                    <a href="{{ url('login') }}" id="register-back-btn" class="btn red btn-outline">Voltar</a>
                    <button type="submit" id="register-submit-btn" class="btn green pull-right"> Logar </button>
                </div>
            </form>

        </div>

        <div class="copyright"> 2016 &copy; Graça Sistemas de Gestão para igrejas - Todos direitos reservados. </div>
    
        @include('auth.partials.scripts')
    
        {{--Mensagens de Erros --}}
          @if (count($errors) > 0)
              @foreach ($errors->all() as $error)
                  <script>toastr["error"](" {{$error }} ")</script>
              @endforeach
          @endif
          
  
          {{--Mensagens de Success --}}
          @if (session('success'))
              <script>toastr["success"]("{{ session('success') }} ")</script>
          @endif
    
    <script >
        
        
      

      
    </script>
    </body>

</html>
