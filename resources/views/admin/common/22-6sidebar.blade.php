<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">{{ trans('labels.navigation') }}</li>
        <li class="treeview {{ Request::is('admin/dashboard') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/dashboard/this_month')}}">
            <i class="fa fa-dashboard"></i> <span>{{ trans('labels.header_dashboard') }}</span>
          </a>
        </li>
      <?php
        if( $result['commonContent']['roles'] != null and $result['commonContent']['roles']->language_view == 1){
      ?>
      <li class="treeview {{ Request::is('admin/media/add') ? 'active' : '' }}">
        <a href="{{url('admin/media/add')}}">
          <i class="fa fa-picture-o"></i> <span>{{ trans('labels.media') }}</span> 
        </a>
        
      </li>

      <?php } ?>
     
        
      <?php
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->customers_view == 1){
      ?>
        <li class="treeview {{ Request::is('admin/customers/display') ? 'active' : '' }}  {{ Request::is('admin/customers/add') ? 'active' : '' }}  {{ Request::is('admin/customers/edit/*') ? 'active' : '' }} {{ Request::is('admin/customers/address/display/*') ? 'active' : '' }} {{ Request::is('admin/customers/filter') ? 'active' : '' }} ">
          <a href="{{ URL::to('admin/customers/display')}}">
            <i class="fa fa-users" aria-hidden="true"></i> <span>{{ trans('labels.link_customers') }}</span>
          </a>
        </li>
      <?php } ?>

   
      <?php
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->products_view == 1 or $result['commonContent']['roles']!= null and $result['commonContent']['roles']->categories_view == 1 ){
      ?>
        <li class="treeview {{ Request::is('admin/reviews/display') ? 'active' : '' }}   {{ Request::is('admin/products/display') ? 'active' : '' }} {{ Request::is('admin/products/add') ? 'active' : '' }} {{ Request::is('admin/products/edit/*') ? 'active' : '' }} {{ Request::is('admin/editattributes/*') ? 'active' : '' }} {{ Request::is('admin/products/attributes/display') ? 'active' : '' }}  {{ Request::is('admin/products/attributes/add') ? 'active' : '' }} {{ Request::is('admin/products/attributes/add/*') ? 'active' : '' }} {{ Request::is('admin/addinventory/*') ? 'active' : '' }} {{ Request::is('admin/addproductimages/*') ? 'active' : '' }} {{ Request::is('admin/categories/display') ? 'active' : '' }} {{ Request::is('admin/categories/add') ? 'active' : '' }} {{ Request::is('admin/categories/edit/*') ? 'active' : '' }} {{ Request::is('admin/categories/filter') ? 'active' : '' }} {{ Request::is('admin/products/inventory/display') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-database"></i> <span>{{ trans('labels.Catalog') }}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            
            @if ($result['commonContent']['roles']!= null and $result['commonContent']['roles']->categories_view == 1)
              <li class="{{ Request::is('admin/categories/display') ? 'active' : '' }} {{ Request::is('admin/categories/add') ? 'active' : '' }} {{ Request::is('admin/categories/edit/*') ? 'active' : '' }} {{ Request::is('admin/categories/filter') ? 'active' : '' }}"><a href="{{ URL::to('admin/categories/display')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_main_categories') }}</a></li>
            @endif

            @if ($result['commonContent']['roles']!= null and $result['commonContent']['roles']->products_view == 1)
              <li class="{{ Request::is('admin/products/attributes/display') ? 'active' : '' }}  {{ Request::is('admin/products/attributes/add') ? 'active' : '' }}  {{ Request::is('admin/products/attributes/*') ? 'active' : '' }}" ><a href="{{ URL::to('admin/products/attributes/display' )}}"><i class="fa fa-circle-o"></i> {{ trans('labels.products_attributes') }}</a></li>
             
              <li class="{{ Request::is('admin/products/display') ? 'active' : '' }} {{ Request::is('admin/products/add') ? 'active' : '' }} {{ Request::is('admin/products/edit/*') ? 'active' : '' }} {{ Request::is('admin/products/attributes/add/*') ? 'active' : '' }} {{ Request::is('admin/addinventory/*') ? 'active' : '' }} {{ Request::is('admin/addproductimages/*') ? 'active' : '' }}"><a href="{{ URL::to('admin/products/display')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_all_products') }}</a></li>
              <li class="{{ Request::is('admin/products/inventory/display') ? 'active' : '' }}"><a href="{{ URL::to('admin/products/inventory/display')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.inventory') }}</a></li>
            @endif
            <?php
              $status_check = DB::table('reviews')->where('reviews_read',0)->first();
              if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->reviews_view == 1){
            ?>
              <li class="{{ Request::is('admin/reviews/display') ? 'active' : '' }}">
                <a href="{{ URL::to('admin/reviews/display')}}">
                  <i class="fa fa-circle-o" aria-hidden="true"></i> <span>{{ trans('labels.reviews') }}</span>@if($result['commonContent']['new_reviews']>0)<span class="label label-success pull-right">{{$result['commonContent']['new_reviews']}} {{ trans('labels.new') }}</span>@endif
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>

      <?php
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->orders_view == 1){
      ?>
        <li class="treeview  {{ Request::is('admin/orders/display') ? 'active' : '' }} {{ Request::is('admin/orders/vieworder/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/orders/display')}}" ><i class="fa fa-list-ul" aria-hidden="true"></i> <span> {{ trans('labels.link_orders') }}</span> 
          </a>
          
        </li>
      <?php } ?>
      <?php
            if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->reports_view == 1){
          ?>
        <li class="treeview {{ Request::is('admin/statscustomers') ? 'active' : '' }} {{ Request::is('admin/outofstock') ? 'active' : '' }} {{ Request::is('admin/statsproductspurchased') ? 'active' : '' }} {{ Request::is('admin/statsproductsliked') ? 'active' : '' }} ">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
  <span>{{ trans('labels.link_reports') }}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            
           <!-- <li class="{{ Request::is('admin/productsstock') ? 'active' : '' }} "><a href="{{ URL::to('admin/stockin')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.stockin') }}</a></li>-->
            <li class="{{ Request::is('admin/statscustomers') ? 'active' : '' }} "><a href="{{ URL::to('admin/statscustomers')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_customer_orders_total') }}</a></li>
            <li class="{{ Request::is('admin/statsproductspurchased') ? 'active' : '' }}"><a href="{{ URL::to('admin/statsproductspurchased')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_total_purchased') }}</a></li>
            <li class="{{ Request::is('admin/statsproductsliked') ? 'active' : '' }}"><a href="{{ URL::to('admin/statsproductsliked')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_products_liked') }}</a></li>
          </ul>
        </li>
      <?php } ?>
     
  
      
      <?php
          if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->tax_location_view == 1){
        ?>
          <li class="treeview {{ Request::is('admin/countries/display') ? 'active' : '' }} {{ Request::is('admin/countries/add') ? 'active' : '' }} {{ Request::is('admin/countries/edit/*') ? 'active' : '' }} {{ Request::is('admin/zones/display') ? 'active' : '' }} {{ Request::is('admin/zones/add') ? 'active' : '' }} {{ Request::is('admin/zones/edit/*') ? 'active' : '' }} ">
            <a href="#">
              <i class="fa fa-money" aria-hidden="true"></i>
              <span>{{ trans('labels.link_tax_location') }}</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('admin/countries/display') ? 'active' : '' }} {{ Request::is('admin/countries/add') ? 'active' : '' }} {{ Request::is('admin/countries/edit/*') ? 'active' : '' }} "><a href="{{ URL::to('admin/countries/display')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_countries') }}</a></li>
              <li class="{{ Request::is('admin/zones/display') ? 'active' : '' }} {{ Request::is('admin/zones/add') ? 'active' : '' }} {{ Request::is('admin/zones/edit/*') ? 'active' : '' }}"><a href="{{ URL::to('admin/zones/display')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_zones') }}</a></li>
              
              
              </ul>
          </li>
        <?php } ?>
        <?php
          if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->coupons_view ==1){
        ?>
        <li class="treeview {{ Request::is('admin/coupons/display') ? 'active' : '' }} {{ Request::is('admin/editcoupons/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/coupons/display')}}" ><i class="fa fa-tablet" aria-hidden="true"></i> <span>{{ trans('labels.link_coupons') }}</span></a>
        </li>
      <?php } ?>
     
          <?php
            if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->payment_methods_view == 1){
          ?>
            <li class="treeview {{ Request::is('admin/paymentmethods/index') ? 'active' : '' }} {{ Request::is('admin/paymentmethods/display/*') ? 'active' : '' }}">
              <a  href="{{ URL::to('admin/paymentmethods/index')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>
              {{ trans('labels.link_payment_methods') }}</span>
              </a>
            </li>
          <?php } ?>
         
      <!-- @if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->notifications_view == 1)
      <li class="treeview {{ Request::is('admin/pushnotification') ? 'active' : '' }}{{ Request::is('admin/devices/display') ? 'active' : '' }} {{ Request::is('admin/devices/viewdevices/*') ? 'active' : '' }} {{ Request::is('admin/devices/notifications') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/devices/display')}} ">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
