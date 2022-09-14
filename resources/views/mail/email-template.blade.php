<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            body {
                font-family: sans-serif;
                font-size: 16px;
            }

            p {
                margin-block-start: 0.5em;
                margin-block-end: 0.5em;
            }

            .first-table {
                width:100%;
                border: 1px solid #999;
                max-width:700px;
                background-color:#ffffff;
                margin:0 auto;
                padding: 30px;
                margin-top: 40px
            }

            .dashes-first {
                margin-bottom: 30px;
                border-top: 1px dashed black;
            }

            .dashes {
                margin: 30px 0;
                border-top: 1px dashed black;
            }

            .message {
                margin: 0 5%;
            }

            .div-break {
                height: 5px;
            }

            @media(max-width:425px) {
                .message {
                    margin: unset;
                    line-height: unset;
                }

                .first-table {
                    padding: 20px;
                }
            }
        </style>
    </head>
    <body>
        <table width="700" cellspacing="0" cellpadding="0" class="first-table">
            <tbody>
                <tr>
                    <td style="padding-top:1.6em"></td>
                </tr>
                <tr>
                    <td align="left" style="color:#3f4652;line-height:23px;padding-left:28px;padding-right:28px;font-size:15px;font-family:'Open Sans',sans-serif;font-weight:100;">
                        <font face="'Open Sans', sans-serif">
                            <div class="message">
                                <hr class="dashes-first">
                                <p>Dear User,</p>
                                <div class="div-break"></div>
                                <p>You have created a new event!</p>
                                <div class="div-break"></div>
                                <p><b>Name:</b></p>
                                <p>{{ $name ?? '-' }}</p>
                                <div class="div-break"></div>
                                <p><b>Slug:</b></p>
                                <p>{{ $slug ?? '-' }}</p>
                                <div class="div-break"></div>
                                <div class="div-break"></div>
                                <hr class="dashes">
                                <div class="div-break"></div>
                            </div>
                        </font>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="500" cellspacing="0" cellpadding="0" style="width:100%;max-width:500;margin:0 auto">
            <tbody>
                <tr>
                    <td style="padding-top:1.1em"></td>
                </tr>
                <tr>
                    <td style="color:#777777;padding-left:28px;padding-right:28px;font-size:13px;font-family:'Open Sans',Arial,sans-serif;font-weight:100;text-align:center">
                        <font face="'Open Sans', sans-serif">© {!! date('Y') !!} All Rights Reserved.</font>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0.3em"></td>
                </tr>
                <tr>
                    <td style="color:#777;padding-left:3px;padding-right:3px;font-size:12px;font-family:'Open Sans',Arial,sans-serif;text-decoration:none;font-weight:100;text-align:center;word-break:break-all;word-wrap:break-word"><font face="'Open Sans', sans-serif">{!! config('main.company_address_inline') !!}</font></td>
                </tr>
                <tr>
                    <td style="padding-top:1.5em"></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
