<div class="live__product">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="section-title">
                <h4>Live Action</h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="btn__all">
                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($actionShows as $show)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{ asset($show->image) }}">
                    <div class="ep">18 / 18</div>
                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                    <div class="view"><i class="fa fa-eye"></i> {{ $shows->Count() }}</div>
                </div>
                <div class="product__item__text">
                    <ul>
                        <li>Active</li>
                        <li>{{ $show->type }}</li>
                    </ul>
                    <h5><a href="{{ route('show.details',$show->id) }}">{{ $show->name }}</a></h5>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
