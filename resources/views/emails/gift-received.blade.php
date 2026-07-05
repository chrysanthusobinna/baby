@php
    $statusColors = match ($gift->status) {
        'paid' => ['bg' => '#e9f3ee', 'fg' => '#5c8a71'],
        'failed', 'expired' => ['bg' => '#fbe9ec', 'fg' => '#c65b74'],
        default => ['bg' => '#faf3e4', 'fg' => '#b8842c'],
    };
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New gift received</title>
</head>
<body style="margin:0; padding:0; background-color:#f0f8f4; font-family:'Segoe UI', Helvetica, Arial, sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f8f4; padding:32px 16px;">
<tr>
<td align="center">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px; background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 4px 24px rgba(46,38,32,0.08);">

    <!-- Accent bar -->
    <tr>
        <td style="height:6px; background:linear-gradient(90deg,#e98aa1,#d9a441);"></td>
    </tr>

    <!-- Header -->
    <tr>
        <td style="padding:32px 40px 8px;">
            <p style="margin:0; font-size:12px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:#7da08b;">
                Jidenna's Baby Welcome
            </p>
            <h1 style="margin:6px 0 0; font-family:Georgia,'Times New Roman',serif; font-size:26px; color:#2e2620;">
                🎉 A new blessing gift arrived
            </h1>
        </td>
    </tr>

    <!-- Amount -->
    <tr>
        <td style="padding:20px 40px 0;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f0f8f4; border-radius:12px;">
                <tr>
                    <td style="padding:20px 24px;">
                        <p style="margin:0; font-size:11px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:#7da08b;">Amount</p>
                        <p style="margin:4px 0 0; font-family:Georgia,'Times New Roman',serif; font-size:32px; font-weight:600; color:#2e2620;">
                            £{{ number_format((float) $gift->amount, 2) }}
                        </p>
                    </td>
                    <td style="padding:20px 24px; text-align:right;">
                        <span style="display:inline-block; padding:6px 14px; border-radius:999px; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.04em; background:{{ $statusColors['bg'] }}; color:{{ $statusColors['fg'] }};">
                            {{ $gift->status }}
                        </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Details -->
    <tr>
        <td style="padding:28px 40px 0;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding:10px 0; border-bottom:1px solid #f0ece6; font-size:13px; color:#9a9086; width:110px;">Name</td>
                    <td style="padding:10px 0; border-bottom:1px solid #f0ece6; font-size:14px; color:#2e2620; font-weight:600;">
                        {{ $gift->payer_name ?: 'Not provided yet' }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 0; border-bottom:1px solid #f0ece6; font-size:13px; color:#9a9086;">Email</td>
                    <td style="padding:10px 0; border-bottom:1px solid #f0ece6; font-size:14px; color:#2e2620; font-weight:600;">
                        {{ $gift->payer_email ?: 'Not provided yet' }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 0; font-size:13px; color:#9a9086;">Checkout session</td>
                    <td style="padding:10px 0; font-size:13px; color:#9a9086; font-family:'Courier New',monospace;">
                        {{ $gift->stripe_checkout_session_id ?: 'N/A' }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Message -->
    @if ($gift->message)
    <tr>
        <td style="padding:28px 40px 0;">
            <p style="margin:0 0 8px; font-size:11px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:#e98aa1;">Their message</p>
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-left:3px solid #d9a441; background:#fdfaf5;">
                <tr>
                    <td style="padding:16px 20px; font-family:Georgia,'Times New Roman',serif; font-style:italic; font-size:15px; line-height:1.65; color:#2e2620;">
                        &ldquo;{{ $gift->message }}&rdquo;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @endif

    <!-- CTA -->
    <tr>
        <td style="padding:32px 40px 40px;" align="center">
            <a href="{{ route('admin.gifts') }}" style="display:inline-block; padding:14px 32px; background:linear-gradient(145deg,#e98aa1,#d9a441); color:#ffffff; text-decoration:none; font-weight:700; font-size:14px; border-radius:999px;">
                View in dashboard
            </a>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="padding:20px 40px 32px; border-top:1px solid #f0ece6;">
            <p style="margin:0; font-size:12px; color:#b0a89e; text-align:center;">
                This is an automated notification from the Baby Welcome gifts page.
            </p>
        </td>
    </tr>

</table>
</td>
</tr>
</table>
</body>
</html>
