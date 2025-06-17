<button id="{{$id ?? 'button'}}" {{$data ?? ''}}
    class="group bg-btn-primary hover:bg-yellow-600 text-white rounded-lg
                        text-sm font-semibold transition-all duration-300 shadow-lg hover:shadow-xl
                        transform hover:-translate-y-0.5 cursor-pointer {{$additionalClasses ?? ''}}">
    <span class="flex items-center gap-3">
        <span>
            @if($hasIcon ?? false)
                <svg class="w-5 h-5 transition-transform group-hover:rotate-90 duration-300" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
            @endif
        </span>
        {{$slot}}
    </span>
</button>
