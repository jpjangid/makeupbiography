@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <div data-elementor-type="wp-page" data-elementor-id="2451" class="elementor elementor-2451" data-elementor-settings="[]">
    <div class="elementor-inner">
      <div class="elementor-section-wrap">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-b77975b elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="b77975b" data-element_type="section">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-row">
              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6613dc5" data-id="6613dc5" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                  <div class="elementor-widget-wrap">
                    <div class="elementor-element elementor-element-c29fce2 elementor-widget elementor-widget-ideapark-page-header" data-id="c29fce2" data-element_type="widget" data-widget_type="ideapark-page-header.default">
                      <div class="elementor-widget-container">
                        <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
                          c-page-header--page c-page-header--low">
                          <div class="c-page-header__wrap">
                            <h1 class="c-page-header__title">Brands</h1>
                          </div>
                          <nav class="c-breadcrumbs">
                            <ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
                              <li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" title="Home" href="{{ url('/') }}">
                                  <span itemprop="name">Home</span>
                                </a>
                                <!--
          -->
                                <i class="ip-breadcrumb c-breadcrumbs__separator">
                                  <!-- -->
                                </i>
                                <meta itemprop="position" content="1">
                              </li>
                              <li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" title="Brands" href="{{ url('brands') }}">
                                  <span itemprop="name">Brands</span>
                                </a>
                                <meta itemprop="position" content="2">
                              </li>
                            </ol>
                          </nav>
                        </header>
                        <div class="woocommerce-notices-wrapper">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Top Brands section Begin --> 
        <section class="elementor-section elementor-top-section elementor-element elementor-element-9327e66 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9327e66" data-element_type="section" style="margin-top: 60px !important;">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-row">
              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e649f96" data-id="e649f96" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                  <div class="elementor-widget-wrap">
                    <div class="elementor-element elementor-element-3f62e69 elementor-widget elementor-widget-ideapark-brand-list" data-id="3f62e69" data-element_type="widget" data-widget_type="ideapark-brand-list.default">
                      <div class="elementor-widget-container">
                        <div class="c-ip-brand-list c-ip-brand-list--logos">
                          <ul class="c-ip-brand-list__list c-ip-brand-list__list--logos">
                          @foreach($brands  as $brand)  
                            <li class="c-ip-brand-list__item c-ip-brand-list__item--logos">
                              <a class="c-ip-brand-list__link c-ip-brand-list__link--logos" href="{{ url('brands',['slug'=> $brand->slug]) }}">
                                <div class="c-ip-brand-list__thumb">
                                  <img class="c-ip-brand-list__image" width="224" height="50" src="{{ asset('storage/brands/'.$brand->featured_image) }}" alt="{{ $brand->alt }}" loading="lazy" />
                                </div>
                                <div class="c-ip-brand-list__title c-ip-brand-list__title--logos">{{ $brand->name }}</div>
                              </a>
                            </li>
                          @endforeach 
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Top Brands section End --> 

        <!-- Top Brands List Section Begin --> 
        <section class="elementor-section elementor-top-section elementor-element elementor-element-9327e66 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9327e66" data-element_type="section" style="margin-bottom: 60px !important;">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-row">
              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e649f96" data-id="e649f96" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                  <div class="elementor-widget-wrap">
                    <div class="elementor-element elementor-element-3f62e69 elementor-widget elementor-widget-ideapark-brand-list" data-id="3f62e69" data-element_type="widget" data-widget_type="ideapark-brand-list.default">
                      <div class="elementor-widget-container">
                        <div class="c-ip-brand-list c-ip-brand-list--alpha">
                          <ul class="c-ip-brand-list__list c-ip-brand-list__list--alpha" style="margin-top: 20px !important;">
                            @foreach($brandGroups as $key => $brandGroup)  
                            <li class="c-ip-brand-list__item-parent">
                              <ul class="c-ip-brand-list__list-inner">
                                <li class="c-ip-brand-list__item--letter">{{ ucfirst($key) }}</li>
                                @foreach($brandGroup as $brand1)
                                <li class="c-ip-brand-list__item c-ip-brand-list__item--alpha">
                                  <a class="c-ip-brand-list__link c-ip-brand-list__link--alpha" href="{{ url('brands',['slug'=> $brand1->slug]) }}">
                                    <div class="c-ip-brand-list__title c-ip-brand-list__title--alpha">{{ $brand1->name }}</div>
                                  </a>
                                </li>
                                @endforeach
                              </ul>
                            </li>
                            @endforeach 
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Top Brands List Section End --> 


      </div>
    </div>
  </div>
</div>
@endsection