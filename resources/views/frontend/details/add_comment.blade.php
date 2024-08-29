@if (Auth::user())
<div class="anime__details__form">
    <div class="section-title">
        <h5>Your Comment</h5>
    </div>
    <form  method="post" action="{{ route('store.comment') }}" >
        @csrf
        <input type="hidden" name="show_id" value="{{ $shows->id }}">
        <textarea name="comment" placeholder="Add your comment" required></textarea>
        <button type="submit">Post Comment</button>
    </form>

</div>
@else

<p class="alert alert-success"> Login To Add Comment </p>
@endif


