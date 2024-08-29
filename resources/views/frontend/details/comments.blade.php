
@foreach ($comments as $comment)
<div class="anime__review__item">
    <div class="anime__review__item__pic">
        <img src="{{ asset('frontend/assets/img/anime/review-1.jpg') }}" alt="">
    </div>
    <div class="anime__review__item__text">
       <h6> <strong>{{ $comment->user->name }}</strong> - <span>{{ $comment->created_at->format('Y-m-d H:i') }}</span> </h6>
        <p>{{ $comment->comment }}</p>
    </div>
</div>
@endforeach


