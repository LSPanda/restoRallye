@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Articles</li>
@stop

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">Liste des articles</div>
        <div class="table-responsive">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="#" class="form-group">
                            <input class="search form-control" type="search" data-column="all" placeholder="Rechercher...">
                        </form>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="reset btn btn-block btn-primary" data-column="0">
                            <i class="icon-white icon-refresh glyphicon glyphicon-refresh"></i> Réinitialiser le filtre
                        </button>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <a href="{{ route('admin.posts.create') }}" class="reset btn btn-block btn-success" data-column="0">
                            <i class="icon-white icon-refresh glyphicon glyphicon-plus"></i> Ajouter un article
                        </a>
                    </div>
                </div>
            </div>
            <table id="tableSorter">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th class="sorter-false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ date( 'd/m/Y', strtotime($post->created_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.posts.show', $post->id) }}" title="Voir la fiche post">{{--
                                    --}}<button class="btn btn-info">{{--
                                        --}}<span class="glyphicon glyphicon-search"></span>{{--
                                    --}}</button>{{--
                                --}}</a>{{--
                                --}}<a href="{{ route('admin.posts.edit', $post->id) }}" title="Éditer le post">{{--
                                    --}}<button class="btn btn-primary">{{--
                                        --}}<span class="glyphicon glyphicon-pencil"></span>{{--
                                    --}}</button>{{--
                                --}}</a>{{--
                                --}}{{ Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete', 'class' => 'inline']) }}{{--
                                --}}<button type="submit" class="btn btn-danger deleteButton" title="Supprimer le post" data-message="Voulez-vous vraiment supprimer cet article ?">{{--
                                    --}}<span class="glyphicon glyphicon-remove"></span>{{--
                                --}}</button>
                                {{ Form::close() }}
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
                hover      : 'tablesorter-hover'
            };

            $("table").tablesorter({
                theme : "bootstrap",
                headerTemplate : '{content} {icon}',
                widgets : [ "uitheme", "filter", "zebra" ],
                widgetOptions : {
                    zebra : ["even", "odd"],
                    filter_external : '.search',
                    filter_reset : ".reset",
                    filter_columnFilters: false
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

        $('.deleteButton').click(function ( e ) {
            if( !window.confirm($(this).attr('data-message')) ) {
                e.preventDefault();
            }
        });
    </script>
@stop
