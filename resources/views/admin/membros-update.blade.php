@extends('admin.partials.master')

{{-- Title da pagina--}}
@section('title_page', 'Sistema Graçã')


@section('head')
    {{--inclusões dentro do head--}}
@endsection

{{-- ARQUIVOS CSS --}}
@push('css')
@endpush

{{-- Titulo da pagina --}}
@section('page_title' , 'Atualizar  Membros' )

{{-- descrição da pagina --}}
@section('page_description', '')

{{-- MAIN --}}
@section('main-content')
  
    <div class="row">
            <form  id="form_cadastro" method="POST" enctype="multipart/form-data" action="{{ route('update_membros') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div id="rootwizard">
                            {{-- TABS --}}
                            <ul class="wizardbar">
                                <li class="wizardbar-item"><a href="#tab1" data-toggle="tab">Dados Pessoais</a></li>
                                <li class="wizardbar-item"><a href="#tab2" data-toggle="tab">Dados Profissionais</a></li>
                                <li class="wizardbar-item"><a href="#tab3" data-toggle="tab">Dados Adicionais</a></li>
                            </ul>
                            {{-- PROGRESSBAR --}}
                            <div id="bar" class="progress progress-striped active">
                                <div class="bar progress-bar progress-bar-info  progress-bar-striped active"></div>
                            </div>
    
                            {{-- CONTEUDO --}}
                            <div class="tab-content col-md-12 nav-tabs-custom">
                                {{-- PESSOAIS --}}
                                <div class="tab-pane " id="tab1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Status.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </div>
                                                <select name="mem_status" class="form-control select2">
                                                    <option value="{{$data->mem_status }}">{{$data->mem_status }}</option>
                                                    <option value="Ativo">Ativo</option>
                                                    <option value="Inativo" >Inativo</option>
                                                    <option value="Afastado" >Afastado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nome completo.</label>
                                            <div class="input-group {{ $errors->has('mem_nome') ?  "has-error" : "" }}">
                                                <div class="input-group-addon ">
                                                    <i class="fa fa-user text-danger" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_nome" type="text" class="form-control " value="{{$data->mem_nome }}" placeholder="Digite o nome completo ...">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Sexo.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                </div>
                                                <select name="mem_sexo" class="form-control select2">
                                                    <option selected="selected" value="{{$data->mem_sexo }}">{{$data->mem_sexo }}</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F" >Feminino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Data de nascimento.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input name="mem_nascimento" type="text" class="form-control" value="{{App\Helpers\Helpers::dateToBR($data->mem_nascimento) }}" placeholder="DD/MM/AAAA" input-mask="data">
                                            </div>
    
                                        </div>
                                        <div class="col-md-6">
                                            <label>Estado civil.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </div>
                                                <select name="mem_estado_civil" class="form-control select2">
                                                    <option value="{{$data->mem_estado_civil }}">{{$data->mem_estado_civil }}</option>
                                                    <option value="Solteiro">Solteiro</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Viúvo">Viúvo</option>
                                                    <option value="Desquitado">Desquitado</option>
                                                    <option value="Divorciado">Divorciado</option>
                                                    <option value="Amasiado">Amasiado</option>
                                                    <option value="Separado">Separado</option>
                                                </select>
                                            </div>
    
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cônjuge</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_nome_conjuge" type="text" class="form-control" value="{{$data->mem_nome_conjuge }}" placeholder="Digite o nome do(a)  esposa/marido">
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <label>CEP.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_cep_endereco" type="text" class="form-control get-cep_js" value="{{$data->mem_cep_endereco }}" placeholder="Digite o CEP da residência" input-mask="cep">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Endereço.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_endereco" type="text" class="form-control" value="{{$data->mem_endereco }}" placeholder="Rua, Viela, Praça,Travessa ...">
                                            </div>
    
                                        </div>
                                        <div class="col-md-6">
                                            <label>Número da residencia.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_numero_endereco" type="number" class="form-control" value="{{$data->mem_numero_endereco }}" placeholder="Digite o número  da residência...">
                                            </div>
    
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cidade.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_cidade_endereco" type="text" class="form-control" value="{{$data->mem_cidade_endereco }}" placeholder="Cidade ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>UF.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_estado_endereco" type="text" class="form-control" value="{{$data->mem_estado_endereco }}" placeholder="SP, BA, CE, RJ ...">
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <label>CPF.</label>
                                            <div class="input-group {{ $errors->has('mem_cpf') ?  "has-error" : "" }}">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user text-danger" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_cpf" type="text" class="form-control" value="{{$data->mem_cpf }}" placeholder="Digite o CPF do membro" input-mask="cpf">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>RG.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_rg" type="text" class="form-control" value="{{$data->mem_rg }}" placeholder="Digite seu RG ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Celular.</label>
                                            <div class="input-group {{ $errors->has('mem_tel_celular') ?  "has-error" : "" }}">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone text-danger" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_tel_celular" type="text" class="form-control" value="{{$data->mem_tel_celular }}" placeholder="Digite o telefone de contato do membro" input-mask="tel">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Telefones residenciais</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_tel_residencia" type="text" class="form-control" value="{{$data->mem_tel_residencia }}" placeholder="Digite o telefone de contato residêncial do membro" input-mask="tel">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>E-mail</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_email" type="email" class="form-control" value="{{$data->mem_email }}" placeholder="Digite o e-mail de contato do membro" >
                                            </div>
    
                                        </div>
                                        <div class="col-md-6">
                                            <label>Conhecido por:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_apelido" type="text" class="form-control" value="{{$data->mem_apelido }}" placeholder="Digite o apelido se houver">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nome do pai.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-male" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_nome_pai" type="text" class="form-control" value="{{$data->mem_nome_pai }}" placeholder="Digite o nome do pai do membro">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nome da mãe</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-female" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_nome_mae" type="text" class="form-control" value="{{$data->mem_nome_mae }}" placeholder="Digite o nome do mãe do membro">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- PROFISIONAIS --}}
                                <div class="tab-pane" id="tab2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Empresa onde trabalha.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <input name="mem_nome_empresa" type="text" class="form-control" value="{{$data->mem_nome_empresa }}" placeholder="Digite aqui o nome da empresa">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Telefone da empresa.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input name="mem_tel_empresa" type="text" class="form-control" value="{{$data->mem_tel_empresa }}" placeholder="Digite aqui o telefone da empresa" input-mask="tel">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Profisão.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <input name="mem_profissao" type="text" class="form-control" value="{{$data->mem_profissao }}" placeholder="Digite a profisão que exerce na empresa">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ADICIONAIS --}}
                                <div class="tab-pane" id="tab3">
                                    <div class="row">
    
                                        <div class="col-md-3">
                                            <div class="box box-primary">
                                                <div class="box-body box-profile text-center">
                                                    <div id="image-holder" >
                                                        <img class="profile-user-img img-responsive img-circle" src=" {{ !empty($data->mem_foto)? asset('storage/images/'.$data->mem_foto) : asset('admin/assets/global/img/avatar-default.jpg') }}" alt="User profile picture">
                                                    </div>
                                                    <h3 class="profile-mem_foto text-center">{{$data->mem_nome }}</h3>
                                                    <p class="text-muted text-center">{{$data->mem_cargo }}</p>
                                                    <input name="foto_upload" value="{{$data->mem_foto }}" type="file" id="file-1" class="inputfile-custom inputfile-1 hidden" data-multiple-caption="{count} files selected"/>
                                                    <label class="btn bg-primary" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Escolha uma foto</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <label>Cargo/ Ministerio.</label>
                                            <div class="input-group {{ $errors->has('mem_cargo') ?  "has-error" : "" }}">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-heart text-danger" aria-hidden="true"></i>
                                                </div>
                                                <input name="mem_cargo" type="text" class="form-control" value="{{$data->mem_cargo }}" placeholder="Digite o cargo que exerce na congregação">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <label>Batizado em.</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input name="mem_data_batismos" type="text" class="form-control" value="{{App\Helpers\Helpers::dateToBR($data->mem_data_batismos) }}" placeholder="Digite a data de batismo" input-mask="data">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-success pull-right">Cadastrar</button>
                                    </div>
                                </div>
                                {{-- CONTROLES --}}
                                <ul class="pager wizard">
                                    <li class="previous first" style="display:none;"><a href="#">Dados pessoais</a></li>
                                    <li class="previous"><a href="#" class="btn green m-icon"><i class="m-icon-swapleft m-icon-white"></i> Anterior</a></li>
                                    <li class="next"><a href="#" class="btn green m-icon">Próximo <i class="m-icon-swapright m-icon-white"></i></a></li>
                                    <li class="next last" style="display:none;"><a href="#">Dados adicionais</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="{{$data->id }}">
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id  }}">
                <input type="hidden" disabled name="token" id="token" value="{{ str_random(40) }}">
                <input type="hidden" disabled name="base_url" id="base_url" value="{{ url('/') }}">
            </form>
    
        </div>  
    
@endsection




{{-- ARQUIVOS JAVASCRIPTS --}}
@push('scripts')
<script src="{{asset('admin/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/global/plugins/clipboardjs/clipboard.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/global/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/global/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script>
@endpush

@push('scripts-page')

<script>

    $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        $('#rootwizard').find('.bar').css({width:$percent+'%'});
    }});
    
    $('.has-error').pulsate({
        color: "#ff0000"
    });


    //global.input_mask();
    global.input_file_custom();
    global.plugin_clipboard();
    global.auto_completre_cep();
    global.preview_upload();
    global.gera_link();
</script>
@endpush
