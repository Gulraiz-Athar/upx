<html>

<body>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>
<table width="614" border="0" align="center" cellpadding="0" cellspacing="0"
       style="font-family:'Open Sans',Arial,Helvetica,sans-serif;font-size:12px;color:#656565;background: #FDFDFD;border: 1px solid #D6D5D5;-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;-webkit-box-shadow: 0px -1px 5px #DDD;-moz-box-shadow: 0px -1px 3px #DDD;box-shadow: 0px -1px 5px #DDD;width: 168px;">
    <tbody>
    <tr>
        <td style="border-radius: 8px 8px 0 0; position: relative; text-align:center;">
            <a href="{{ url('/login') }}" target="_blank">
                <img src="{{ URL::asset('public/images/logo/logo.png') }}" alt="Orniverse" width="150" border="0"
                     style="padding:20px 20px 5px 20px; width:150px; height: auto;">
            </a>
        </td>
    </tr>
    <tr>
        <td style="padding:0 18px 10px; background: #eee;">
            <table width="576" border="0" cellspacing="0" cellpadding="0"
                   style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#656565">
                <tbody>
                <tr>
                    <td style="padding:0 10px 0px 10px;">
                        <table width="554" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td>
                                    <div
                                        style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size: 14px; color: #6C6C6C;">
                                        <span style="font-size: 17px;"><br>Hello {{ $name }},
                                            <br>
                                            {{ $bodyMessage }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="576" border="0" cellspacing="0" cellpadding="0"
                   style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#6c6c6c;padding:10px">
                <tbody>
                <tr>
                    <td>
                        <div
                            style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size: 14px; color: #6c6c6c;">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="576" border="0" cellspacing="0" cellpadding="0"
                   style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#6c6c6c">
                <tbody>
                <tr>
                    <td style="padding:0 10px 0px 10px;">
                        <table width="554" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td>
                                    <div
                                        style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size: 14px; color: #6C6C6C;">
                                        <?php //echo $html; ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-family:'Open Sans',Arial,Helvetica,sans-serif;font-size:14px;padding:10px;border-top:1px solid #6c6c6c;">
                        {{--  Have a great day!<br>--}}
                        <br>Regards,<br/> United Parcel Xpress.
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="font-family:'Open Sans',Arial,Helvetica,sans-serif; font-size:11px; line-height:16px; padding:15px 18px; text-align:center; border-radius: 0 0 8px 8px; background-color: #035293; border-top: 3px solid #e30512; color: #fff;">
            Copyright unitedparcelxpress.com
        </td>
    </tr>
    </tbody>
</table>


</body>

</html>
