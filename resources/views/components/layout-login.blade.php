<!--Main Utama pembungkus semua konten-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    
</head>
<body>

  <x-navbare></x-navbare>
 
    <div class="mt-16">
      {{$slot}}
    </div>
  <footer>
      <x-footer></x-footer>
  </footer>
</body>
</html>


