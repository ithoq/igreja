@extends('admin.partials.master')

{{-- Title da pagina--}}
@section('title_page', 'Sistema Graçã')


@section('head')
    {{--inclusões dentro do head--}}
@endsection

{{-- ARQUIVOS CSS --}}
@push('css')
<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

{{-- Titulo da pagina --}}
@section('page_title' , 'Listagem de Membros' )

{{-- descrição da pagina --}}
@section('page_description', '')



{{-- MAIN --}}

@section('main-content')

    <input id="input-4" name="input4[]" type="file" multiple class="file-loading">
    
    
    <table class="table table-hover table-light" id="membros-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Created_at</th>
                    <th>Ação</th>
                </tr>
            </thead>
        </table>   
    
    <div class="modal fade modal-update-arquivo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="">
                <input id="file-update" name="file-update" type="file"  class="file-loading">
               {{-- <input id="file-update" name="fileupdate" type="file" class="file" >--}}
                <div class="input-group ">
                    <div class="input-group-addon ">
                        <i class="fa fa-user text-danger" aria-hidden="true"></i>
                    </div>
                    <input name="update-nome" type="text" class="form-control " value="" placeholder="Digite o nome do arquivo ...">
                </div>
                <div class="input-group ">
                    <div class="input-group-addon ">
                        <i class="fa fa-user text-danger" aria-hidden="true"></i>
                    </div>
                    <input name="update-desc" type="text" class="form-control " value="" placeholder="Digite a descrição do arquivo ...">
                </div>
                <input type="text" id="update-id" >

            </form>
        </div>
      </div>
    </div>
@endsection




{{-- ARQUIVOS JAVASCRIPTS --}}
@push('scripts')
<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-fileinput/js/fileinput.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-fileinput/js/locales/pt-BR.js') }} " type="text/javascript"></script>
@endpush

@push('scripts-page')

<script>
    
    
    $(function() {
     $('#membros-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! route('datatable_arquivos') !!}',
                error: function() {
                   toastr["error"](" Houve um erro ao buscar os dados, Atualize a página (F5) ")
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nome', name: 'nome' },
                { data: 'descricao', name: 'descricao' },
                { data: 'created_at', name: 'created_at' },
                {data: 'acao', name: 'acao', orderable: false, searchable: false}
            ],
            "language": {
                  "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior"
                  },
                  "emptyTable": "Nenhum cadastros encontrado nessa tabela",
                  "infoEmpty": "Mostrando 0 á 0 de 0 cadastros ",
                  "info": "Mostrando _START_ á _END_ de _TOTAL_ cadastros ",
                  "lengthMenu": "Exibir _MENU_ cadastros ",
                  "search": "Buscar: ",
                  "zeroRecords": "Não existe nenhum resultado para essa busca",
                  "infoFiltered": "(Filto feito no total de  _MAX_  cadastros)"
            },
        dom: 'Bfrtip',
         buttons: [
                 'copy', 'excel', 'pdf'
             ]
        });
        
        
        var footerTemplate = '<div class="file-thumbnail-footer">\n' +
        '   <div style="margin:5px 0">\n' +
        '       <input class="kv-input kv-new form-control input-sm text-center {TAG_CSS_NEW}" value="{caption}" placeholder="Digite um titulo...">\n' +
        '       <input class="kv-input kv-init form-control input-sm text-center {TAG_CSS_INIT}" value="{TAG_VALUE}" placeholder="Digite um titulo...">\n' +
        '   </div>\n' +
        '   {size}\n' +
        '   {actions}\n' +
        '</div>';
        
       
        $("#input-4").fileinput({
            language: "pt-BR",
            uploadUrl: '{!! route('send_arquivos') !!}', // server upload action
            uploadAsync: false,
            showCaption: true,
            maxFileCount: 10,
           // browseOnZoneClick: true,
            layoutTemplates: {footer: footerTemplate, size: '<samp><small>({sizeText})</small></samp>'},
            previewThumbTags: {
                '{TAG_VALUE}': '',        // no value
                '{TAG_CSS_NEW}': '',      // new thumbnail input
                '{TAG_CSS_INIT}': 'hide'  // hide the initial input
            },
            uploadExtraData: function() {  // callback example
                var out = {}, key, i = 0;
                $('.kv-input:visible').each(function() {
                    $el = $(this);
                    key = $el.hasClass('kv-new') ? 'nome_' + i : 'init_' + i;
                    out[key] = $el.val();
                    i++;
                });
                return out;
            },
            allowedFileExtensions: ["jpg", "gif", "png", "txt", "docx","pdf", "xlsx", "xlsx", "xls", "ppt", "mkv",
                                    "rmvb ", "mov", "mpeg","avi", "ogg", "aac", "mp3", "mp4", "zip", "rar"], 
            
        });
        
        $('#input-4').on('filebatchuploadcomplete', function(event, files, extra) {
            toastr["success"]('Upload concluído') 
            $('#input-4').delay( 800 ).fileinput('clear');
        });
        
        $("#file-update").fileinput({
            language: "pt-BR",
            showCaption: true,
            showPreview: false,
            showUpload: false,
        });
      
    });
</script>
@endpush
