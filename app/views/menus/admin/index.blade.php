@extends('layouts.admin')

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">Liste des menus</div>
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
                        <a href="{{ route('admin.menus.create') }}" class="reset btn btn-block btn-success" data-column="0">
                            <i class="icon-white icon-refresh glyphicon glyphicon-plus"></i> Ajouter un menu
                        </a>
                    </div>
                </div>
            </div>
        <table class="table table-striped table-hover" id="tableSorter">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="sorter-false">Menu</th>
                    <th class="sorter-false">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu[ 'id' ] }}</td>
                        <td>
                            <dl>
                                @foreach($menu[ 'menu' ] as $menuName)
                                    <dt>{{ $menuName->name }}</dt>
                                    @foreach($menuName->content as $menuContent)
                                        <dd>{{ $menuContent }}</dd>
                                    @endforeach
                                @endforeach
                            </dl>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.menus.edit', $menu[ 'id' ]) }}" title="Éditer le menu">{{--
                                --}}<button class="btn btn-primary">{{--
                                    --}}<span class="glyphicon glyphicon-pencil"></span>{{--
                                --}}</button>{{--
                            --}}</a>{{--
                            --}}{{ Form::open(['route' => ['admin.menus.destroy', $menu[ 'id' ]], 'method' => 'delete', 'class' => 'inline']) }}{{--
                            --}}<button type="submit" class="btn btn-danger deleteButton" title="Supprimer le menu" data-message="Voulez-vous vraiment supprimer ce menu ?">{{--
                                --}}<span class="glyphicon glyphicon-remove"></span>{{--
                            --}}</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
