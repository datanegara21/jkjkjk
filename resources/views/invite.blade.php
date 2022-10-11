<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Undangan</title>
    <link rel="stylesheet" href="{{ asset($event->event_template->event_category->layout) }}">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset($event->event_template->template) }}" class="image" style="width: 100%">
        <div class="title">{{ $event->title }}</div>
        <div class="name">{{ $event->name }}</div>
        <div class="details">
            <div class="location">{{ $event->location }}</div>
            <div class="date">{{ $event->date }}</div>
        </div>
        <div class="qrcode">
            {!! QrCode::size(145)->generate(url('event/'.$event->id.'/'.$join->email)) !!}
        </div>
        <div class="name_end">{{ $event->name }}</div>
    </div>
</body>
</html>