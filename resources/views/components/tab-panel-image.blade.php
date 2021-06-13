<div {{ $attributes }}>
    
    <a href="{{$urlhref}}" {{$isBlank? "target='_blank'":""}} >
        <img class="img-fluid p-xl-4" src="{{ $imageURL }}">
    </a>
</div>