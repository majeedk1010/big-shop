@props(['txt', 'iconL', 'iconR'])

<li>
    <a {{ $attributes->class(['text-sm flex items-center gap-x-4 cursor-pointer p-2  hover:bg-slate-400 hover:text-slate-900 rounded-md mt-2'])->merge(['href'=>'#']) }}>
       <span class="text-xl float-left block">
           <i class="{{ isset($iconL)?$iconL:' hidden' }}"></i>
       </span>
       <span x-show="open" class="text-base font-medium flex-1">{{ isset($txt)?$txt:'' }}</span>
        <i x-show="open" :class="sub?'rotate-180':''" class="{{ isset($iconR)?$iconR:' hidden' }}"></i>
    </a>
</li>
