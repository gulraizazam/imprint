<!-- //banner one -->
<div class="banner-one">
    <div class="container">
      <div class="group-banners">
        <div class="pro-heading-title" style="text-align: center">
            <h2> OUR FEATURED CATEGORIES            </h2>
            <p>Here Are Some Of The Newest Products.               </p>
          </div>
          <div class="row">

            @if(count($result['commonContent']['homeBanners'])>0)
             @foreach(($result['commonContent']['homeBanners']) as $homeBanners)
                @if($homeBanners->type==3 or $homeBanners->type==4 or $homeBanners->type==5)
                <div class="col-12 col-md-3">
                  <figure class="banner-image ">
                    <a href="{{ $homeBanners->banners_url}}"><img class="img-fluid" src="{{asset('').$homeBanners->path}}" alt="Banner Image"></a>
                  </figure>
                </div>
              @endif
             @endforeach
            @endif
          </div>

        </div>

    </div>
</div>


