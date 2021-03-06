@extends('app')

@section('title')
    {{ $user->getNickname() }} - 個人資料
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->getNickname() }} - 個人資料</div>
                    {{-- Panel body --}}
                    <div class="panel-body">
                        <div class="row">
                            <div class="text-center">
                                {{-- Gravatar大頭貼 --}}
                                <img src="{{ Gravatar::src($user->email, 200) }}" class="img-circle" /><br />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="text-center col-md-10 col-md-offset-1">
                                <table class="table table-hover">
                                    <tr>
                                        <td>Email：</td>
                                        <td>
                                            {{ $user->email }}
                                            @if($user->isConfirmed())
                                                <span class="label label-success">已驗證</span>
                                            @else
                                                <a href="{{ URL::route('user.resend') }}" title="點此重新發送驗證信"><span class="label label-danger">未驗證</span></a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>暱稱：</td>
                                        <td>{{ $user->nickname }}</td>
                                    </tr>
                                    <tr>
                                        <td>用戶組：</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->display_name }}<br />
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>註冊：</td>
                                        <td>{{ $user->register_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>最後登入：</td>
                                        <td>{{ $user->lastlogin_at }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            {!! HTML::linkRoute('user.edit-profile', '編輯個人資料', null, ['class' => 'btn btn-primary']) !!}
                                            {!! HTML::linkRoute('user.profile', '預覽個人資料', $user->id, ['class' => 'btn btn-default']) !!}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
