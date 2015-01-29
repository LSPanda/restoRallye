@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.menus.index') }}">Menus</a></li>
    <li class="active">Édition du menu N°{{ $id }}</li>
@stop

@section('content')
    {{ Form::open( [ 'route' => [ 'admin.menus.update', $id ], 'method' => 'put' ] ) }}
        {{ $errors->first( 'serviceName', '<div class="alert alert-danger">:message</div>' ) }}
        <div id="serviceContent" class="container-fluid">
            <div class="col-md-4 clearfix well service" id="serviceBlock">
                <div class="container-fluid">
                    <div id="mealContent">
                        <div class="form-group col-md-12">
                            {{ Form::label( 'serviceName', 'Nom du service', [ 'class' => 'serviceLabel' ] ) }}
                            {{ Form::text( 'serviceName', null, [ 'class' => 'form-control serviceInput', 'require', 'placeholder' => 'Plat principal' ] ) }}
                        </div>
                        <div class="form-group col-md-11 col-md-offset-1 mealContent">
                            {{ Form::label( 'mealName', 'Nom du plat', [ 'class' => 'mealLabel' ] ) }}
                            {{ Form::text( 'mealName[]', null, [ 'class' => 'form-control mealInput', 'require', 'placeholder' => 'Roti moutarde', 'id' => 'mealBlock' ] ) }}
                            {{ $errors->first( 'mealName', '<div class="alert alert-danger">:message</div>' ) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="pull-right addMeal">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Ajouter un plat
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <button class="btn btn-primary" id="addMenu">
                <span class="glyphicon glyphicon-plus"></span> Ajouter un service
            </button>
        </div>
        <br/>
        <br/>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-lg btn-success btn-block">Éditer</button>
        </div>
    {{ Form::close() }}
@stop

@section('scripts')
    {{ HTML::script('js/vendor/bootstrap/fileButton.js') }}
    <script type="text/javascript">
        $('.file-input').bootstrapFileInput();

        (function() {
            'use strict';

            var serviceBlock = $( '#serviceBlock' ).removeAttr( 'id' ).clone();
            var inputs;

            /**
            * Add a service
            * */
            var addService = function() {
                serviceBlock.clone().appendTo( '#serviceContent' );
            };

            /**
            * Listen to add service
            * */
            $('#addMenu').unbind().click(function ( e ) {
                e.preventDefault();
                addService();
                countServices();
            });

            window.onload = function() {
                inputs = {{ json_encode($menuJson) }}
                initFields();
                countServices();
            };

            var initFields = function() {
                console.log(inputs);
                if ( inputs ) {
                    var length = 0;
                    for ( var key in inputs ) {
                        if ( length % 2 && length > 1 ) {
                            addService();
                        }
                        length++;
                    }
                    countServices();
                    for ( var key in inputs ) {
                        /* Si on est dans la liste des menus */
                        if ( Array.isArray( inputs[ key ] ) )
                        {
                            var length = 1;
                            for (var mealKey in inputs[ key ] ) {
                                var mealContent = $( '#mealContent-' + key.slice(-1) + ' .mealContent' );
                                if (length > 1) {
                                    var mealBlock =  mealContent.find( 'input' ).first().clone();
                                    mealBlock.clone().appendTo( mealContent ).val( inputs[ key ][ mealKey ] );
                                } else {
                                    mealContent.find( 'input' ).first().val( inputs[ key ][ mealKey ] )
                                }
                                length++;
                            }
                        }
                        /* Si on est au nom du menu */
                        else {
                            $( '#' + key ).val( inputs[ key ] );
                        }
                    }
                }
            };

            var countServices = function () {
                var services = $('.service').get();
                var serviceWrap = $('#serviceContent > .service');

                if(serviceWrap.length > 3) {
                    for(var i = 0; i < serviceWrap.length; i += 3) {
                        serviceWrap.slice(i, i + 3).wrapAll("<div class='row' />");
                    }
                }

                services.forEach( function(service, key) {
                    var mealContent = $( service ).find( '#mealContent' ).attr( 'id', 'mealContent-' + key );
                    mealContent.find( '.serviceLabel' ).attr( 'for', 'serviceName-' + key );
                    mealContent.find( '.serviceInput' ).attr( {
                        'name': 'serviceName-' + key,
                        'id':   'serviceName-' + key
                    } );

                    mealContent.find( '.mealLabel' ).attr( 'for', 'mealName-' + key );
                    mealContent.find( '.mealInput' ).attr( {
                        'name': 'mealName-' + key + '[]',
                        'id':   'mealName-' + key
                    } );
                });

                /**
                * Add a meal to the menu
                * */
                $('.addMeal').unbind().click(function ( e ) {
                    e.preventDefault();
                    var mealContent = $( this ).parent().parent().find( '.mealContent' );
                    var mealBlock =  mealContent.find( 'input' ).first().clone().val( '' );
                    mealBlock.clone().appendTo( mealContent );
                });
            }
        })();

    </script>

@stop
