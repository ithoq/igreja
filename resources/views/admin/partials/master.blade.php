<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="pt-br" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="pt-br" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
<!--<![endif]-->

@include('admin.partials.head') {{-- HEAD --}}

<body class="page-sidebar-closed-hide-logo page-content-white page-md  pace-done page-header-fixed page-sidebar-fixed">

    <div class="page-wrapper">
    
        @include('admin.partials.topo')
    
        <div class="page-container">
            @include('admin.partials.menu-sidebar')
            <!-- BEGIN CONTAINER -->
            <div class="page-content-wrapper">
                <div class="page-containerAAA">
                    
                   
                    
                    <div class="page-content">
                        {{-- Temas  tratar isso deposis
                        @include('admin.partials.temas')
                        --}}
                        {{-- Brandscrubs --}}
                         <div class="page-bar">
                             <ul class="page-breadcrumb">
                                 <li>
                                     <a href="index.html">Home</a>
                                     <i class="fa fa-circle"></i>
                                 </li>
                                 <li>
                                     <span>Dashboard</span>
                                 </li>
                             </ul>
                             <div class="page-toolbar">
                                 <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                     <i class="icon-calendar"></i>&nbsp;
                                     <span class="thin uppercase hidden-xs"></span>&nbsp;
                                     <i class="fa fa-angle-down"></i>
                                 </div>
                             </div>
                         </div>
                        
                        {{-- TITULOS DAS PAGINAS --}}
                          <h1 class="page-title"> @yield('page_title',' ')
                              <small> @yield('page_description',' ')</small>
                          </h1>
                        
                        @yield('main-content') {{-- CONTEUDO DA PAGINA AQUI --}}
                    </div>
                    {{-- SIDE BAR RIGHT --}}
                    @include('admin.partials.sidebar-right')
                    
                </div>
            </div>
        </div>
        
    </div>

  


<!-- BEGIN FOOTER -->
 @include('admin.partials.footer')
<!-- END FOOTER -->



@include('admin.partials.scripts')

@stack('scripts-page')
    
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

    {{--
    
    toastr["success"]('sssssssss' ,'ola') 
    toastr["info"]("My name is Inigo Montoya. You killed my father. Prepare to die!")
    toastr["warning"]("My name is Inigo Montoya. You killed my father. Prepare to die!")
    toastr["error"]("My name is Inigo Montoya. You killed my father. Prepare to die!")
    --}}
</body>

</html>
