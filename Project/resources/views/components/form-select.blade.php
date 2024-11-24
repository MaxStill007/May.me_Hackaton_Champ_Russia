@props(['label', 'options', 'key'])
<div class="light w-full">
<label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{$label}}</label>
<input {{$attributes->merge(['list' => $key,'class' => "bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"])}}>
</input>
<datalist id="{{$key}}">
    <option value="" disabled {{ request($key) == '' ? 'selected' : '' }}>-</option>
    @foreach ($options as $option)
    <option value="{{$option}}" {{request($key) == $option ? 'selected' : ''}} >{{$option}}</option>
    @endforeach
</datalist>
</div>
