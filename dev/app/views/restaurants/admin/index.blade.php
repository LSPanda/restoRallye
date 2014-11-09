@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Restaurants</li>
@stop

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">Liste des restaurants</div>
        <div class="table-responsive">
            <div class="panel-body">
                <button type="button" class="reset btn btn-block btn-primary" data-column="0" data-filter="">
                    <i class="icon-white icon-refresh glyphicon glyphicon-refresh"></i> Réinitialiser les filtres
                </button>
            </div>
            <table id="tableSorter">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Site</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th class="sorter-false filter-false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->id }}</td>
                            <td>{{ $restaurant->name }}</td>
                            <td>{{ $restaurant->adress . ' ' . $restaurant->adress_number }}<br>
                                {{ $restaurant->postal_code . ' ' . $restaurant->city }}</td>
                            <td><a href="{{ $restaurant->website }}" target="_blank">{{ $restaurant->website }}</a></td>
                            <td>{{ $restaurant->email }}</td>
                            <td>{{ $restaurant->tel }}</td>
                            <td>
                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" title="Voir la fiche restaurant">
                                    <button class="btn btn-info">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </a>
                                <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" title="Éditer le restaurant">
                                    <button class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                </a>
                                <a href="{{ route('admin.restaurants.destroy', $restaurant->id) }}" title="Supprimer le restaurant">
                                    <button class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody>
                    <tr>
                        <th colspan="7" class="pager">
            				<button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
            				<button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
            				<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
            				<button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
            				<button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
            				<select class="pagesize input-mini" title="Sélectionner le nombre de lignes par pages">
                                <option value="10">10</option>
            					<option value="20">25</option>
            					<option value="30">50</option>
            					<option value="40">100</option>
                            </select>
            				<select class="pagenum input-mini" title="Sélectionner le numéro de la page"></select>
    			         </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    {{ HTML::script('js/vendor/jquery/jquery.tablesorter.min.js') }}
    {{ HTML::script('js/vendor/jquery/jquery.tablesorter.pager.js') }}
    {{ HTML::script('js/vendor/jquery/jquery.tablesorter.widgets.js') }}

    <script id="js">
        $(function() {
            $.tablesorter.themes.bootstrap = {

                table      : 'table table-bordered table-striped table-hover',
                sortNone   : 'bootstrap-icon-unsorted',
                sortAsc    : 'icon-chevron-up glyphicon glyphicon-chevron-up',     // includes classes for Bootstrap v2 & v3
                sortDesc   : 'icon-chevron-down glyphicon glyphicon-chevron-down', // includes classes for Bootstrap v2 & v3
                active     : '', // applied when column is sorted
                hover      : 'tablesorter-hover', // use custom css here - bootstrap class may not override it
            };

            $("table").tablesorter({
                theme : "bootstrap",
                headerTemplate : '{content} {icon}',
                widgets : [ "uitheme", "filter", "zebra" ],
                widgetOptions : {
                    zebra : ["even", "odd"],
                    filter_reset : ".reset"
                }
            })
            .tablesorterPager({
                container: $(".pager"),
                cssGoto  : ".pagenum",
                removeRows: false,
                output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
            });
        });
        $(document).ready(function(){
            $(function(){
                $("#tableSorter").tablesorter();
            });
        });
    </script>
@stop
