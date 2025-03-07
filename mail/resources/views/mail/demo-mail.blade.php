<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motivasyon Mesajı</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .quote {
            font-size: 20px;
            font-style: italic;
            color: #333;
            margin: 20px 0;
        }
        .footer {
            background: #6a11cb;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            background: #2575fc;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn:hover {
            background: #6a11cb;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Günün İlhamı ✨</div>
    <div class="content">
        <p class="quote">"{{$mailBody}}"</p>
        <p>Her yeni gün, hedeflerine bir adım daha yaklaşman için yeni bir fırsattır. Azimli ol ve asla pes etme! 💪</p>
    </div>
    <div class="footer">
        &copy; 2025 | Laleler Birliği | Tüm Hakları Saklıdır
    </div>
</div>

</body>
</html>
