<html>
    <head>
        <title>逢甲大學 課程檢索系統</title>
        <meta http-equiv="Content-Type" content="text/html; charset=big5">
        <style type="text/css">
            <!--
            .smallfont {
                FONT-SIZE: 12px
            }

            .style10 {
                FONT-SIZE: 12px;
                COLOR: #000066
            }

            .style11 {
                FONT-SIZE: 12px;
                COLOR: #760000
            }

            .style3 {
                FONT-SIZE: 10pt
            }

            .style4 {
                COLOR: #999999
            }

            .style13 {
                font-size: 18px;
                font-weight: bold;
                color: #760000;
            }

            body {
                background-color: #FFFFCC;
            }

            -->
        </style>
    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- ImageReady Slices (登入畫面1.jpg) -->
        {!! Form::open(['route' => 'demo.login-page']) !!}
            <table width="200" border="1" align="center" cellpadding="1" bordercolor="#A42310">
                <tr bordercolor="#FFFFFF">
                    <td>
                        <table id="table_01" width="989" height="585" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="3"><img src="{{ asset('img/login_01.jpg') }}" width="989" height="98" alt=""></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('img/login_02.jpg') }}" width="176" height="61" alt=""></td>
                                <td width="635" height="61" bgcolor="#FFFFFF">
                                    <div align="center"><span class="style13">逢甲大學 課程檢索系統</span></div>
                                </td>
                                <td><img src="{{ asset('img/login_04.jpg') }}" width="178" height="61" alt=""></td>
                            </tr>
                            <tr>
                                <td height="426" colspan="3" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                                    <table cellSpacing=0 cellPadding=0 width=809 align=center>
                                        <tbody>
                                        <tr>
                                            <td vAlign=top width=386>
                                                <table cellSpacing=0 cellPadding=0 width=342>
                                                    <tbody>
                                                    <tr>
                                                        <td vAlign=bottom>
                                                            <img height=38 alt=photo src="{{ asset('img/LOGIN_1.gif') }}" width=342>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=342 background={{ asset('img/LOGIN_2.gif') }} height="100%">
                                                            <table cellSpacing=1 cellPadding=0 width="80%" align=center summary=table border=0>
                                                                <tbody>
                                                                <tr>
                                                                    <td class=labelCell>
                                                                                    <span class=Lbl6>
                                                                                        <div align=right>
                                                                                            <label for=username>帳號：</label>
                                                                                        </div>
                                                                                    </span>
                                                                    </td>
                                                                    <td width="60%"><span class=Propinput>
                                                                                    {!! Form::text('userID', null, ['id' => 'IDToken1', 'style' => 'WIDTH: 100%', 'tabIndex' => 1]) !!}
                                                                                    </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class=labelCell>
                                                                                    <span class=Lbl6>
                                                                                        <div align=right>
                                                                                            <label for=password>密碼：</label>
                                                                                        </div>
                                                                                    </span>
                                                                    </td>
                                                                    <td width="60%"><span class=Proplabel>
                                                                                    {!! Form::password('userPW', ['id' => 'IDToken2', 'style' => 'WIDTH: 100%', 'tabIndex' => 2]) !!}
                                                                                    </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class=logBtn>
                                                                        {!! Form::submit('登入', ['class' => 'Btn1Def', 'id' => 'button', 'onBlur' => "this.className='Btn1Def'", 'onMouseOver' => "this.className='Btn1DefHov'", 'title' => '登入', 'onFocus' => "this.className='Btn1DefHov'", 'tabIndex' => 3, 'onMouseOut' => "this.className='Btn1Def'", 'name' => 'Button2']) !!}
                                                                        @if($errors->has('userID') || $errors->has('userPW'))
                                                                            <br><font color=red>帳號或密碼輸入錯誤！</font>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td vAlign=top>
                                                            <img height=22 alt=photo src="{{ asset('img/LOGIN_3.gif') }}" width=342>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td vAlign=top align=middle width=398>
                                                <table cellSpacing=0 cellPadding=0 width=356 border=0>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table cellSpacing=0 cellPadding=0 width=348 border=0>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table cellSpacing=0 cellPadding=0 width="100%" border=0>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <img height=38 alt=PHOTO src="{{ asset('img/whatsnew_2-1.gif') }}" width=356>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align=middle background={{ asset('img/whatsnew_2-2.gif') }}>
                                                                                    <table cellSpacing=0 cellPadding=0 width="97%" border=0>
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <table cellSpacing=2 cellPadding=2 width="95%" align=center>
                                                                                                    <tbody>
                                                                                                    <tr>
                                                                                                        <td colspan=2><span class=style10>本系統已加入NID驗證登入
                                                                                                                                    (NID authentication now)</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class=style3 width=171>
                                                                                                            <li>
                                                                                                                <a href="javascript:void(0)" target=_blank>新手上路&nbsp;
                                                                                                                    <span class=smallfont>New User</span>
                                                                                                                </a>
                                                                                                        </td>
                                                                                                        <td width=113 rowspan=3>
                                                                                                            <img height=52 alt=midlogo src="{{ asset('img/nid.gif') }}" width=113>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class=style3 height=19>
                                                                                                            <li>
                                                                                                                <a href="javascript:void(0)" target=_blank>帳號啟用&nbsp;
                                                                                                                    <span class=smallfont>Enable NID</span>
                                                                                                                </a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class=style3>
                                                                                                            <li>
                                                                                                                <a href="javascript:void(0)" target=_blank>忘記密碼&nbsp;
                                                                                                                    <span class=smallfont>Forgot Your Password</span>
                                                                                                                </a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan=2>　</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan=2>
                                                                                                            <li>&nbsp;<span class=style11>MyMail注意事項說明文件 User Guide&nbsp;<a href="javascript:void(0)" target=_blank>[html]</a> | <a class=smallfont href="javascript:void(0)" target=_blank>[PDF]</a></span>
                                                                                                            </li>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan=2>
                                                                                                            <li>&nbsp;<span class=style11>Multilingual in MyMail (English)&nbsp;<a href="javascript:void(0)" target=_blank>[html]</a> | <a class=smallfont href="javascript:void(0)" target=_blank>[PDF]</a></span>
                                                                                                            </li>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td vAlign=top align=left>
                                                                                    <img height=7 alt=PHOTO src="{{ asset('img/whatsnew_2-3.gif') }}" width=356>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width=23>　</td>
                                        </tr>
                                        <tr>
                                            <td class="wpsEditSmText style3" colspan=2>　
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p><br />
                                        <br />
                                    </p>
                                    <hr width="80%" size=1>
                                    <P class="style3 style4" align=center>版權所有<span class="word03">&copy;</span> 逢甲大學網路信箱系統內之所有內容及版面設計－著作權屬逢甲大學
                                        <br />
                                        問題反應或建議<a href="javascript:void(0)" target="_blank"> oit@fcu.edu.tw </a>，或請電分機 2712
                                        資訊處聯合服務台。
                                    </P>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        {!! Form::close() !!}
        <!-- End ImageReady Slices -->
    </body>
</html>
