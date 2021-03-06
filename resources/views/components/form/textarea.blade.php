@props(['label','icon','placeholder', 'name'])
<div class="row">  
    
    <div class="col mb-3">
      @isset($label)
      <label class="form-label" for="{{$name}}">{{$label}}</label>
      @endisset
      
      <div class="input-group input-group-merge">
        <span  class="input-group-text"><i class="bx {{$icon}}"></i></span>
        <textarea class="form-control" id="{{$name}}" 
            wire:model.defer='{{ $name }}' name="{{ $name }}"
            @isset($placeholder)
                placeholder="{{$placeholder}}" aria-label="{{$placeholder}}"
            @endisset
        ></textarea>
        <x-form.error :name="$name" />
      </div>
    </div>
</div>