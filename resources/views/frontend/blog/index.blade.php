@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--post">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">Blog</h1>
    </div>
    <nav class="c-breadcrumbs">
      <ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="c-breadcrumbs__item  c-breadcrumbs__item--first  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="Home" href="{{ url('') }}">
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
          <a itemprop="item" title="Blog" href="{{ url('blog/all') }}">
            <span itemprop="name">Blog</span>
          </a>
          <!--
						-->
          <i class="ip-breadcrumb c-breadcrumbs__separator">
            <!-- -->
          </i>
          <meta itemprop="position" content="2">
        </li>
        <li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="Blog" href="{{ $cat != '' ? url('blog',$cat) : url('blog/all') }}">
            <span itemprop="name">{{ $cat != '' ? $cat : 'ALL' }}</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="c-blog l-section l-section--container l-section--top-margin-80 l-section--bottom-margin  l-section--with-sidebar">
    <div class="l-section__content  l-section__content--with-sidebar">
      <div class="c-blog-wrap  c-blog-wrap--grid   c-blog-wrap--sidebar ">
        <div class=" c-blog__grid js-post-masonry   js-sticky-sidebar-nearby ">
          @foreach($blogs as $blog)
            <article id="post-142" class="c-post-list c-post-list--standard c-post-list--grid c-post-list--sidebar c-post-list--with-thumb c-post-list--post js-post-item post-142 post type-post status-publish format-standard has-post-thumbnail hentry category-cosmetic category-fashion tag-cosmetic tag-trends">
              <div class="c-post-list__thumb c-post-list__thumb--standard c-post-list__thumb--grid">
                <a href="{{ url('blogdetail',$blog->slug) }}">
                  <img style="width:auto; height: 18rem !important;" src="{{ asset('storage/blogs/'.$blog->featured_image) }}" alt="{{ $blog->alt }}" sizes="(max-width: 760px) 100vw, 760px" />
                </a>
              </div>
              <div class="c-post-list__wrap c-post-list__wrap--standard c-post-list__wrap--grid   c-post-list__wrap--sidebar ">
                <div class="c-post-list__meta-date  c-post-list__meta-date--with-thumb   c-post-list__meta-date--sidebar  c-post-list__meta-date--grid">{{ date('M d, Y', strtotime($blog->publish_date)) }}</div>
                <a class="c-post-list__header-link" href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/">
                  <h2 class="c-post-list__header">{{ $blog->title }}</h2>
                </a>
                <div class="c-post-list__except">
                  <p>{{ $blog->short_description }}</p>
                </div>
                <div class="c-post-list__meta-category">
                  <a class="c-post-list__categories-item-link" href="{{ url('blog',$blog->category) }}" title="View all posts in Cosmetic">{{ $blog->category }}</a>
                </div>
                <a class="c-button c-button--outline c-post-list__continue" href="{{ url('blogdetail',$blog->slug) }}">Read More</a>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </div>
    <div class="l-section__sidebar l-section__sidebar--right">
      <div class="c-post-sidebar-wrap">
        <aside id="sidebar" class="c-sidebar c-post-sidebar  js-sticky-sidebar ">
          <aside id="categories-3" class="widget widget_categories">
            <div class="widget-title">Categories</div>
            <ul>
              <li class="cat-item cat-item-43">
                <a href="{{ url('blog/Beauty') }}">Beauty</a>
              </li>
              <li class="cat-item cat-item-40">
                <a href="{{ url('blog/Cosmetic') }}">Cosmetic</a>
              </li>
              <li class="cat-item cat-item-42">
                <a href="{{ url('blog/Fashion') }}">Fashion</a>
              </li>
            </ul>
          </aside>
          <aside id="search-3" class="widget widget_search">
            <div class="widget-title">Search</div>
            <div class="c-search-form">
              <form role="search" method="get" class="js-search-form-entry" action="https://parkofideas.com/luchiana/demo/">
                <div class="c-search-form__wrap">
                  <label class="c-search-form__label">
                    <span class="screen-reader-text">Search for:</span>
                    <input class="c-form__input c-form__input--full c-search-form__input" type="search" placeholder="Search &hellip;" value="" name="s" />
                  </label>
                  <button type="submit" class="c-button c-search-form__button">
                    <i class="ip-search c-search-form__svg"></i>
                  </button>
                </div>
              </form>
            </div>
          </aside>
          <aside id="ideapark_latest_posts_widget-3" class="widget custom-lps-widget">
            <div class="widget-title">Latest Posts</div>
            <ul class="c-lp-widget">
              <li class="c-lp-widget__item c-lp-widget__item--thumb">
                <div class="c-lp-widget__thumb">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/" rel="bookmark">
                    <img width="115" height="115" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-115x115.jpg" class="c-lp-widget__thumb-img wp-post-image" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-70x70.jpg 70w" sizes="(max-width: 115px) 100vw, 115px" />
                  </a>
                </div>
                <div class="c-lp-widget__content">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/" rel="bookmark">
                    <div class="c-lp-widget__title">New Trends in 2020</div>
                  </a>
                  <div class="c-lp-widget__date">October 20, 2020</div>
                </div>
              </li>
              <li class="c-lp-widget__item c-lp-widget__item--thumb">
                <div class="c-lp-widget__thumb">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/20/video-post/" rel="bookmark">
                    <img width="115" height="115" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-115x115.jpg" class="c-lp-widget__thumb-img wp-post-image" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-70x70.jpg 70w" sizes="(max-width: 115px) 100vw, 115px" />
                  </a>
                </div>
                <div class="c-lp-widget__content">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/20/video-post/" rel="bookmark">
                    <div class="c-lp-widget__title">Video post</div>
                  </a>
                  <div class="c-lp-widget__date">October 20, 2020</div>
                </div>
              </li>
              <li class="c-lp-widget__item c-lp-widget__item--thumb">
                <div class="c-lp-widget__thumb">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/" rel="bookmark">
                    <img width="115" height="115" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-115x115.jpg" class="c-lp-widget__thumb-img wp-post-image" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-70x70.jpg 70w" sizes="(max-width: 115px) 100vw, 115px" />
                  </a>
                </div>
                <div class="c-lp-widget__content">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/" rel="bookmark">
                    <div class="c-lp-widget__title">Gallery post</div>
                  </a>
                  <div class="c-lp-widget__date">October 20, 2020</div>
                </div>
              </li>
              <li class="c-lp-widget__item c-lp-widget__item--thumb">
                <div class="c-lp-widget__thumb">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/18/remember-trends/" rel="bookmark">
                    <img width="115" height="115" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959020724-115x115.jpg" class="c-lp-widget__thumb-img wp-post-image" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959020724-115x115.jpg 115w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959020724-70x70.jpg 70w" sizes="(max-width: 115px) 100vw, 115px" />
                  </a>
                </div>
                <div class="c-lp-widget__content">
                  <a href="https://parkofideas.com/luchiana/demo/2020/10/18/remember-trends/" rel="bookmark">
                    <div class="c-lp-widget__title">Remember trends</div>
                  </a>
                  <div class="c-lp-widget__date">October 18, 2020</div>
                </div>
              </li>
            </ul>
          </aside>
          <aside id="tag_cloud-2" class="widget widget_tag_cloud">
            <div class="widget-title">Tags</div>
            <div class="tagcloud">
              <a href="https://parkofideas.com/luchiana/demo/tag/cosmetic/" class="tag-cloud-link tag-link-44 tag-link-position-1" style="font-size: 22pt;" aria-label="cosmetic (3 items)">cosmetic</a>
              <a href="https://parkofideas.com/luchiana/demo/tag/gallery/" class="tag-cloud-link tag-link-38 tag-link-position-2" style="font-size: 8pt;" aria-label="gallery (1 item)">gallery</a>
              <a href="https://parkofideas.com/luchiana/demo/tag/make-up/" class="tag-cloud-link tag-link-47 tag-link-position-3" style="font-size: 8pt;" aria-label="make up (1 item)">make up</a>
              <a href="https://parkofideas.com/luchiana/demo/tag/slider/" class="tag-cloud-link tag-link-39 tag-link-position-4" style="font-size: 8pt;" aria-label="slider (1 item)">slider</a>
              <a href="https://parkofideas.com/luchiana/demo/tag/trends/" class="tag-cloud-link tag-link-45 tag-link-position-5" style="font-size: 16.4pt;" aria-label="trends (2 items)">trends</a>
              <a href="https://parkofideas.com/luchiana/demo/tag/video/" class="tag-cloud-link tag-link-48 tag-link-position-6" style="font-size: 8pt;" aria-label="video (1 item)">video</a>
            </div>
          </aside>
        </aside>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection