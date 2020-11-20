@extends('layouts.app')
@section('title', 'Orçamentos')
@section('content')
@if (session('new_estimate'))
<script>
UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Novo orçamento adicionado', status: 'success', icon: 'check'})
</script>
@endif
@if (session('deleted_estimate'))
<script>
UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Orçamento deletado', status: 'success', icon: 'check'})
</script>
@endif
<div class="uk-container">
	<h3 class="uk-heading-line"><span>Lista de orçamentos</span></h3>
	<div>
		<button class="uk-button uk-button-primary" uk-toggle="target: #filter-modal">Filtrar lista</button>
		<a href="/estimate">
			<button href="asd" class="uk-button uk-button-danger">Remover filtros
			</button>
		</a>
	</div>
	@if(count($filters))
		<div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Filtrando resultados pelos seguintes termos:.</p>
            <ul>
            @foreach($filters as $term => $value)
            	<li>{{$term}}: {{$value}}</li>
            @endforeach
            </ul>
        </div>
    @endif	
	<div>
		<div class="uk-overflow-auto">
    		<table class="uk-table uk-table-hover uk-table-divider">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Valor</th>
                        <th>ações</th>
                    </tr>
                </thead>
                <tbody>
                	@if(count($estimates))
                		@foreach($estimates as $index => $estimate)
                			<tr>
                				<td>{{(($estimates->currentPage() - 1) * 10) + $index+1}}</td>
                				<td class="uk-text-nowrap">{{$estimate->created_at}}</td>
                				<td class="uk-text-truncate description">{{$estimate->description}}</td>
                				<td class="uk-text-nowrap">{{$estimate->customer_name}}</td>
                				<td class="uk-text-nowrap">{{$estimate->vendor_name}}</td>
                				<td class="uk-text-nowrap">R${{$estimate->estimate_value}}</td>
                				<td class="uk-text-nowrap uk-text-center" style="line-height: 1">
                					<button type="submit" class="uk-button uk-button-link" uk-tooltip="Visualizar orçamento">
        								<a href="/estimate/{{$estimate->id}}" uk-icon="icon: search"></a>
									</button>                                	
                               		<form id="delete-form" method="POST" action="/estimate/{{$estimate->id}}" class="uk-inline">
                                   		@csrf
            							@method('DELETE')
            							<button id="confirm-delete" type="button" class="uk-button uk-button-link" uk-tooltip="Remover orçamento">
            								<span class="uk-margin-small-right" uk-icon="icon: trash"></span>
										</button>
                               		</form>			
                                </td>
                			</tr>
                		@endforeach
                	@else
                    <tr>
                    	<td colspan="7" class="uk-text-center">Nenhum orçamento</td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                    	<td colspan="7" class="uk-text-center">
                    	{{count($route_append) ? $estimates->appends($route_append)->links() : $estimates->links()}}
						</td>
                    </tr>
                </tfoot>
            </table>
       </div>
	</div>
	
	
    <!-- Modal for list filter -->
    <div id="filter-modal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
        	<form>
                <h3 class="uk-modal-title">Selecione os campos para filtrar</h2>            
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Vendedor" name="vendor_name">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Cliente" name="customer_name">
                </div>
                <div>
                	<p>Período</p>
                	<div class="date-form-div">
                        <div>de: 
                            <input class="uk-input" type="date" placeholder="De" name="from" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                        </div>
                        <div>até: 
                            <input class="uk-input" type="date" placeholder="Até" name="to" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                        </div>
                    </div>
                </div>
                <hr class="uk-divider-icon">
                <div class="footer">
                	<button class="uk-button uk-modal-close" type="button">cancelar</button>
                	<button type="submit" class="uk-button uk-button-primary" type="button">filtrar</button>
                </div>
        	</form>
        </div>
	</div>
</div>


<script>
UIkit.util.on('#confirm-delete', 'click', function (e) {
   e.preventDefault();
   e.target.blur();
   UIkit.modal.confirm('Deseja realmente apagar esse orçamento?').then(function () {
       document.getElementById('delete-form').submit();
   }, function () {});
});
</script>
@endsection