@if(session()->has('message'))
    <button type="button">{{session('message')}}</button>  
@endif