@extends('app')

@section('title')
    Record
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">搜尋</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-5">
                                {!! Form::open(['route' => 'dashboard.record', 'class' => 'form-horizontal', 'method' => 'GET']) !!}
                                <div class="input-group">
                                    {!! Form::text('nid', Input::get('nid'), ['id' => 'nid', 'placeholder' => '搜尋NID', 'class' => 'form-control', 'required']) !!}
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" title="搜尋"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                        @if(Input::has('nid'))
                                            <a class="btn btn-default" href="{{ URL::current() }}" title="清除搜尋結果"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        @endif
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-7">
                                @if(Input::has('nid'))
                                    @if($stats['nid']['count'])
                                        符合「{{ Input::get('nid') }}」的資料共 {{ $stats['nid']['count'] }} 筆
                                    @else
                                        找不到符合「{{ Input::get('nid') }}」的資料
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">統計</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="well">
                                    <h3>全部</h3>
                                    Count: {{ $stats['total']['count'] }}<br />
                                    <span class="text-success">✔</span>HTTPS: {{ $stats['total']['https'] }} ({{ sprintf('%.2f', $stats['total']['https'] / $stats['total']['count'] * 100) }}%)<br />
                                    <span class="text-danger">✘</span>NON-HTTPS: {{ $stats['total']['count'] - $stats['total']['https'] }} ({{ sprintf('%.2f', ($stats['total']['count'] - $stats['total']['https']) / $stats['total']['count'] * 100) }}%)<br />
                                </div>
                            </div>
                            @if(Input::has('nid') && $stats['nid']['count'])
                                <div class="col-md-6">
                                    <div class="well">
                                        <h3>僅針對：{{ Input::get('nid') }}</h3>
                                        Count: {{ $stats['nid']['count'] }}<br />
                                        <span class="text-success">✔</span>HTTPS: {{ $stats['nid']['https'] }} ({{ sprintf('%.2f', $stats['nid']['https'] / $stats['nid']['count'] * 100) }}%)<br />
                                        <span class="text-danger">✘</span>NON-HTTPS: {{ $stats['nid']['count'] - $stats['nid']['https'] }} ({{ sprintf('%.2f', ($stats['nid']['count'] - $stats['nid']['https']) / $stats['nid']['count'] * 100) }}%)<br />
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">記錄</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NID</th>
                                    <th>HTTPS?</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{ $record->id }}</td>
                                        <td>
                                            @if(Input::has('nid'))
                                                {{ $record->nid }}
                                            @else
                                                <a href="{{ route('dashboard.record') }}?nid={{ $record->nid }}" title="點擊以過濾">
                                                    {{ $record->nid }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($record->https)
                                                <span class="text-success">✔</span>
                                            @else
                                                <span class="text-danger">✘</span>
                                            @endif
                                        </td>
                                        <td><span title="{{ (new Carbon($record->created_at))->diffForHumans() }}">{{ $record->created_at }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            暫無資料
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! str_replace('/?', '?', $records->appends(Input::except(['page']))->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
