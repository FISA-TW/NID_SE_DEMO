@extends('app')

@section('title')
    成員清單
@endsection

@section('css')
    <style type="text/css">
        {{-- 使表格文字垂直置中 --}}
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">成員清單</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-5">
                                {!! Form::open(['route' => 'user.list', 'class' => 'form-horizontal', 'method' => 'GET']) !!}
                                <div class="input-group">
                                    {!! Form::text('q', Input::get('q'), ['id' => 'q', 'placeholder' => '搜尋信箱、暱稱...', 'class' => 'form-control', 'required']) !!}
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" title="搜尋"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                        @if(Input::has('q'))
                                            <a class="btn btn-default" href="{{ URL::current() }}" title="清除搜尋結果"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        @endif
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-7">
                                @if(Input::has('q'))
                                    @if($userList->count())
                                        符合「{{ Input::get('q') }}」的資料共 {{ $totalCount }} 筆
                                    @else
                                        找不到符合「{{ Input::get('q') }}」的資料
                                    @endif
                                @endif
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>信箱</th>
                                <th>暱稱</th>
                                <th>群組</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userList as $key => $userItem)
                                <tr>
                                    <td>{{ (Input::get('page',1) - 1) * $amountPerPage + $key + 1}}</td>
                                    <td>
                                        <img src="{{ Gravatar::src($userItem->email, 40) }}" class="img-circle" />
                                        <a href="{{ URL::route('user.profile',$userItem->id) }}">{{ $userItem->email }}</a>
                                        @if($userItem->isConfirmed())
                                            <span class="label label-success">已驗證</span>
                                        @else
                                            <span class="label label-danger">未驗證</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $userItem->nickname }}
                                    </td>
                                    <td>
                                        @foreach($userItem->roles as $role)
                                            {{ $role->display_name }}<br />
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! str_replace('/?', '?', $userList->appends(Input::except(['page']))->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
