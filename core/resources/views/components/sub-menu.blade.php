
<a @isset($menu['children']) v-on:click="showTab('{{$level}}', '{{$menu['key']}}')" @else href="{{ route($menu['key']) }}" @endisset>
    <div class="inline-flex w-full px-3 py-2.5 cursor-pointer {{isset($on) && $on==$menu['key'] ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 '}}">
        <img class="h-5 w-5 my-auto" src="{{url('/assets/'.$ico[$menu['icon']])}}">
        <p class="my-auto ml-3 text-sm font-semibold">{{$menu['name']}}</p>
        @isset($menu['notif'])
            <div class="rounded-xl bg-red-600 text-white text-sm font-semibold px-2.5 py-0.5 ml-auto mr-4 my-auto">
                <?php echo ${$menu['notif']}; ?>
            </div>
        @endisset
    </div>
    @isset($menu['children'])
    <div id="{{$menu['key']}}" name="{{$menu['key']}}" class="thidden pl-{{$margin}}" v-bind:class="{block : {{$level}} == '{{$menu['key']}}'}">
        @foreach($menu['children'] as $ind => $child)
            <x-sub-menu :menu="$child" :on="$on" :margin="$margin+3" :level="$level.'_'.$index" :index="$ind"></x-sub-menu>
        @endforeach
    </div>
    @endisset
</a>
