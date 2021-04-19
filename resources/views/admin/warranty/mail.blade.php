@include('admin.warranty.mail-style')


<span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">
                <div class="content-logo">
                    <img width="100" height="100" src="{{url('images/logo-ggs.png')}}" />
                    <h2>Good Gaming Shop Aftersales</h2>
                </div>
                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <p>Hi {{$warranty->name}},</p>
                                        <p>
                                            {{$text}}
                                        </p>

                                        <table style="margin-bottom:20px">
                                            <tr>
                                                <td width="150" style="color:gray">No </td>
                                                <td style="font-weight:bold;">: {{$warranty->no}}</td>
                                            </tr>
                                            <tr>
                                                <td width="150" style="color:gray">Nama Barang</td>
                                                <td style="font-weight:bold;">: {{$warranty->nama_barang}}</td>
                                            </tr>
                                            @if ($warranty->type=="warranty" && $warranty->distributor &&
                                            $warranty->case_id != '')

                                            <tr>
                                                <td width="150" style="color:gray">Distributor</td>
                                                <td style="font-weight:bold;">: {{$warranty->distributor->name}}</td>
                                            </tr>
                                            <tr>
                                                <td width="150" style="color:gray">Case ID</td>
                                                <td style="font-weight:bold;">: {{$warranty->case_id}}</td>
                                            </tr>
                                            @endif
                                        </table>

                                        <p>Salam hormat</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START FOOTER -->
                <div class="footer">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block">

                                <br> This email send automaticly by system, please do not reply this email. <br><br><br>
                                <span class="apple-link">
                                    GoodGamingShop, Mangga 2 Mall Lt. 2 No 2A
                                    Jakarta Pusat – Indonesia 10730</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>