@extends('app')

@section('title')
    修改密碼
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="well bs-component">
                    {!! Form::open(['route' => 'user.change-password']) !!}
                    <fieldset>
                        <legend>修改密碼</legend>
                    </fieldset>
                    <div class="form-group has-feedback{{ ($errors->has('old_password'))?' has-error':'' }}">
                        <label class="control-label" for="old_password">舊密碼
                            @if($errors->has('old_password'))
                                <span class="label label-danger">{{ $errors->first('old_password') }}</span>
                            @endif
                        </label>
                        {!! Form::password('old_password', ['id' => 'old_password', 'placeholder' => '請輸入舊密碼', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('old_password'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>@endif
                    </div>
                    <div class="form-group has-feedback{{ ($errors->has('password'))?' has-error':'' }}">
                        <label class="control-label" for="password">新密碼
                            @if($errors->has('password'))
                                <span class="label label-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </label>
                        {!! Form::password('password', ['id' => 'password', 'placeholder' => '請輸入新密碼', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('password'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>@endif
                    </div>
                    <div class="form-group has-feedback{{ ($errors->has('password_again'))?' has-error':'' }}">
                        <label class="control-label" for="password_again">新密碼（再輸入一次）
                            @if($errors->has('password_again'))
                                <span class="label label-danger">{{ $errors->first('password_again') }}</span>
                            @endif
                        </label>
                        {!! Form::password('password_again', ['id' => 'password_again', 'placeholder' => '請再輸入一次新密碼', 'class' => 'form-control', 'required']) !!}
                        @if($errors->has('password_again'))<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>@endif
                    </div>
                    {!! Form::submit('修改密碼', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