<span>{{ trans('labels.link_notifications') }}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li class="{{ Request::is('admin/pushnotification') ? 'active' : '' }}"><a href="{{ URL::to('admin/pushnotification')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_setting') }}</a></li>
            <li class="{{ Request::is('admin/devices/display') ? 'active' : '' }} {{ Request::is('admin/devices/viewdevices/*') ? 'active' : '' }}">
          		<a href="{{ URL::to('admin/devices/display')}}"><i class="fa fa-circle-o"></i>{{ trans('labels.link_devices') }} </a>
            </li>
            <li class="{{ Request::is('admin/devices/notifications') ? 'active' : '' }} ">
            	<a href="{{ URL::to('admin/devices/notifications') }}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_send_notifications') }}</a>
            </li>
          </ul>
        </li>
        @endif -->
        <?php
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->general_setting_view == 1){
      ?>

        <li class="treeview   {{ Request::is('admin/alertsetting') ? 'active' : '' }}  ">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
  <span> {{ trans('labels.link_general_settings') }}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            
          
            
            <li class="{{ Request::is('admin/alertsetting') ? 'active' : '' }}"><a href="{{ URL::to('admin/alertsetting')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.alertSetting') }}</a></li>
            
            
          </ul>
        </li>
      <?php } ?>
      <?php

      $route =  DB::table('settings')
                 ->where('name','is_web_purchased')
                 ->where('value', 1)
                 ->first();
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->website_setting_view == 1 and $route != null){
      ?>

        <li class="treeview {{ Request::is('admin/instafeed') ? 'active' : '' }} {{ Request::is('admin/newsletter') ? 'active' : '' }} {{ Request::is('admin/menus') ? 'active' : '' }} {{ Request::is('admin/mailchimp') ? 'active' : '' }} {{ Request::is('admin/topoffer/display') ? 'active' : '' }} {{ Request::is('admin/webPagesSettings/*') ? 'active' : '' }} {{ Request::is('admin/homebanners') ? 'active' : '' }} {{ Request::is('admin/sliders') ? 'active' : '' }} {{ Request::is('admin/addsliderimage') ? 'active' : '' }} {{ Request::is('admin/editslide/*') ? 'active' : '' }} {{ Request::is('admin/webpages') ? 'active' : '' }}  {{ Request::is('admin/addwebpage') ? 'active' : '' }}  {{ Request::is('admin/editwebpage/*') ? 'active' : '' }} {{ Request::is('admin/websettings') ? 'active' : '' }} {{ Request::is('admin/webthemes') ? 'active' : '' }} {{ Request::is('admin/customstyle') ? 'active' : '' }} {{ Request::is('admin/constantbanners') ? 'active' : '' }} {{ Request::is('admin/addconstantbanner') ? 'active' : '' }} {{ Request::is('admin/editconstantbanner/*') ? 'active' : '' }}" >
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
            <span> {{ trans('labels.link_site_settings') }}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="treeview {{ Request::is('admin/topoffer/display') ? 'active' : '' }} {{ Request::is('admin/webPagesSettings/*') ? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-picture-o"></i> <span>{{ trans('labels.Theme Setting') }}</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview {{ Request::is('admin/topoffer/display') ? 'active' : '' }} ">
                    <a href="{{url('admin/topoffer/display')}}">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Top Offer') }} </span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('admin/webPagesSettings/1') ? 'active' : '' }} ">
                    <a href="{{url('admin/webPagesSettings')}}/1">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Home Page') }} </span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('admin/webPagesSettings/8') ? 'active' : '' }} ">
                    <a href="{{url('admin/webPagesSettings')}}/8">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.login') }} </span>
                    </a>
                </li>
                
                <li class="treeview {{ Request::is('admin/webPagesSettings/9') ? 'active' : '' }} ">
                  <a href="{{url('admin/webPagesSettings')}}/9">
                      <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.News') }} </span>
                    </a>
                </li>

                <li class="treeview {{ Request::is('admin/webPagesSettings/5') ? 'active' : '' }} ">
                  <a href="{{url('admin/webPagesSettings')}}/5">
                      <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Shop Page Settings') }} </span>
                  </a>
               </li>

                <li class="treeview {{ Request::is('admin/webPagesSettings/2') ? 'active' : '' }} ">
                    <a href="{{url('admin/webPagesSettings')}}/2">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Cart Page Settings') }} </span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('admin/webPagesSettings/6') ? 'active' : '' }} ">
                    <a href="{{url('admin/webPagesSettings')}}/6">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Contact Page Settings') }}</span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('admin/webPagesSettings/7') ? 'active' : '' }} ">
                    <a href="{{url('admin/webPagesSettings')}}/7">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Colors Settings') }}</span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('admin/webPagesSettings/10') ? 'active' : '' }} ">
                  <a href="{{url('admin/webPagesSettings')}}/10">
                      <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Banner Transition Settings') }} </span>
                  </a>
              </li>
                <li class="treeview {{ Request::is('admin/webPagesSettings/4') ? 'active' : '' }} ">
                    <a href="{{url('admin/webPagesSettings')}}/4">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span> {{ trans('labels.Product Page Settings') }} </span>
                    </a>
                </li>
              </ul>
            </li>
           
            <li class="{{ Request::is('admin/sliders') ? 'active' : '' }} {{ Request::is('admin/addsliderimage') ? 'active' : '' }} {{ Request::is('admin/editslide/*') ? 'active' : '' }} "><a href="{{ URL::to('admin/sliders')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_Sliders') }}</a></li>
            
         
           
            <li class="{{ Request::is('admin/menus') ? 'active' : '' }}  {{ Request::is('admin/addmenus') ? 'active' : '' }}  {{ Request::is('admin/editmenus/*') ? 'active' : '' }}"><a href="{{ URL::to('admin/menus')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.menus') }}</a></li>

            

            <!-- <li class="{{ Request::is('admin/webthemes') ? 'active' : '' }} "><a href="{{ URL::to('admin/webthemes')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.website_themes') }}</a></li> -->

            

            
            
            
            <li class="{{ Request::is('admin/websettings') ? 'active' : '' }}"><a href="{{ URL::to('admin/websettings')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_setting') }}</a></li>
          </ul>
        </li>
      <?php } ?>
      <?php
      $route =  DB::table('settings')
                 ->where('name','is_app_purchased')
                 ->where('value', 1)
                 ->first();

        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->application_setting_view == 1 and $route != null){
      ?>

        <li class="treeview {{ Request::is('admin/banners') ? 'active' : '' }} {{ Request::is('admin/addbanner') ? 'active' : '' }} {{ Request::is('admin/editbanner/*') ? 'active' : '' }} {{ Request::is('admin/pages') ? 'active' : '' }}  {{ Request::is('admin/addpage') ? 'active' : '' }}  {{ Request::is('admin/editpage/*') ? 'active' : '' }}  {{ Request::is('admin/appSettings') ? 'active' : '' }} {{ Request::is('admin/admobSettings') ? 'active' : '' }} {{ Request::is('admin/applabel') ? 'active' : '' }} {{ Request::is('admin/addappkey') ? 'active' : '' }} {{ Request::is('admin/applicationapi') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
  <span> {{ trans('labels.link_app_settings') }}</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/banners') ? 'active' : '' }} {{ Request::is('admin/addbanner') ? 'active' : '' }} {{ Request::is('admin/editbanner/*') ? 'active' : '' }}"><a href="{{ URL::to('admin/banners')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_Banners') }}</a></li>

            <li class="{{ Request::is('admin/pages') ? 'active' : '' }}  {{ Request::is('admin/addpage') ? 'active' : '' }}  {{ Request::is('admin/editpage/*') ? 'active' : '' }}"><a href="{{ URL::to('admin/pages')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.content_pages') }}</a></li>

            <li class="{{ Request::is('admin/admobSettings') ? 'active' : '' }}"><a href="{{ URL::to('admin/admobSettings')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_admob') }}</a></li>

            <li class="android-hide {{ Request::is('admin/applabel') ? 'active' : '' }} {{ Request::is('admin/addappkey') ? 'active' : '' }}"><a href="{{ URL::to('admin/applabel')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.labels') }}</a></li>

            <li class="{{ Request::is('admin/applicationapi') ? 'active' : '' }}"><a href="{{ URL::to('admin/applicationapi')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.applicationApi') }}</a></li>

            <li class="{{ Request::is('admin/appsettings') ? 'active' : '' }}"><a href="{{ URL::to('admin/appsettings')}}"><i class="fa fa-circle-o"></i> {{ trans('labels.link_setting') }}</a></li>

          </ul>
        </li>
      <?php } ?>
     
      <?php

        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->manage_admins_view == 1){
      ?>

         <li class="treeview  {{ Request::is('admin/manageroles') ? 'active' : '' }} {{ Request::is('admin/addadminType') ? 'active' : '' }} {{ Request::is('admin/editadminType/*') ? 'active' : '' }}">
          <a href="{{ URL::to('admin/manageroles')}}">
            <i class="fa fa-users" aria-hidden="true"></i>
        <span> {{ trans('labels.Manage Admins') }}</span> 
          </a>

          
        </li>
        <?php 
        }
        ?>
        

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
