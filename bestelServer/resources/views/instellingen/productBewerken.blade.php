@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Aanpassen</h1>
            <div class="panel-body">
	            <form method="POST" action="bewerken">
	            	{{ method_field('patch') }}
	            	<div class="form-group">
				    	<label for="naam">Naam</label>
				    	<input type="text" class="form-control" id="naam" name="naam" aria-describedby="naam" placeholder="Naam" value="{{$product->naam}}">
				  	</div>
				  	<div class="form-group">
				    	<label for="prijs">Prijs</label>
				    	<input type="text" class="form-control" id="prijs" name="prijs" aria-describedby="prijs" placeholder="Prijs" value="{{$product->prijs}}">
				    	<small id="naamHelp" class="form-text text-muted">Gebruik een . als komma!</small>
				  	</div>
				  	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
				  	<div class="form-group">
				  		<button type="submit" class="btn btn-primary">Item aanpassen</button>
				  	</div>
	            </form>
	            @if (count($errors))
            	<ul>
            	@foreach ($errors->all() as $error)
            		<li>{{$error}}</li>
            	@endforeach
            	</ul>
            @endif
            </div>
        </div>
    </div>
</div>

@endsection
