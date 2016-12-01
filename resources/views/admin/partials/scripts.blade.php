<!--[if lt IE 9]>
<script src="{{ asset('admin/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/js.cookie.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }} " type="text/javascript"></script>
<script src="{{asset('admin/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/pages/scripts/ui-toastr.min.js')  }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/pace/pace.min.js') }} " type="text/javascript"></script>
{{--<script src="{{ asset('admin/assets/global/plugins/jquery.blockui.min.js') }} " type="text/javascript"></script>--}}
{{--<script src="{{ asset('admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }} " type="text/javascript"></script>--}}
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('admin/assets/global/scripts/app.min.js') }} " type="text/javascript"></script>
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('admin/assets/layouts/layout/scripts/layout.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/layouts/layout/scripts/demo.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/layouts/global/scripts/quick-sidebar.min.js') }} " type="text/javascript"></script>
{{--<script src="{{ asset('admin/assets/layouts/global/scripts/quick-nav.min.js') }} " type="text/javascript"></script>--}}
<script src="{{ asset('admin/assets/global/scripts/js/global.js')  }}" type="text/javascript"></script>
<script src="{{ asset('admin/global/js/global.js') }} " type="text/javascript"></script>
@stack('scripts')
