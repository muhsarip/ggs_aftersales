<span class="preheader"
    style="color: transparent;display: none;height: 0;max-height: 0;max-width: 0;opacity: 0;overflow: hidden;mso-hide: all;visibility: hidden;width: 0;">This
    is preheader text. Some clients will show this text as a preview.</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body"
    style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background-color: #f6f6f6;">
    <tr>
        <td style="font-family: sans-serif;font-size: 14px;vertical-align: top;">&nbsp;</td>
        <td class="container"
            style="font-family: sans-serif;font-size: 14px;vertical-align: top;display: block;max-width: 580px;padding: 10px;width: 580px;margin: 0 auto !important;">
            <div class="content"
                style="box-sizing: border-box;display: block;margin: 0 auto;max-width: 580px;padding: 10px;">
                <div class="content-logo" style="text-align: center;">
                    <img width="100" height="100" src="{{url('images/logo-ggs.png')}}"
                        style="border: none;-ms-interpolation-mode: bicubic;max-width: 100%;">
                    <h2
                        style="color: #000000;font-family: sans-serif;font-weight: 400;line-height: 1.4;margin: 0;margin-bottom: 30px;">
                        Good Gaming Shop Aftersales</h2>
                </div>
                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main"
                    style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background: #ffffff;border-radius: 3px;">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper"
                            style="font-family: sans-serif;font-size: 14px;vertical-align: top;box-sizing: border-box;padding: 20px;">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                                <tr>
                                    <td style="font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                        <p
                                            style="font-family: sans-serif;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;">
                                            Hi {{$warranty->name}},</p>
                                        <p
                                            style="font-family: sans-serif;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;">
                                            {{$text}}
                                        </p>

                                        <table
                                            style="margin-bottom: 20px;border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                                            <tr>
                                                <td width="150"
                                                    style="color: gray;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    No </td>
                                                <td
                                                    style="font-weight: bold;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    : {{$warranty->no}}</td>
                                            </tr>
                                            <tr>
                                                <td width="150"
                                                    style="color: gray;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    Nama Barang</td>
                                                <td
                                                    style="font-weight: bold;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    : {{$warranty->nama_barang}}</td>
                                            </tr>

                                            @if ($warranty->type=="warranty" && $warranty->distributor &&
                                            $warranty->case_id != '')
                                            <tr>
                                                <td width="150"
                                                    style="color: gray;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    Distributor</td>
                                                <td
                                                    style="font-weight: bold;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    : {{$warranty->distributor->name}}</td>
                                            </tr>
                                            <tr>
                                                <td width="150"
                                                    style="color: gray;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    Case ID</td>
                                                <td
                                                    style="font-weight: bold;font-family: sans-serif;font-size: 14px;vertical-align: top;">
                                                    : {{$warranty->case_id}}</td>
                                            </tr>
                                            @endif


                                        </table>

                                        <p
                                            style="font-family: sans-serif;font-size: 14px;font-weight: normal;margin: 0;margin-bottom: 15px;">
                                            Salam hormat</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START FOOTER -->
                <div class="footer" style="clear: both;margin-top: 10px;text-align: center;width: 100%;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                        style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                        <tr>
                            <td class="content-block"
                                style="font-family: sans-serif;font-size: 12px;vertical-align: top;padding-bottom: 10px;padding-top: 10px;color: #999999;text-align: center;">

                                <br> This email send automatically by system, please do not reply this email.
                                <br><br><br>
                                <span class="apple-link" style="color: #999999;font-size: 12px;text-align: center;">
                                    GoodGamingShop, Mangga 2 Mall Lt. 2 No 2A
                                    Jakarta Pusat – Indonesia 10730</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

            </div>
        </td>
        <td style="font-family: sans-serif;font-size: 14px;vertical-align: top;">&nbsp;</td>
    </tr>
</table>