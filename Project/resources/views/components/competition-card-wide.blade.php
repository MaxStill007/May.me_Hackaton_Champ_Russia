@props(['competition'])

<div class="w-full bg-gray-100 rounded-lg p-6 flex">
    <div class="flex-1 flex flex-col">
        <h3 class="self-start text-sm text-gray-400">{{$competition->id}}</h3>
        <h2 class="font-bold text-xl mt-2 group-hover:text-blue-600 transition-colors duration-300">
                {{$competition->type}}
        </h2>
        <p class="text-sm text-gray-400 mt-auto">{{$competition->description}}</p>
    </div>
    <div class="flex flex-col justify-between w-1/5">
        <div class="flex gap-3 items-center justify-end">
            <span class="rounded-lg py-1 px-2 font-bold text-xs text-white bg-blue-700">{{$competition->start_date}}</span>
            <p class="font-bold">-</p>
            <span class="rounded-lg py-1 px-2 font-bold text-xs text-white bg-red-600">{{$competition->end_date}}</span>
        </div>
        <p class="text-xs text-gray-400 mt-auto">{{$competition->location}}</p>
    </div>
</div>
