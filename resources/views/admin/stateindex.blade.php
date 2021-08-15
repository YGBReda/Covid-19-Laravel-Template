@extends('layouts.app')

@section('content')

<div class="uk-background-muted content-body">

<div class="uk-container uk-container-smal">
<button class="uk-button uk-button-default" type="button">Menu</button>
<div uk-dropdown>
    <ul class="uk-nav uk-dropdown-nav">
        <li class="uk-active"><a href="{{url('corona')}}">Country</a></li>
        <li class="uk-active"><a href="{{url('state')}}">States</a></li>
        <li class="uk-active"><a href="{{url('total')}}">Total</a></li>
    </ul>
</div>

@if (session('status'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p> {{ session('status') }}</p>
</div>
@endif



<table class="uk-table uk-table-responsive uk-table-divider">
    <thead>
        <tr>
            <th>Country</th>
            <th>State</th>
            <th>Confirmed</th>
            <th>Deaths</th>
            <th>Recovered</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    	@foreach($all_s as $all_s)
        <tr>
            <td>{{ $all_s->Country }}</td>
            <td>{{ $all_s->name }}</td>
            <td>{{ $all_s->Confirmed }}</td>
            <td>{{ $all_s->Deaths }}</td>
            <td>{{ $all_s->Recovered }}</td>

            <td>{{ $all_s->updated_at }}</td>
            <td>
            	<form action="{{ url('state/'.$all_s->id) }}" method="post" >
            		{{ csrf_field() }}
                    {{ method_field('DELETE') }}

                <a href="{{ url('state/'.$all_s->id.'/edit') }}" type="button" class="uk-icon-link uk-margin-small-right edit-btn" uk-icon="file-edit"></a>
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