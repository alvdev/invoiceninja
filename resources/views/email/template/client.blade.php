@php
    $primary_color = isset($settings) ? $settings->primary_color : '#4caf50';
    $email_alignment = isset($settings->email_alignment) ? $settings->email_alignment : 'center';
@endphp


<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">

    <style>
        @import url("https://use.typekit.net/zxn7pho.css");
    </style>

    <style type="text/css">
        :root {
            color-scheme: light dark;
            supported-color-schemes: light dark;
        }

        @if (isset($settings) && $settings->email_style === 'dark')
            body {
                background-color: #111111 !important;
                color: #ffffff !important;
            }

            div,
            tr,
            td {
                border-color: #222222 !important;
            }

            h1,
            h2,
            h3,
            p,
            td {
                color: #ffffff !important;
            }

            p {
                color: #bbbbbc !important;
            }

            .dark-bg-base {
                background-color: #111111 !important;
            }

            .dark-bg {
                background-color: #454545 !important;
            }

            .dark-text-white p {
                color: #ffffff !important;
            }

            hr {
                border-color: #474849 !important;
            }
        @endif
        /** Content-specific styles. **/
        #content .button {
            display: inline-block;
            background-color: #ff0000;
            /* color: #ffffff; */
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            font-size: 1.6rem;
            padding: 1rem 2rem;
            font-weight: 600;
            margin-bottom: 5px;
            margin-top: 20px;
            border-radius: 999px;
        }

        #content h1 {
            font-family: 'canada-type-gibson', 'roboto', Arial, Helvetica, sans-serif;
            font-weight: 600;
            font-size: 1.6rem;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        #content>p {
            font-size: 1.1rem;
            font-family: 'roboto', Arial, Helvetica, sans-serif;
            font-weight: 500;
            line-height: 150% !important;
            text-wrap: balance !important;
        }

        #content .center {
            text-align: center;
        }

        #content .left {
            text-align: left !important;
        }

        .stamp {
            transform: rotate(12deg);
            color: #555;
            font-size: 3rem;
            font-weight: 700;
            border: 0.25rem solid #555;
            text-transform: uppercase;
            border-radius: 1rem;
            font-family: 'Courier';
            mix-blend-mode: multiply;
            z-index: 200 !important;
            position: relative;
        }

        .is-paid {
            color: #D23;
            border: 1rem double #D23;
            transform: rotate(-5deg);
            font-size: 6rem;
            font-family: "Open sans", Helvetica, Arial, sans-serif;
            border-radius: 0;
            padding: 0.5rem;
            opacity: 0.2;
            z-index: 200 !important;
            position: relative;
        }

        a.doc_links {
            text-decoration: none;
            padding-bottom: 10px;
            display: inline-block;
            color: inherit !important;
        }

        td.new_button {
            background-color: transparent !important;
        }

        .new_button a {
            background-color: {{ $primary_color }};
            font-size: 1.1rem !important;
            border-radius: 999px !important;
            padding: 1rem 3rem !important;
            margin-top: 1rem;
            display: inline-block;
            color: #ffffff;
            text-decoration: none;
        }

        .logo {
            filter: invert(1) !important;
        }

        .body,
        #content>p {
            font-size: 1.1rem !important;
            line-height: 150% !important;
            text-wrap: balance !important;
        }

        .footer {
            font-size: 1rem;
        }

        .footer a {
            color: #8b5cf6 !important;
            text-decoration: none !important;
        }
    </style>

    <style media="screen and (max-width:480px)">
        .body,
        #content>p {
            font-size: 1.6rem !important;
        }

        #content h1 {
            font-size: 2rem !important;
        }

        .new_button a {
            font-size: 1.6rem !important;
        }

        .footer a {
            font-size: 2.4rem !imporant;
        }
    </style>

    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
</head>

<body class="body"
    style="margin: 0; padding: 0; font-family: 'roboto', Arial, Helvetica, sans-serif; color: #3b3b3b;-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="570"
                    class="dark-bg-base">

                    <!--[if mso]>
                <tr class="dark-bg" style="margin-top:10px; border: none;">
                <td style="border: none;"></td>
                </tr>
                <![endif]-->

                    <tr>
                        <td align="center" cellpadding="20">
                            <div style="padding-bottom: 10px; padding-top:10px;">
                                @if ($logo && strpos($logo, 'blank.png') === false)
                                    <img src="{{ $logo ?? '' }}" width="100" height="" alt=" "
                                        border="0" style="width: 100px; max-width: 100px; display: inline-block;">
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td cellpadding="5">
                            <div style="padding: 20px; text-align: {{ $email_alignment }}" id="content">
                                <div style="padding-top: 10px;"></div>

                                {{ $slot ?? '' }}
                                {!! $body ?? '' !!}

                                <a href="#"
                                    style="display: inline-block;background-color: {{ $primary_color }}; color: #ffffff; border-radius: 999px; text-transform: uppercase;letter-spacing: 2px; text-decoration: none; font-size: 1.2rem; font-weight: 600;">
                                </a>
                            </div>

                            @isset($links)
                                <div>
                                    <ul style="list-style-type: none;">
                                        @foreach ($links as $link)
                                            <li>{!! $link ?? '' !!} <img height="15px"
                                                    src="{{ asset('images/svg/dark/file.svg') }}"></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endisset
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="0">
                            <div style="text-align: center" id="content"></div>
                        </td>
                    </tr>

                    <tr>
                        <td cellpadding="0">
                            <div class="dark-text-white"
                                style="text-align: center; padding-top: 25px; padding-bottom: 25px;">
                                @isset($signature)
                                    <p
                                        style="font-size: 1rem; color: #2e2e2e; font-family: 'roboto', Arial, Helvetica, sans-serif; font-weight: 400; margin: 0;">
                                        {!! nl2br($signature) !!}
                                    </p>
                                @endisset

                                @if (isset($company) && $company instanceof \App\Models\Company && $company->getSetting('show_email_footer'))
                                    <div class="footer"
                                        style="font-family: 'roboto', Arial, Helvetica, sans-serif; font-weight: 500">
                                        {{ $company->present()->name() }}
                                        <span style="margin: 0 20px">{{ $company->settings->phone }}</span>
                                        <span>{{ $company->settings->website }}</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>

                    {{-- <tr>
                    <td bgcolor="#242424"  cellpadding="20">
                        <div class="dark-bg-base"
                             style="padding-top: 10px;padding-bottom: 10px; background-color: #242424;">
                            @if (isset($company))
                                @if (!$company->account->isPaid())
                                    <p style="text-align: center; color: #ffffff; font-size: 10px;
                            font-family: Verdana, Geneva, Tahoma, sans-serif;">© {{ date('Y') }} {{ $company->present()->name() }}, All Rights Reserved</p>
                                @else
                                    <p style="text-align: center; color: #ffffff; font-size: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                                        © {{ date('Y') }} EMPIRIC▲STUDIO, All Rights Reserved
                                    </p>
                                @endif
                            @else
                                <p style="text-align: center; color: #ffffff; font-size: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                                    © {{ date('Y') }} EMPIRIC▲STUDIO, All Rights Reserved
                                </p>
                            @endif
                        </div>
                    </td>
                </tr> --}}
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
