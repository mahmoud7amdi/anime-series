
<div class="col-lg-4 col-md-4">
    <div class="anime__details__sidebar">
        <div class="section-title">
            <h5>you might like...</h5>
        </div>
        @foreach ($randomShows as $show)
        <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset($show->image) }}">
            <div class="ep">18 / ?</div>
            <div class="view"><i class="fa fa-eye"></i> 9141</div>
            <h5><a href="#">{{ $show->name }}</a></h5>
        </div>
        @endforeach


    </div>
</div>
