@extends('app')

@section('title')
    註冊
@endsection

@section('head-javascript')
    {!! HTML::script('https://www.google.com/recaptcha/api.js') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-danger" role="alert">
                    <strong>警告！！！</strong>如果您只是一般使用者，您不需要註冊。
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="well bs-component">
                    {!! Form::open(['route' => 'user.register']) !!}
                    <fieldset>
                        <legend>註冊</legend>
                    </fieldset>
                    <div class="form-group has-feedback{{ ($errors->has('email'))?' has-error':'' }}">
                        <label class="control-label" for="email">信箱（註冊後請收取郵件並完成驗證）
                            @if($errors->has('email'))
                                <span class="label label-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </label>
                        {!! Form::email('email', null, ['id' => 'email', 'placeholder' => '請輸入信箱', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('email'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>@endif
                    </div>
                    <div class="form-group has-feedback{{ ($errors->has('password'))?' has-error':'' }}">
                        <label class="control-label" for="password">密碼
                            @if($errors->has('password'))
                                <span class="label label-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </label>
                        {!! Form::password('password', ['id' => 'password', 'placeholder' => '請輸入密碼', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('password'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>@endif
                    </div>
                    <div class="form-group has-feedback{{ ($errors->has('password_again'))?' has-error':'' }}">
                        <label class="control-label" for="password_again">密碼（再輸入一次）
                            @if($errors->has('password_again'))
                                <span class="label label-danger">{{ $errors->first('password_again') }}</span>
                            @endif
                        </label>
                        {!! Form::password('password_again', ['id' => 'password_again', 'placeholder' => '請再輸入一次密碼', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('password_again'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>@endif
                    </div>
                    <div class="form-group has-feedback{{ ($errors->has('g-recaptcha-response'))?' has-error':'' }}">
                        <label class="control-label" for="g-recaptcha-response">驗證
                            @if($errors->has('g-recaptcha-response'))
                                <span class="label label-danger">您必須勾選「我不是機器人」</span>
                            @endif
                        </label>
                        <div class="g-recaptcha" data-sitekey="{{ env('reCAPTCHA_Site_key') }}"></div>
                    </div>
                    {!! Form::submit('註冊', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ URL::route('user.login') }}" class="btn btn-default">返回登入頁</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            {{-- 將 「--請下拉選擇--」 設定成不可選 --}}
            $("select[name='email_domain'] option[value='']").prop('disabled', true);
        });
    </script>
@endsection
