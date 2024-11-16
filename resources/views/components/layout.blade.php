<!--Main Utama pembungkus semua konten-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body>

  <x-navbar></x-navbar>
 
    <div class="">
      {{$slot}}
    </div>

</body>
</html>


