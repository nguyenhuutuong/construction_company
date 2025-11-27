<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTcons Reply</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px;">

    <div style="max-width: 680px; margin: 0 auto; background: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

        <!-- Logo -->
        <div style="text-align: center; margin-bottom: 25px;">
            <img src="{{ config('app.url') . '/storage/' . setting('site.logo') }}" alt="HTcons Logo" style="max-width: 160px;">
        </div>

        <!-- Header -->
        <h2 style="color: #333; margin-bottom: 10px;">Hello {{ $parentMessage->name }},</h2>
        <p style="color: #555; line-height: 1.6;">
            Thank you for contacting <strong>HTcons</strong>. Below is our response to your inquiry.
        </p>

        <!-- Original Message -->
        <div style="margin-top: 25px;">
            <h4 style="margin: 0 0 10px; color: #333;">Your original message:</h4>
            <blockquote style="
                border-left: 4px solid #007bff;
                padding-left: 15px;
                margin-left: 0;
                color: #555;
                font-style: italic;
                background: #fafafa;
                padding-top: 10px;
                padding-bottom: 10px;
                border-radius: 4px;
            ">
                {{ $parentMessage->message }}
            </blockquote>
        </div>

        <!-- Our Reply -->
        <div style="
            background-color: #eef5ff;
            padding: 20px;
            border-radius: 6px;
            margin-top: 25px;
            border-left: 4px solid #007bff;
        ">
            <h4 style="margin-top: 0; color: #0d47a1;">Our reply:</h4>
            <p style="color: #333; line-height: 1.6;">
                {{ $reply->message }}
            </p>
        </div>

        <!-- Footer -->
        <p style="margin-top: 30px; color: #777; font-size: 14px; text-align: center;">
            Best regards,<br>
            <strong>HTcons Team</strong><br>
            <span style="font-size: 12px; color: #999;">This is an automated email – please do not reply directly.</span>
        </p>
    </div>

</body>
</html>
