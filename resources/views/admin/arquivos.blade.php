@extends('admin.partials.master')

{{-- Title da pagina--}}
@section('title_page', 'Sistema Graçã')


@section('head')
    {{--inclusões dentro do head--}}
@endsection

{{-- ARQUIVOS CSS --}}
@push('css')
<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

{{-- Titulo da pagina --}}
@section('page_title' , 'Listagem de Membros' )

{{-- descrição da pagina --}}
@section('page_description', '')



{{-- MAIN --}}

@section('main-content')
    <table class="table table-hover table-light" id="membros-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Cargo</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
        </table>   
@endsection




{{-- ARQUIVOS JAVASCRIPTS --}}
@push('scripts')
<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }} " type="text/javascript"></script>
@endpush

@push('scripts-page')

<script>
    $(function() {
        $.fn.dataTable.ext.errMode = 'throw';
     $('#membros-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! route('datatable_membros') !!}',
                statusCode: {
                    404: function() {
                       // toastr["error"](" Houve um erro ao buscar os dados, Atualize a página (F5) ")
                    }
                },
                error: function() {
                   toastr["error"](" Houve um erro ao buscar os dados, Atualize a página (F5) ")
                   /* table.destroy();
                    table;*/
                    
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'mem_nome', name: 'mem_nome' },
                { data: 'mem_sexo', name: 'mem_sexo' },
                { data: 'mem_cargo', name: 'mem_cargo' },
                { data: 'mem_status', name: 'mem_status' },
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
            "createdRow": function ( row ) {
            				
                //console.log($('td', row).eq(5).text());
                var valor = $('td', row).eq(4).text()
                if ( valor  == "Ativo") {
                    $('td', row).eq(4).find('span').addClass('label label-sm label-success');
                }
                if ( valor  == "Inativo") {
                    $('td', row).eq(4).find('span').addClass('label label-sm label-warning');
                }
                if ( valor  == "Afastado") {
                    $('td', row).eq(4).find('span').addClass('label label-sm label-danger');
                }
            },
        });
    });
</script>
@endpush
