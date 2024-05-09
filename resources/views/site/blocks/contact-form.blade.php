<div class="max-w-2xl mx-auto mt-16">

    <form method="POST" action="{{ route('form.contact') }}">
    
        @csrf
    
        <input type="hidden" name="block_id" value="{{$block->id}}"></input>
    
        @foreach($block->children as $children)
    
        @php
    
        $type = $children->input('type');
        $placeholder = $children->translatedInput('placeholder');
        $name = Str::kebab($children->translatedInput('label'));
        $required = $children->input('required');
    
        @endphp
    
        <label for="{{$name}}" class="label">{{$children->translatedInput('label')}} @if ($required == true)* @endif</label><br>
    
        @switch($type)
    
        @case("email")
        <input type="email" id="{{$name}}" name="{{$name}}" placeholder="{{ $placeholder}}" required="{{ $required }}"><br>
        @break
    
        @case("textarea")
    
        <textarea id="{{$name}}" name="{{$name}}" rows="{{$children->input('rows')}}" cols="50" required="{{ $required }}">
        </textarea>
        @break
    
        @case("select")
    
        <select name="{{$name}}" id="{{$name}}" required="{{ $required }}" class="dropdown">
    
            @foreach($children->children as $child)
    
            @php
    
            $option = $child->translatedInput('option');
    
            $value = Str::kebab($option);
    
            @endphp
           
            <option value="{{ $value}}" class="option-style">{{ $option}}</option>
              
            @endforeach
    
        </select>
    
          
    
        @break
    
        @default
        <input type="text" id="{{$name}}" name="{{$name}}" placeholder="{{ $placeholder}}" required="{{ $required }}" class="p-2 border-2 rounded-lg border-gray-500 w-full mt-2"><br>
        @endswitch
    
        @endforeach
    
        <br>
    <div class="flex justify-between">
    
        <label for="privacy-disclaimer" class="flex space-x-2 items-center"> <input type="checkbox" id="privacy-disclaimer"
                name="privacy-disclaimer" :value="true" required>
              {!!$block->translatedInput('privacy_disclaimer')!!}  </label>
    
        <button type="submit" id="submit" class="bg-blue-400 rounded px-4 py-2">{{$block->translatedInput('submit_button_label')}}</button>
    </div>
    </form>
    </div >
    
    @if(session('message'))
      <div id="message" class="section-contact w-container">
            <div class="success-message">
    
            {!! session('message') !!}
            </div>
        </div>
        @endif
    
    
    @if ($errors)
    <div id="message" class="section-contact w-container">
    
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
    </div>
    @endif
    