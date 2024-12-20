@props(['label', 'key'])
<div class="light w-full">
<label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{$label}}</label>
<input {{$attributes->merge(['value' => request($key), 'type' => 'date', 'class' => "bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"])}}>
</input>
</div>
