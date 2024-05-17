<div class="py-10 mx-auto max-w-2xl px-5 md:px-0">

    <form method="POST" action="{{ route('form.contact') }}" id="contact-form">

        @csrf

        <input type="hidden" name="block_id" value="{{$block->id}}"></input>

        @foreach($block->children as $children)

        @php

        $type = $children->input('type');
        $placeholder = $children->translatedInput('placeholder');
        $name = Str::kebab($children->translatedInput('label'));
        $required = $children->input('required');

        @endphp

        <label for="{{$name}}">{{$children->translatedInput('label')}} @if ($required == true)* @endif</label><br>

        @switch($type)

        @case("email")
        <input type="email" id="{{$name}}" name="{{$name}}" placeholder="{{ $placeholder}}" required="{{ $required }}"
            class="p-2 border-2 rounded-lg border-gray-500 w-full mt-2 mb-6"><br>
        @break

        @case("textarea")

        <textarea id="{{$name}}" name="{{$name}}" rows="{{$children->input('rows')}}" cols="50"
            required="{{ $required }}" class="p-2 border-2 rounded-lg border-gray-500 w-full mt-2 mb-6">
        </textarea>
        @break

        @case("select")

        <select name="{{$name}}" id="{{$name}}" required="{{ $required }}"
            class="p-2 border-2 rounded-lg border-gray-500 w-full mt-2 mb-6">

            @foreach($children->children as $child)

            @php

            $option = $child->translatedInput('option');

            $value = Str::kebab($option);

            @endphp

            <option value="{{ $value}}" class="pt-2">{{ $option}}</option>

            @endforeach

        </select>



        @break

        @default
        <input type="text" id="{{$name}}" name="{{$name}}" placeholder="{{ $placeholder}}" required="{{ $required }}"
            class="p-2 border-2 rounded-lg border-gray-500 w-full mt-2 mb-6"><br>
        @endswitch

        @endforeach

        <br>
        <div class="mt-5">

            <label for="privacy-disclaimer" class="flex space-x-2 items-center ">
                <input type="checkbox" id="privacy-disclaimer" name="privacy-disclaimer" :value="on" required>
                <p class="break-words">{!!$block->translatedInput('privacy_disclaimer')!!}</p>
            </label>
            <div class="flex justify-end mt-6">
            <button type="submit" id="submit"
                class="bg-blue-400 rounded h-10 px-4">{{$block->translatedInput('submit_button_label')}}</button>
            </div>
        </div>
        <div id="privacy-disclaimer-error" class="text-red-500"></div>
    </form>
</div>

<div id="message-success" class="text-green-600 font-semibold max-w-2xl mx-auto px-5 md:px-0 break-words"></div>

<div id="message-error" class="text-red-500 font-semibold max-w-2xl mx-auto px-5 md:px-0 break-words"></div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('assets/js/form.js') }}" type="text/javascript"></script>

<style>
    .disabled-style {
        opacity: 0.5;
        pointer-events: none;
       
    }
</style>