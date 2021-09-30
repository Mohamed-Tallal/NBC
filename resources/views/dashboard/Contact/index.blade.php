@extends('dashboard.layouts.app')
@section('style')
<style>
    .iStyle{
        padding-top: 3px;
    }
</style>
@stop
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-envelope-o"></i> Mailbox</h1>
            <p>A Mailbox page sample</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Mailbox</a></li>
        </ul>
    </div>
    <div class="tile">
        <div class="table-responsive mailbox-messages">
            <table class="table table-hover">
                <tbody>
                @foreach($contact as $contactUs)
                    <tr>
                        <td><a href="#">
                                @if($contactUs ->readable == 0)
                                <i class="fa fa-check-circle"></i>
                                @else
                                    <i class="fa fa-circle-o"></i>
                                @endif
                            </a></td>
                        <td><a href="{{route('contact.show',$contactUs->id)}}">{{$contactUs->name}}</a></td>
                        <td>{{ Str::limit($contactUs->message , 100) }}</td>
                        <td>{{$contactUs ->created_at->diffForHumans()}}</td>
                        <td>
                            <form method="post" action="{{route('contact.destroy',$contactUs->id)}}">
                                @csrf
                                {{method_field('delete')}}
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-right"><span class="text-muted mr-2"></span>
            {{$contact->links('dashboard.mailpaginate')}}
        </div>
    </div>
@endsection
