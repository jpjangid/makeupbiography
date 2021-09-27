@extends('frontend.main.index')

@section('title', $page->meta_title != '' ? $page->meta_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('description',$page->meta_description != '' ? $page->meta_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('keywords',$page->keywords != '' ? $page->keywords : '')
@section('og_title', $page->og_title != '' ? $page->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('og_description',$page->og_description != '' ? $page->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('og_image',$page->og_image != '' ? asset('storage/blogs/'.$page->og_image) : '')
@section('twitter_title', $page->og_title != '' ? $page->og_title : 'Buy Beauty Products Online | MakeUp Products Store In Bangalore')
@section('twitter_description',$page->og_description != '' ? $page->og_description : 'Are you looking for the best deals on all makeup and beauty brands? MakeUp Biography is your one stop solution for all your beauty related requirements.')
@section('twitter_image',$page->og_image != '' ? asset('storage/blogs/'.$page->og_image) : '')
@section('twitter_site',url(Request::url()))

@section('script')
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "BlogPosting",
		"headline": "{{ $page->title }}",
		"image": "{{ asset('storage/blogs/'.$page->featured_image) }}",
		"author": {
			"@type": "Organization",
			"name": "Makeupbiography"
		},
		"publisher": {
			"@type": "Organization",
			"name": "https://g.page/makeupbiography?share",
			"logo": {
				"@type": "ImageObject",
				"url": ""
			}
		},
		"datePublished": "{{ date('Y-m-d', strtotime($page->created_at)) }}"
	}
</script>
@endsection

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
          <a itemprop="item" title="Blog" href="{{ $cat != '' ? url('blogs',$cat) : url('blog/all') }}">
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
                <div class="c-post-list__thumb-inner c-post-list__thumb-inner--grid">
                  <a href="{{ url('blogs',['cat' => $blog->category,'slug' => $blog->slug]) }}">
                    <img class="c-post-list__img wp-post-image" src="{{ asset('storage/blogs/'.$blog->featured_image) }}" alt="{{ $blog->alt }}" title="{{ $blog->title }}" sizes="(max-width: 760px) 100vw, 760px" />
                  </a>
                </div>
              </div>
              <div class="c-post-list__wrap c-post-list__wrap--standard c-post-list__wrap--grid   c-post-list__wrap--sidebar ">
                <div class="c-post-list__meta-date  c-post-list__meta-date--with-thumb   c-post-list__meta-date--sidebar  c-post-list__meta-date--grid">{{ date('M d, Y', strtotime($blog->publish_date)) }}</div>
                <a class="c-post-list__header-link" href="{{ url('blogs',['cat' => $blog->category,'slug' => $blog->slug]) }}">
                  <h2 class="c-post-list__header">{{ $blog->title }}</h2>
                </a>
                <div class="c-post-list__except">
                  <p>{{ $blog->short_description }}</p>
                </div>
                <div class="c-post-list__meta-category">
                  <a class="c-post-list__categories-item-link" href="{{ url('blogs',$blog->category) }}" title="View all posts in Cosmetic">{{ $blog->category }}</a>
                </div>
                <a class="c-button c-button--outline c-post-list__continue" href="{{ url('blogs',['cat' => $blog->category,'slug' => $blog->slug]) }}">Read More</a>
                {{-- <a class="c-button c-button--outline c-post-list__continue" href="{{ url('blogdetail',$blog->slug) }}">Read More</a> --}}
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
              @foreach($categories as $category)
                <li class="cat-item cat-item-43">
                  <a href="{{ url('blogs',$category) }}">{{ ucfirst($category) }}</a>
                </li>
              @endforeach
            </ul>
          </aside>
          <!-- <aside id="search-3" class="widget widget_search">
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
          </aside> -->
          <aside id="ideapark_latest_posts_widget-3" class="widget custom-lps-widget">
            <div class="widget-title">Latest Posts</div>
            <ul class="c-lp-widget">
              @for($i = 0; $i < 4; $i++)
                @if(isset($blogs[$i]))
                  <li class="c-lp-widget__item c-lp-widget__item--thumb">
                    <div class="c-lp-widget__thumb">
                      <a href="{{ $blogs[$i]->slug }}" rel="bookmark">
                        <img style="height: 3.5rem !important; width: auto;" src="{{ asset('storage/blogs/'.$blogs[$i]->featured_image) }}" alt="{{ $blogs[$i]->alt }}" title="{{ $blogs[$i]->title }}" loading="lazy"/>
                      </a>
                    </div>
                    <div class="c-lp-widget__content">
                      <a href="{{ $blogs[$i]->slug }}" rel="bookmark">
                        <div class="c-lp-widget__title">{{ $blogs[$i]->title }}</div>
                      </a>
                      <div class="c-lp-widget__date">{{ date('M d, Y', strtotime($blogs[$i]->publish_date)) }}</div>
                    </div>
                  </li>
                @endif
              @endfor
            </ul>
          </aside>
          <aside id="tag_cloud-2" class="widget widget_tag_cloud">
            <div class="widget-title">Tags</div>
            <div class="tagcloud">
              @foreach($finaltags as $tag)
                <a href="{{ url('blogs/tag',$tag) }}" class="tag-cloud-link tag-link-44 tag-link-position-1" style="font-size: 22pt;">{{ $tag }}</a>
              @endforeach
            </div>
          </aside>
        </aside>
      </div>
    </div>
  </div>
</div>
<!-- /.l-inner -->
@endsection