
<div class="section-title">
    <h5>For You</h5>
</div>
@foreach ($forYouShows as $show)
<div class="product__sidebar__comment__item">
    <div class="product__sidebar__comment__item__pic">
        <img width="170" height="170" src="{{ asset($show->image) }}" alt="">
    </div>
    <div class="product__sidebar__comment__item__text">
        <ul>
            <li>Active</li>
            <li>{{ $show->type }}</li>
        </ul>
        <h5><a href="{{ route('show.details',$show->id) }}">{{ $show->name }}</a></h5>
        <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
    </div>
</div>
@endforeach


