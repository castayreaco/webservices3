@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
        	<h1>Welkom</h1>
        	<h3>Kies hieronder een winkel waarvan u iets wenst te bestellen</h3>
        	<hr>
        	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Adres</th>
                            <th>Bestellen</th>
                        </tr>
                    </thead>
	            @foreach ($winkels as $winkel)
	            	<tr class="odd gradeX">
                            <td>{{ $winkel->naam }}</td>
                            <td>{{ $winkel->adres }}</td>
                            <td><a href="klanten/{{$winkel->id}}" class="btn btn-primary">Bestellen</a></td>
                        </tr>
	            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection