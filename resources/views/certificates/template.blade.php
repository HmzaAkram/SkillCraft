<html>
<head><style>/* Styles for certificate */</style></head>
<body>
    <h1>Certificate of Completion</h1>
    <p>This certifies that {{ $user->name }} has completed the course {{ $course->name }}.</p>
    <p>Date: {{ now() }}</p>
</body>
</html>