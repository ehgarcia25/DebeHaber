<div id="mostrar_search">
@extends('layouts.master')

@section('title', 'Usuarios | DebeHaber')
@section('Title', 'Usuarios')
@section('breadcrumbs', Breadcrumbs::render('users'))


@section('content')






        {!! Form::open(array('url'=> 'users', 'method'=> 'get','class'=>'navbar-form navbar-left','role'=>'search','id'=>'form_search','autocomplete'=>'off')) !!}
        {{--<input id="example-ajax-post" name="usuarios"/>--}}

        {{--<div class="form-group">--}}

            {{--<input type="text" class="searchbox form-control" value="" onblur="if(this.value == '') { this.value = 'Type here..'; }" onfocus="if(this.value == 'Type here..') { this.value = ''; }" name="s">--}}
            {{--<button type="submit">Submit</button>--}}
        {{--</div>--}}


        <div class="form-group">
            <label for="search" class="col-sm-3 control-label">Buscar</label>
            <div class="col-sm-7">
            {!!  Form::text('search',$palabra,['class'=> 'form-control','id'=>'search','onkeydown'=>'down()','onkeyup'=>'up()']) !!}
        </div>
        </div>
        {{--<button type="submit" class="btn btn-default" id="buscar_users">Buscar</button>--}}
        {!! Form::close() !!}



<a href="{{ url('create') }}" class="btn btn-primary pull-right btn-sm">Añadir Usuario</a>




    {{--<div class="col-md-4">--}}
        {{--<label for="search" class="col-sm-2 control-label">Buscar </label>--}}
        {{--<input type="search" name="search" id="search" class="form-control" onkeydown="down()" onkeyup="up()">--}}

{{--</div>--}}




<div class="panel-heading clearfix">

</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>S.No</th><th>Usuario</th><th>Rol</th><th>Email</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {{-- */$x=0;/* --}}
        @foreach($usuarios as $item)
        {{-- */$x++;/* --}}
        <tr>
            <td>{{ $x }}</td>
            <td><a href="{{ url('edit', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->role_id }}</td><td>{{ $item->email }}</td>
            <td>
                <a href="{{ url('edit', $item->id) }}">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a> /
                <a href="{{url('delete',$item->id )}}" style="display: inline;"  >
                <i class="glyphicon glyphicon-trash"></i>
                </a>


                {{--{!! Form::open([--}}
                {{--'method'=>'GET',--}}
                {{--'url' => ['delete', $item->id],--}}
                {{--'style' => 'display:inline'--}}
                {{--]) !!}--}}
                {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}--}}
                {{--{!! Form::close() !!}--}}

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>



@endsection

@section('scripts')
<script>
var timer;
    function up(){

        timer=setTimeout(function(){
var keywords= $('#search').val()

            if(keywords.length >2){

                var url= '{{url()}}/users'
                $.get(url,{keywords: keywords},function(data){
                     $('#mostrar_search').html(data)
                })
            }

        },500)
    }


    function down(){

        clearTimeout(timer)
    }

$('#form_search').submit(function(e){

    var keywords= $('#search').val()
    e.preventDefault(e)
    if(keywords.length >0){

        var url= '{{url()}}/users'
        $.get(url,{keywords: keywords},function(data){
            $('#mostrar_search').html(data)
        })
    }
})


</script>

<script>
    $(".searchbox").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{url()}}/buscar_usuario",
                dataType: "jsonp",
                data: {
                    'action': "opensearch",
                    'format': "json",
                    'search': request.term
                },
                success: function(data) {

                    response(data[1]);
                }
            });
        }
    });
</script>


    <script>
        var options = {

            url: function(phrase) {
                return "{{url()}}/buscar_usuario";
            },

            getValue: function(element) {
                return element.name;
            },
            list: {
                match: {
                    enabled: true
                },
                maxNumberOfElements: 8
            },

            ajaxSettings: {
                dataType: "json",
                method: "get",
                data: {
                    dataType: "json"
                }
            },

            preparePostData: function(data) {
                data.phrase = $("#example-ajax-post").val();
                return data;
            },

            requestDelay: 400,
            theme: "square"
        };

        $("#example-ajax-post").easyAutocomplete(options);
    </script>
@endsection
