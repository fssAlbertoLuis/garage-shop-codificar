@extends('layouts.app')
@section('title', 'Novo orçamento')
@section('content')
<div class="uk-container">
	<div class="uk-flex-center" uk-grid>
		<div class="uk-width-1-2@m">
        	<h3 class="uk-heading-line"><span><span class="uk-margin-small-right" uk-icon="plus"></span>Novo orçamento</span></h3>
        	<div>
        	<form method="POST" action="/estimate/">
                @csrf
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input @error('customer_name') uk-form-danger @enderror" type="text" placeholder="Nome do cliente" name="customer_name" required value="{{old('customer_name')}}">
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('customer_name')}}</span> @enderror
                </div>
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input @error('vendor_name') uk-form-danger @enderror" type="text" placeholder="Nome do vendedor" name="vendor_name" required value="{{old('vendor_name')}}">
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('vendor_name')}}</span> @enderror
                </div>
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<textarea class="uk-textarea @error('description') uk-form-danger @enderror" rows="3" placeholder="Descrição" name="description" required>{{old('description')}}</textarea>
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('description')}}</span> @enderror
                </div>
                <div class="uk-margin">
                	<div class="uk-inline uk-width-1-1">
                    	<span class="uk-form-icon">R$</span>
                        <input id="currency-input"
                        	class="uk-input @error('estimate_value') uk-form-danger @enderror" type="text"
                        	placeholder="Valor do orçamento" name="estimate_value" required value="{{old('estimate_value')}}">
                    </div>
                    @error('estimate_value') <span class="uk-text-danger">{{$errors->first('estimate_value')}}</span> @enderror
                </div>
                <div class="uk-margin uk-text-center">
                	<button class="uk-button uk-button-primary">Confirmar orçamento</button>
                </div>
            </form>
        	</div>
		</div>
	</div>
</div>
@endsection