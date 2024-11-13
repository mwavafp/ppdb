
  <x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    @foreach ($post as $item)<!--Contoh penggunaan untuk perulangan-->
    <article class="py8 max-w-screen-md ">
      <h2 class="text-xl">{{$item['title']}}</h2>
      <div>
        <a href="/pengumuman/{{$item['id']}}">{{$item['link']}}</a> | 2014<!--Contoh penggunaan untuk blog/pengumuman-->
      </div>
      <div>
        {{$item['desk']}}
      </div>
    </article>
    @endforeach
    
  </x-layout>
