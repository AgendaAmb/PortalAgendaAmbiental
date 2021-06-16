<div {{ $attributes }}>
    
    <a href="{{$urlhref}}" {{$isBlank? "target='_blank'":""}} >
        <img class="img-fluid p-xl-4 justify-content-center " src="{{ $imageURL }}">
    </a>
</div>