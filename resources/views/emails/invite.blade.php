@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Bevestiging Uitnodiging</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
<h1>Bevestiging Uitnodiging</h1>
<p>Beste werkgever,</p>
<p>Hierbij een overzicht van de personen die je hebt uitgenodigd, inclusief de datum en tijd waarop zij komen werken:</p>

<table>
    <thead>
    <tr>
        <th>Kandidaat</th>
        <th>Datum</th>
        <th>Tijd</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($details as $detail)
        <tr>
            <td>{{ $detail['number'] }}</td>
            <td>{{ \Carbon\Carbon::parse($detail['date'])->translatedFormat('d F Y') }}</td>
            <td>{{ $detail['time'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<p style="margin-top: 20px;">
    Wil je een volledig overzicht van de vacature bekijken? Ga dan naar
    <a href="http://145.24.223.220/mijn-vacatures" style="color: #AA0160; text-decoration: none; font-weight: bold;">
        jouw vacatureoverzicht
    </a>.
</p>

<p>Met vriendelijke groet,<br>
    Open Hiring</p>
</body>
</html>
