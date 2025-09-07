<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificate</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            text-align: center;
            background-color: #ffffff;
            padding: 50px;
        }
        .certificate {
            border: 8px solid #2c3e50;
            padding: 40px;
            margin: auto;
            max-width: 800px;
        }
        h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 26px;
            margin: 15px 0;
        }
        p {
            font-size: 18px;
            margin: 8px 0;
        }
        .name {
            font-size: 28px;
            font-weight: bold;
            margin: 20px 0;
        }
        .course {
            font-size: 22px;
            color: #2c3e50;
            margin: 15px 0;
        }
        .date {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <h1>Certificate of Completion</h1>
        <p>This certificate is proudly presented to</p>

        <div class="name">{{ $user->name }}</div>

        <p>for successfully completing the course</p>

        <div class="course">{{ $course->name }}</div>

        <p class="date">Date: {{ now()->format('F d, Y') }}</p>
    </div>
</body>
</html>
