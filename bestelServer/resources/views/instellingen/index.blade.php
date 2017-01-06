@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Instellingen</h1>
            <h2>Alle winkels</h2>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Details</th>
                            <th>Bewerken</th>
                            <th>Verwijderen</th>
                        </tr>
                    </thead>
	            @foreach ($winkels as $winkel)
	            	<tr class="odd gradeX">
                            <td>{{ $winkel->naam }}</td>
                            <td><a href="instellingen/{{$winkel->id}}" class="btn btn-primary">Details</a></td>
                            <td><a href="instellingen/{{$winkel->id}}/bewerken" class="btn btn-primary">Bewerken</a></td>
                            <td>
                                <form method="POST" action="instellingen/winkelVerwijderen">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <input type="hidden" name="id" value="{{ $winkel->id }}">
                                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
	            @endforeach
            </table>
            <hr>
            <h3>Winkel Toevoegen</h3>
            <form method="POST" action="instellingen/winkelToevoegen">
                <div class="form-group">
                    <label for="naam">Naam</label>
                    <input type="text" class="form-control" id="naam" name="naam" aria-describedby="naam" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" id="adres" name="adres" aria-describedby="adres" placeholder="Adres">
                </div>
                <div class="form-group">
                    <label for="tel">Tel</label>
                    <input type="text" class="form-control" id="tel" name="tel" aria-describedby="tel" placeholder="Tel">
                </div>
                <div class="form-group">
                    <label for="mail">E-mail</label>
                    <input type="mail" class="form-control" id="mail" name="mail" aria-describedby="mail" placeholder="Mail">
                </div>
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Winkel toevoegen</button>
                </div>
            </form>
            @if(count($errors))
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
