<!-- add HTML script here -->
<html>
    <head>
        <meta NAME="GENERATOR" Content="Microsoft Visual Studio 6.0">
        <title>查詢條件</title>
        <link href="{{ asset('CSS/style.css') }}" rel="styleSheet" type="text/css">
    </head>
    <body>
        <center>
            <img src="{{ asset('img/qrylogo.jpg') }}">

            <form name=form1 method=post action="">
                <input type="hidden" id=text2 name=text2>

                <p align=right></p>
                <table align=center border="0" cellpadding="0" cellspacing="0" width="500" style=";border-collapse:collapse;border: none;TEXT-ALIGN: center">
                    <tr>
                        <td align=right bgcolor=white>
                            <span class="gen">
                            <font color=red>
                                登入：d04xxxxx &nbsp;&nbsp;
                                <a href="{{ route('demo.login-page') }}">登出</a>
                            </font></span>
                        </td>
                    </tr>
                </table>
                <table align=center width="500">
                    <tr>
                        <th class="thHead">查詢條件</th>
                    </tr>
                    <tr>
                        <td class="row1">學年度：</td>
                    </tr>
                    <tr align=center>
                        <td class="row2">
                            <select name="yms_year">
                                <option value='105'>105年
                                <option value='104' selected>104年
                                <option value=103>103年
                                <option value=102>102年
                                <option value=101>101年
                                <option value=100>100年
                                <option value=99>99年
                                <option value=98>98年
                                <option value=97>97年
                                <option value=96>96年
                            </select>
                        </td>
                    </tr>
                    <tr class=row1>
                        <td class="row1">學期：</td>
                    </tr>
                    <tr align=center>
                        <td class="row2">
                            <input type="radio" name=yms_smester CHECKED value=1>上學期
                            <input type="radio" name=yms_smester value=2>下學期
                            <input type="radio" name=yms_smester value=3>暑修上
                            <input type="radio" name=yms_smester value=4>暑修下
                        </td>
                    </tr>
                    <tr>
                        <td class=row1>查詢項目：</td>
                    </tr>
                    <tr align=center>
                        <td class="row2">
                            <input type="radio" name=item CHECKED value=1>教師
                            <input type="radio" name=item value=2>科目
                            <input type="radio" name=item value=17>英語授課一覽表
                            <input type="radio" name=item value=3>教室
                            <input type="radio" name=item value=4>學程
                            <br>
                            <input type="radio" name=item value=5>系所班級(通識)
                            <input type="radio" name=item value=6>時間
                            <input type="radio" name=item value=7
                                   disabled>學生
                            &nbsp;&nbsp;<a href="javascript:void(0)">綜合查詢(含時間) </a>
                        </td>
                    </tr>
                    <tr>
                        <td class=row1>個人資料：</td>
                    </tr>
                    <tr align=center>
                        <td class="row2">
                            <input type="radio" name=item value=8>課表
                            <input type="radio" name=item value=9>選課一覽表
                            <input type="radio" name=item value=10>考程表
                            <input type="radio" name=item value=11>預選資料
                            <br>
                            <input type="radio" name=item value=12>扣考資料
                            <input type="radio" name=item value=13>缺考資料
                            <input type="radio" name=item value=14>缺曠課資料
                            <input type="radio" name=item value=15>補考資料
                            <!--<input type="radio" name=item value=16  >期中考成績-->
                        </td>
                    </tr>
                    <tr>
                        <td class=row1>查詢關鍵字：</td>
                    </tr>
                    <tr align=center>
                        <td class="row2">
                            關鍵字<input name=condition_key>
                            <br>
                            (時間)週
                            <select name=week>
                                <option value=0></option>
                                <option value=1>一</option>
                                <option value=2>二</option>
                                <option value=3>三</option>
                                <option value=4>四</option>
                                <option value=5>五</option>
                                <option value=6>六</option>
                                <option value=7>日</option>
                            </select>
                            第
                            <select name=start>
                                <option value=0 selected></option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                                <option value=12>12</option>
                                <option value=13>13</option>
                                <option value=14>14</option>
                            </select>
                            節至第
                            <select name=end>
                                <option value=0 selected></option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                                <option value=12>12</option>
                                <option value=13>13</option>
                                <option value=14>14</option>
                            </select>節
                        </td>
                    </tr>
                </table>
                <input type="button" value="查  詢">
                <input type="reset" value="重  設" name=reset1>
            </form>
        </center>
        <hr>
        <font face="標楷體">
            <center>
                <strong><font color=brown size=5>檢索說明<br></font></strong>
            </center>
            <blockquote>
                <p>
                    <strong><font color=red size=4>個人資訊連結<br></font></strong>
                    請直接點選項目中的超連結，就可以直接查詢您的個人課程或考試資訊。<br>
                </p>

                <p>
                    <strong><font color=red size=4>查詢條件<br></font></strong>
                    1.請先選擇<font color=green>學年度</font>、<font color=green>學期</font>、<font color=green>查詢項目</font>之後，在下方<font color=green>查詢關鍵字</font>中的欄位填入（選擇）要搜索的關鍵字後，系統即會依據您給的條件進行關鍵字搜尋。<br>
                    2.查詢項目中的<font color=green>教師</font>選項可以查詢<font color="blue">授課時間</font>、<font color=blue>請益時間</font>和<font color=blue>監考表</font>的資訊。<br>
                    3.查詢項目中的<font color=green>科目</font>選項可以查詢<font color=blue>課程大綱</font>、<font color=blue>授課教師</font>、<font color=blue>開課班級</font>和<font color=blue>上課教室</font>的資訊。<br>
                    4.查詢項目中的<font color=green>教室</font>選項可以查詢<font color=blue>教室課表</font>的資訊。<br>
                    5.查詢項目中的<font color=green>學程</font>選項可以查詢<font color=blue>各該系所班級所開設學程之班級課程表、開課一覽表</font>的資訊。
                    6.查詢項目中的<font color=green>學生</font>選項可以查詢<font color=blue>選課資料</font>、<font color=blue>預選資料</font>、<font color=blue>考程表</font>、<font color=blue>扣考資料</font>的資訊。<br>
                    7.查詢項目中的<font color=green>系所班級</font>選項可以查詢<font color=blue>班級課程表</font>及<font color=blue>班級開課一覽表</font>的資訊。<br>
                    8.若要查詢<font color=green>上課時間</font>請至<a href="javascripts:void(0)"><font color=blue>綜合查詢(含時間)</font>
                    </a><br>
                </p>
            </blockquote>
        </font>
    </body>
</html>
