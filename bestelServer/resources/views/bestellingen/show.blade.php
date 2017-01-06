@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bestelling van <u>{{ $bestelling->naam }}</u></h1>
            <div class="panel-body">
            	<h3>DETAILS</h3>
            		<ul class="list-group">
					  	<li class="list-group-item">Naam: {{$bestelling->naam}}</li>
					  	<li class="list-group-item">E-mail: {{$bestelling->mail}}</li>
					  	<li class="list-group-item">Tel: {{$bestelling->tel}}</li>
					  	<li class="list-group-item">Afhaal Uur: {{$bestelling->afhaalUur}}</li>
					  	<li class="list-group-item">Afhaal Datum: {{$bestelling->afhaalDatum}}</li>
					</ul>
            	<h3>PRODUCTEN</h3>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Aantal</th>
                        </tr>
                    </thead>

		            @foreach ($bestelling->items as $item)
		            	<tr class="odd gradeX">
	                        <td>{{ $item->naam }}</td>
	                        <td>{{ $item->aantal }}</td>
                        </tr>
		            @endforeach
		        </table>
		        <h3>Totaal: {{$bestelling->totaalPrijs}} euro</h3>
            	<hr><!--
            <h3>Product Toevoegen</h3>
            <form method="POST" action="/winkelItems">
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
            </form>-->
        </div>
    </div>
</div>

@endsection
