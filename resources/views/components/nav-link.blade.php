<!--Tempat atur link -->
<a {{$attributes}}
  class={{request()->is(`$attributes`)?' bg-gray-900 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white'}} aria-current="page">{{$slot}}</a>