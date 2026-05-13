<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Inquiry Received - ZUE</title>
    <style type="text/css">
        /* Base Styles */
        body {
            background-color: #fff8f6;
            color: #2c160e;
            font-family: 'Montserrat', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100% !important;
            -webkit-text-size-adjust: none;
        }
        table {
            border-collapse: collapse;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        
        /* Layout */
        .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: #fff8f6;
        }
        .email-content {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Components */
        .container {
            padding: 40px 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .greeting {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 32px;
            color: #7b5455;
            margin-bottom: 16px;
            font-style: italic;
            line-height: 1.2;
        }
        .greeting-sub {
            font-size: 16px;
            color: #705959;
            line-height: 1.6;
        }
        .card {
            background-color: #fff1ed;
            border: 1px solid #d4c2c2;
            border-radius: 24px;
            padding: 24px;
            margin-bottom: 40px;
        }
        .card-title {
            font-size: 18px;
            color: #7b5455;
            margin-bottom: 20px;
            border-bottom: 1px solid #d4c2c2;
            padding-bottom: 8px;
            display: inline-block;
        }
        .detail-label {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #827473;
            margin-bottom: 4px;
        }
        .detail-value {
            font-size: 15px;
            color: #2c160e;
            font-weight: 500;
            margin-bottom: 16px;
        }
        .detail-message {
            font-size: 15px;
            color: #2c160e;
            font-style: italic;
            line-height: 1.5;
        }
        .brand-section {
            text-align: center;
            margin-bottom: 40px;
        }
        .brand-title {
            font-size: 22px;
            color: #7b5455;
            margin-bottom: 16px;
        }
        .brand-body {
            font-size: 15px;
            color: #705959;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .closing-note {
            font-size: 14px;
            color: #827473;
            font-style: italic;
        }
        .cta-section {
            text-align: center;
            margin-bottom: 40px;
        }
        .button {
            background-color: #d4a5a5;
            color: #ffffff !important;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            display: inline-block;
            font-family: 'Montserrat', Helvetica, Arial, sans-serif;
        }
        .footer-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff1ed;
            border-top: 1px solid #d4c2c2;
            border-radius: 40px 40px 0 0;
            padding: 40px 20px;
            text-align: center;
            box-sizing: border-box;
        }
        .footer-brand {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 24px;
            color: #7b5455;
            font-style: italic;
            margin-bottom: 24px;
        }
        .footer-links a {
            color: #705959;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }
        .copyright {
            margin-top: 24px;
            font-size: 11px;
            color: #827473;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Mobile Adjustments */
        @media only screen and (max-width: 600px) {
            .container {
                padding: 30px 15px !important;
            }
            .greeting {
                font-size: 26px !important;
            }
            .card {
                padding: 20px 15px !important;
            }
            .detail-col {
                display: block !important;
                width: 100% !important;
            }
            .footer-container {
                border-radius: 30px 30px 0 0 !important;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="email-wrapper">
        <tr>
            <td align="center">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="email-content">
                    <tr>
                        <td class="container">
                            <!-- Logo -->
                            <div class="header" style="margin-bottom: 20px;">
                                <img src="{{ cloud_asset('assets/logo/zue-round.jpeg') }}" alt="ZUE Logo" width="100" style="border-radius: 50%;">
                            </div>
                            
                            <!-- Greeting -->
                            <div class="header">
                                <h1 class="greeting">Bonjour {{ $inquiry->name }},</h1>
                                <p class="greeting-sub">
                                    {{ $settings['inquiry_email_greeting'] ?? "We've received your sweet inquiry! Our artisans are already dreaming up ways to make your celebration truly unforgettable." }}
                                </p>
                            </div>

                            <!-- Inquiry Details Card -->
                            <div class="card">
                                <h2 class="card-title">Your Request Details</h2>
                                
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="50%" valign="top" class="detail-col">
                                            <div class="detail-label">Name</div>
                                            <div class="detail-value">{{ $inquiry->name }}</div>
                                        </td>
                                        <td width="50%" valign="top" class="detail-col">
                                            <div class="detail-label">Phone</div>
                                            <div class="detail-value">{{ $inquiry->phone ?? 'N/A' }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%" valign="top" class="detail-col">
                                            <div class="detail-label">Event Date</div>
                                            <div class="detail-value">{{ $inquiry->event_date ? $inquiry->event_date->format('F j, Y') : 'N/A' }}</div>
                                        </td>
                                        <td width="50%" valign="top" class="detail-col">
                                            <div class="detail-label">Desired Dessert</div>
                                            <div class="detail-value">{{ $inquiry->product_interest ?? 'N/A' }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <div class="detail-label">Message</div>
                                            <div class="detail-message">"{{ $inquiry->message }}"</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Brand Message Section -->
                            <div class="brand-section">
                                <h3 class="brand-title">{{ $settings['inquiry_email_brand_title'] ?? "The Art of Handcrafting" }}</h3>
                                <p class="brand-body">
                                    {{ $settings['inquiry_email_brand_body'] ?? "Each creation at ZUE is a bespoke masterpiece, handcrafted with seasonal ingredients and traditional Parisian techniques. Because we treat baking as a fine art, please note that minor artistic variations occur, ensuring your cake is as unique as your event." }}
                                </p>
                                <p class="closing-note">
                                    {{ $settings['inquiry_email_closing_note'] ?? "Our team will review your request and get back to you within 24-48 business hours with a personalized quote." }}
                                </p>
                            </div>

                            <!-- CTA Section -->
                            <div class="cta-section">
                                <a href="{{ whatsapp_link('Hi, I just submitted an inquiry and would like to follow up!') }}" class="button">
                                    Continue on WhatsApp
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Footer -->
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="email-content">
                    <tr>
                        <td align="center">
                            <div class="footer-container">
                                <div class="footer-brand">ZUE</div>
                                <div class="footer-links">
                                    <a href="{{ $settings['instagram_link'] ?? 'https://www.instagram.com/bakebyzue' }}">Instagram</a>
                                    <a href="{{ whatsapp_link() }}">WhatsApp</a>
                                    <a href="{{ config('app.url') }}">Website</a>
                                </div>
                                <div class="copyright">
                                    © {{ date('Y') }} ZUE Home Baked Cakes. Handcrafted with Love.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
