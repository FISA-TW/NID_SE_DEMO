<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ Config::get('site.name') }}</h2>

        <p>
            有人要求重設您在 {{ Config::get('site.name') }} 的密碼，<br />
            <br />
            請透過以下連結重新設定密碼：<br />
            ---<br />
            <a href="{{ $link }}">{{ $link }}</a><br />
            ---<br />
        </p>
    </body>
</html>
