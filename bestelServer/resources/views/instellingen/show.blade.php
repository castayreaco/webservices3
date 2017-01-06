@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Instellingen</h1>
            <h2>{{ $winkel->naam }}</h2>
            <div class="panel-body">
            	<h3>DETAILS</h3>
            		<ul class="list-group">
					  	<li class="list-group-item">Naam: {{$winkel->naam}}</li>
					  	<li class="list-group-item">Adres: {{$winkel->adres}}</li>
					  	<li class="list-group-item">Tel: {{$winkel->tel}}</li>
					  	<li class="list-group-item">E-mail: {{$winkel->mail}}</li>
					</ul>
            	<h3>PRODUCTEN</h3>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Prijs</th>
                            <th>Bewerken</th>
                            <th>Verwijderen</th>
                        </tr>
                    </thead>

		            @foreach ($winkel->winkelItems as $item)
		            	<tr class="odd gradeX">
	                        <td>{{ $item->naam }}</td>
	                        <td>{{ $item->prijs }}</td>
	                        <td><a href="product/{{$item->id}}/bewerken" class="btn btn-primary">Bewerken</a></td>
	                        <td>
	                        	<form method="POST" action="{{ $winkel->id}}/removeWinkelItems">
	                        		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
	                        		<input type="hidden" name="id" value="{{ $item->id }}">
	                        		<button type="submit" class="btn btn-danger">Verwijderen</button>
	                        	</form>
	                        </td>
                        </tr>
		            @endforeach
		        </table>
            <hr>
            <h3>Product Toevoegen</h3>
            <form method="POST" action="{{ $winkel->id }}/winkelItems">
            	<div class="form-group">
			    	<label for="naam">Naam</label>
			    	<input type="text" class="form-control" id="naam" name="naam" aria-describedby="naam" placeholder="Naam">
			  	</div>
			  	<div class="form-group">
			    	<label for="prijs">Prijs</label>
			    	<input type="text" class="form-control" id="prijs" name="prijs" aria-describedby="prijs" placeholder="Prijs">
			    	<small id="naamHelp" class="form-text text-muted">Gebruik een . als komma!</small>
			  	</div>
			  	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-primary">Item toevoegen</button>
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

@endsection
