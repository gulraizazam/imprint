<!-- //footer style Nine   -->
<footer id="footerNine"  class="footer-area footer-nine footer-desktop d-none d-lg-block d-xl-block">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="row">
                <div class="col-6">
                    <div class="footer-image mb-4">
                      <h5>@lang('website.DOWNLOAD OUR APP')</h5>
                      <a href="{{$result['commonContent']['setting'][109]->value}}"><img class="img-fluid" src="{{asset('web/images/miscellaneous/google-play-btn.png')}}"></a>
                      <a href="{{$result['commonContent']['setting'][110]->value}}"><img class="img-fluid" src="{{asset('web/images/miscellaneous/app-store-btn.png')}}"></a>
                    </div>
                    <div class="footer-image mb-3">
                        <h5>@lang('website.We Using safe payments')</h5>
                          <img class="img-fluid" src="{{asset('web/images/miscellaneous/payments.png')}}">
                      </div>
                </div>
                <div class="col-6">
                    <h5>@lang('website.COMPANY INFORMATION')</h5>
                    <ul class="links-list pl-0 mb-0">
                    <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.ABOUT US')</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.Privacy')</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.Delivery Terms')</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.Terms And Conditions')</a> </li>
                    
                  </ul>
                </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="single-footer single-footer-left">
                  <h5>@lang('website.Account')</h5>
                  
                  <ul class="links-list pl-0 mb-0">
                    
                    
                    <li> <a href="{{ URL::to('/orders')}}"><i class="fa fa-angle-right"></i>@lang('website.Orders')</a> </li>
                    <li> <a href="{{ URL::to('/viewcart')}}"><i class="fa fa-angle-right"></i>@lang('website.Shopping Cart')</a> </li>
                    <li> <a href="{{ URL::to('/wishlist')}}"><i class="fa fa-angle-right"></i>@lang('website.Wishlist')</a> </li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <h5>@lang('website.Support')</h5>
                
                <ul class="links-list pl-0 mb-0">
                  @if(count($result['commonContent']['pages']))
                      @foreach($result['commonContent']['pages'] as $page)
                          <li> <a href="{{ URL::to('/page?name='.$page->slug)}}"><i class="fa fa-angle-right"></i>{{$page->name}}</a> </li>
                      @endforeach
                  @endif
                  <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.Request Qoute')</a> </li>
                  <li> <a href="{{ URL::to('/contact')}}"><i class="fa fa-angle-right"></i>@lang('website.Contact Us')</a> </li>
                  <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.Live Chat')</a> </li>
                  <li> <a href="#"><i class="fa fa-angle-right"></i>@lang('website.FAQ')</a> </li>
                </ul>
              </div>
              <div class="col-12 col-lg-5">
                  <h5>@lang('website.Contact Us')</h5>
                  
                  <ul class="contact-list  pl-0 mb-0">
                    <li> <i class="fas fa-map-marker"></i><span>{{$result['commonContent']['setting'][4]->value}} {{$result['commonContent']['setting'][5]->value}} {{$result['commonContent']['setting'][6]->value}}, {{$result['commonContent']['setting'][7]->value}} {{$result['commonContent']['setting'][8]->value}}</span> </li>
                    <li> <i class="fas fa-phone"></i><span dir="ltr">({{$result['commonContent']['setting'][11]->value}})</span> </li>
                    <li style="border: 1px solid black;padding:10px;">

                      <form>
                        <h5>JOIN EMAIL LIST</h5>
                        <label>Email</label>
                        <input type="email" name="joinemail" class="form-control">
                        <label>Confirm Email</label>
                        <input type="email" name="joinemail" class="form-control">
                        <button class="btn btn-secondary btn-block" style="margin-top: 10px;">Join</button>
                      </form> 
                    </li>
                  </ul>

              </div>
            </div>

          </div>

        </div>

      </div>
      <div class="container-fluid p-0">
        <div class="social-content">
            <div class="container">
              <div class="social-div">
                <div class="row align-items-center justify-content-between">
                  
                  <div class="col-12 col-md-4">
                        
                        <div class="footer-info">
                          © @lang('website.Copy Rights').  <a href="{{url('/page?name=refund-policy')}}">@lang('website.Privacy')</a>&nbsp;&bull;&nbsp;<a href="{{url('/page?name=term-services')}}">@lang('website.Terms')</a>
                        </div>
                  </div>
                  <div class="col-12 col-md-4">
                          <ul class="social">
                              <li>
                                @if(!empty($result['commonContent']['setting'][50]->value))
                                  <a href="{{$result['commonContent']['setting'][50]->value}}" class="fab fa-facebook-f" target="_blank"></a>
                                  @else
                                    <a href="#" class="fab fa-facebook-f"></a>
                                  @endif
                              </li>
                              <li>
                              @if(!empty($result['commonContent']['setting'][52]->value))
                                  <a href="{{$result['commonContent']['setting'][52]->value}}" class="fab fa-twitter" target="_blank"></a>
                              @else
                                  <a href="#" class="fab fa-twitter"></a>
                              @endif</li>
                              <li>
                              @if(!empty($result['commonContent']['setting'][51]->value))
                                  <a href="{{$result['commonContent']['setting'][51]->value}}"  target="_blank"><i class="fab fa-google"></i></a>
                              @else
                                  <a href="#"><i class="fab fa-google"></i></a>
                              @endif
                              </li>
                              <li>
                              @if(!empty($result['commonContent']['setting'][53]->value))
                                  <a href="{{$result['commonContent']['setting'][53]->value}}" class="fab fa-linkedin-in" target="_blank"></a>
                              @else
                                  <a href="#" class="fab fa-linkedin-in"></a>
                              @endif
                              </li>

                          </ul>
                  </div>
                </div>
            </div>
            </div>  
        </div>
    </div>
</footer>
