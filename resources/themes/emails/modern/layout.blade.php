<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #031658;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #031658;',
    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 25px 0; text-align: center; display: flex;align-items: center; justify-content: space-between; margin: auto; max-width: 570px',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: white; text-decoration: none; text-shadow: 0 1px 0 black; margin-right: auto;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 0px solid #EDEFF2; border-bottom: 0px solid #EDEFF2; background-color: #031658;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin-top: 15px; margin-bottom: 15px; padding: 0;',
    'email-body_cell' => 'padding: 35px; background: white; border-radius: 4px;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
    /* Type ------------------------------ */
    'anchor' => 'color: #0057ff;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #abb9cd; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',
    /* Buttons ------------------------------ */
    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #0057ff; border-radius: 2px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #0057ff;',
    'stripes' => 'height: 10px;background: repeating-linear-gradient(45deg,#0057ff,#0057ff 8px,#ffffff 10px,#ffffff 15px);max-width: 570px;margin: auto;margin-bottom: -18px;border-radius: 3px;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
                                {{ $subject }}
                            </a>
                            <div style="display: flex;align-items: center;">
                                <h1 style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}">WemX</h1>
                                <img src="@settings('logo')" alt="logo" style="width: 40px; border-radius: 3px; margin-left: 15px">
                            </div>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>                        
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                
                                <tr>
                                    <div style="{{ $style['stripes'] }}"></div>
                                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <!-- Greeting -->
                                        <h1 style="{{ $style['header-1'] }}">
                                            {!! __('client.hello') !!} {{ $name }},
                                        </h1>

                                        <!-- Intro -->
                                            <p style="{{ $style['paragraph'] }} margin-top: 15px;">
                                                {!! $intro !!}
                                            </p>

                                        <!-- Action Button -->
                                        @if (isset($button))
                                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="center">
                                                        <?php
                                                        $actionColor = 'button--blue';

                                                        ?>

                                                        <a href="{{ $button['url'] }}"
                                                            style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                                                            class="button"
                                                            target="_blank">
                                                            {{ $button['name'] }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif

                                        <!-- Outro -->

                                            <p style="{{ $style['paragraph'] }} margin-bottom: 15px">
                                                @if(!isset($button)) <br> @endif {!! __('client.email_template_content') !!}
                                            </p>


                                        <!-- Salutation -->
                                        <p style="{{ $style['paragraph'] }}">
                                            {!! __('client.regards') !!},<br>{{ settings('app_name', 'WemX') }}
                                        </p>

                                        <!-- Sub Copy -->
                                        @if (isset($button))
                                            <table style="{{ $style['body_sub'] }}">
                                                <tr>
                                                    <td style="{{ $fontFamily }}">
                                                        <p style="{{ $style['paragraph-sub'] }} color: #6f6f6f !important">
                                                            {!! __('client.email_button_desc', ['button' => $button['name']]) !!}
                                                        </p>

                                                        <p style="{{ $style['paragraph-sub'] }}">
                                                            <a style="{{ $style['anchor'] }}" href="{{ $button['url'] }}" target="_blank">
                                                                {{ $button['url'] }}
                                                            </a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; {{ date('Y') }}
                                            <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ settings('app_name', 'WemX') }}</a>.
                                             {!! __('client.all_rights_reserved') !!}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
