@extends('layouts.app')
@section('title', 'Orçamento #'.$estimate->id)
@section('content')
@if (session('updated_estimate'))
<script>
UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Orçamento atualizado', status: 'success', icon: 'check'})
</script>
@endif
<div class="uk-container">
	<div class="uk-flex-center" uk-grid>
		<div class="uk-width-1-2@m">
        	<h3 class="uk-heading-line"><span><span class="uk-margin-small-right" uk-icon="pencil"></span>Orçamento #{{$estimate->id}}</span></h3>
        	<p class="uk-text-meta">
        		Criado em: {{$estimate->created_at}}
        	</p>
        	<div>
        	<form method="POST" action="/estimate/{{$estimate->id}}">
                @csrf
                @method('PUT')
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input 
                        	class="uk-input @error('customer_name') uk-form-danger @enderror" type="text" 
                        	placeholder="Nome do cliente" name="customer_name" required value="{{old('customer_name') ? old('customer_name') : $estimate->customer_name}}">
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('customer_name')}}</span> @enderror
                </div>
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input 
                        	class="uk-input @error('vendor_name') uk-form-danger @enderror" type="text" 
                        	placeholder="Nome do vendedor" name="vendor_name" required value="{{old('vendor_name') ? old('vendor_name') : $estimate->vendor_name}}">
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('vendor_name')}}</span> @enderror
                </div>
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<textarea 
                    		class="uk-textarea @error('description') uk-form-danger @enderror" rows="3" 
                    		placeholder="Descrição" name="description" required>{{old('description') ? old('description') : $estimate->description}}</textarea>
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('description')}}</span> @enderror
                </div>
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<span class="uk-form-icon">R$</span>
                        <input id="currency-input"
                        	class="uk-input @error('estimate_value') uk-form-danger @enderror" type="text" 
                        	placeholder="Valor do orçamento" name="estimate_value" required value="{{old('estimate_value') ? old('estimate_value') : $estimate->estimate_value}}">
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('estimate_value')}}</span> @enderror
                </div>
                <div class="uk-margin uk-text-center">
                	<button class="uk-button uk-button-primary">Editar orçamento</button>
                </div>
            </form>
        	</div>
		</div>
	</div>
</div>
@endsection