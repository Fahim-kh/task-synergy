<html xmlns="http://www.w3.org/1999/xhtml">
@php
    $general_setting = app('general_setting');
@endphp

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />

    <style>
        /* Reset styles */
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            width: 100% !important;
            height: 100% !important;
        }

        body,
        table,
        td,
        div,
        p,
        a {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse !important;
            border-spacing: 0;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        /* Rounded corners for advanced mail clients only */
        @media all and (min-width: 560px) {
            .container {
                border-radius: 8px;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                -khtml-border-radius: 8px;
            }
        }

        /* Set color for auto links (addresses, dates, etc.) */
        a,
        a:hover {
            color: #127DB3;
        }

        .footer a,
        .footer a:hover {
            color: #999999;
        }
    </style>

    <!-- MESSAGE SUBJECT -->
    <title>Request a CallBack</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%"
    style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #F0F0F0;
	color: #000000;"
    bgcolor="#F0F0F0" text="#000000">

    <!-- WRAPPER / CONTEINER -->
    <!-- Set conteiner background color -->
    <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560"
        style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;"
        class="container">
        <td align="center" valign="top"
            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
    padding-top: 20px;
    padding-bottom: 20px;">
            <!-- LOGO -->
            <a target="_blank" style="text-decoration: none;" href="https://megaresources.co.uk/"><img
                    border="0" vspace="0" hspace="0"
                    src="{{ asset('admin/uploads/generalsetting') }}/{{ $general_setting->logo }}"
                    width="100" height="30" alt="Logo" title="Logo"
                    style="
        color: #000000;
        font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

        </td>

        <!-- Set line color -->
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;"
                class="line">
                <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                    style="margin: 0; padding: 0;" />
            </td>
        </tr>

        <!-- LIST -->
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;"
                class="list-item">
                <table align="center" border="0" cellspacing="0" cellpadding="0"
                    style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">
                    <!-- LIST ITEM -->
                    <tr>

                        <!-- LIST ITEM IMAGE -->
                        <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                        <td align="left" valign="top"
                            style="border-collapse: collapse; border-spacing: 0;
					padding-top: 30px;
					padding-right: 20px;">

                        </td>
                    </tr>

                    <!-- LIST ITEM -->
                    <tr>
                        <td align="left" valign="top"
                            style="font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
					padding-top: 25px;
					color: #000000;
					font-family: sans-serif;"
                            class="paragraph">
                            <b style="color: #333333;">Name : </b> {{ $data['your_name'] }}<br />
                            <b style="color: #333333;">Email Address: </b> {{ $data['email_address'] }}<br />
                            <b style="color: #333333;">Telephone Number: </b> {{ $data['telephone_number'] }}<br />
                            <b style="color: #333333;">Searching For: </b> {{ $data['searching_for'] }}<br />
                            <b style="color: #333333;">Care Recipitent Name: </b> {{ $data['care_recipitent_name'] }}<br />
                            <b style="color: #333333;">Care Recipitent Age: </b> {{ $data['care_recipitent_age'] }}<br />
                            <b style="color: #333333;">Care Recipitent Postcode: </b> {{ $data['care_recipitent_postcode'] }}<br />
                            <b style="color: #333333;">Funding Type:</b> {{ $data['funding_type'] }}<br />
                            <b style="color: #333333;">Tell Us More About Your Requirments :</b><br />
                            <p>{{ $data['tell_us'] }}</p> 

                        </td>

                    </tr>

                </table>
            </td>
        </tr>

        <!-- LINE -->
        <!-- Set line color -->
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;"
                class="line">
                <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                    style="margin: 0; padding: 0;" />
            </td>
        </tr>

        <!-- PARAGRAPH -->
        <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 20px;
			padding-bottom: 25px;
			color: #000000;
			font-family: sans-serif;"
                class="paragraph">
                Have a question? <a href="mailto:{{ $general_setting->email }}" target="_blank"
                    style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">{{ $general_setting->email }}</a>
            </td>
        </tr>

        <!-- End of WRAPPER -->
    </table>

    <!-- WRAPPER -->
    <!-- Set wrapper width (twice) -->
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="560"
        style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;"
        class="wrapper">

        <!-- SOCIAL NETWORKS -->
        <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;"
                class="social-icons">
                <table width="256" border="0" cellpadding="0" cellspacing="0" align="center"
                    style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                    <tr>

                        <!-- ICON 1 -->
                        <td align="center" valign="middle"
                            style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://www.facebook.com/megaresourcesnursingandcare/"
                                style="text-decoration: none;"><img border="0" vspace="0" hspace="0"
                                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
                                    alt="F" title="Facebook" width="44" height="44"
                                    src="{{ asset('assets/img/social/fb.png') }}"></a></td>

                        <!-- ICON 2 -->
                        <td align="center" valign="middle"
                            style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://www.instagram.com/megaresources"
                                style="text-decoration: none;"><img border="0" vspace="0" hspace="0"
                                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
                                    alt="T" title="Twitter" width="44" height="44"
                                    src="{{ asset('assets/img/social/ig.png') }}"></a></td>

                        <!-- ICON 3 -->
                        <td align="center" valign="middle"
                            style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="#" style="text-decoration: none;"><img border="0"
                                    vspace="0" hspace="0"
                                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
                                    alt="G" title="Google Plus" width="44" height="44"
                                    src="{{ asset('assets/img/social/yt.png') }}"></a></td>

                        <!-- ICON 4 -->
                        <td align="center" valign="middle"
                            style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="#" style="text-decoration: none;"><img border="0"
                                    vspace="0" hspace="0"
                                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
					color: #000000;"
                                    alt="I" title="Instagram" width="44" height="44"
                                    src="{{ asset('assets/img/social/xtwitter.png') }}"></a></td>
                        <td align="center" valign="middle"
                            style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://www.tiktok.com/@meganursingandcare?_t=8ngpqlbqubr&_r=1"
                                style="text-decoration: none;"><img border="0" vspace="0" hspace="0"
                                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                        color: #000000;"
                                    alt="I" title="Instagram" width="44" height="44"
                                    src="{{ asset('assets/img/social/tk.png') }}"></a></td>
                        <td align="center" valign="middle"
                            style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="#" style="text-decoration: none;"><img border="0"
                                    vspace="0" hspace="0"
                                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                            color: #000000;"
                                    alt="I" title="Instagram" width="44" height="44"
                                    src="{{ asset('assets/img/social/spotify.png') }}"></a></td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- FOOTER -->
        <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
        <!--  <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
			padding-top: 20px;
			padding-bottom: 20px;
			color: #999999;
			font-family: sans-serif;"
                class="footer">

                This email template was sent to&nbsp;you becouse we&nbsp;want to&nbsp;make the&nbsp;world a&nbsp;better
                place. You&nbsp;could change your <a href="https://github.com/konsav/email-templates/" target="_blank"
                    style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">subscription
                    settings</a> anytime.
            </td>
        </tr> -->

        <!-- End of WRAPPER -->
    </table>

    <!-- End of SECTION / BACKGROUND -->
    </td>
    </tr>
    </table>

</body>

</html>
