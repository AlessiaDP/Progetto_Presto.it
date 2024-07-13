<form class="d-inline" method="POST" action="{{route('setLocale', $lang)}}">
    @csrf
    <button class="btn" type="submit">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" alt="..." width="32" height="32">  - <span class="locale-text">{{__('ui.' . $lang)}}</span>
    </button>
</form>