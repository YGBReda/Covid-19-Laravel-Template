@extends('layouts.app')

@section('content')

<div class="uk-background-muted content-body">
<div class="uk-container uk-container-smal">

@if (session('status'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p> {{ session('status') }}</p>
</div>
@endif

<button class="uk-button uk-button-default" type="button">Menu</button>
<div uk-dropdown>
    <ul class="uk-nav uk-dropdown-nav">
        <li class="uk-active"><a href="{{url('corona')}}">Country</a></li>
        <li class="uk-active"><a href="{{url('state')}}">States</a></li>
        <li class="uk-active"><a href="{{url('total')}}">Total</a></li>
    </ul>
</div>



<table class="uk-table uk-table-responsive uk-table-divider">
    <thead>
        <tr>
            <th>Confirmed</th>
            <th>Deaths</th>
            <th>Recovered</th>
            <th>Update</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="myTable">
    	@foreach($all_n as $all_n)
        <tr>
            <td>{{ $all_n->Confirmed }}</td>
            <td>{{ $all_n->Deaths }}</td>
            <td>{{ $all_n->Recovered }}</td>

            <td>{{ $all_n->updated_at }}</td>
            <td>
            	<form action="{{ url('total/'.$all_n->id) }}" method="post" >
            		{{ csrf_field() }}
                    {{ method_field('DELETE') }}

                <a href="{{ url('total/'.$all_n->id.'/edit') }}" type="button" class="uk-icon-link uk-margin-small-right edit-btn" uk-icon="file-edit"></a>
            	<button class="uk-button uk-icon-link uk-margin-small-right delete-btn" type="submit" uk-icon="trash"></button>
            	
                </form> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>

@endsection