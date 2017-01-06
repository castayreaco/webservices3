@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home</h1>
            <h2>Bestellingen</h2>
            @foreach ($winkels as $winkel)
                <h3>{{ $winkel->naam }}</h3>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Wie</th>
                                <th>Afhaal uur</th>
                                <th>Afhaal dag</th>
                                <th>Geplaatst op</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                @foreach ($winkel->bestellingen as $bestelling)
                        <tr class="odd gradeX">
                            <td>{{ $bestelling->naam }}</td>
                            <td>{{ $bestelling->afhaalUur }}</td>
                            <td>{{ $bestelling->afhaalDatum }}</td>
                            <td>{{ $bestelling->created_at }}      
                            <td><a href="home/{{ $bestelling->id }}" class="btn btn-primary">Details</a></td>
                        </tr>
                @endforeach
                </table>
            @endforeach
        </div>
    </div>
</div>

@endsection
