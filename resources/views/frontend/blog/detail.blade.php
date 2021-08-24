@extends('frontend.main.index')

@section('content')
<div class="l-inner">
  <header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default
 c-page-header--post">
    <div class="c-page-header__wrap">
      <h1 class="c-page-header__title">{{ $blog->title }}</h1>
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
        <li class="c-breadcrumbs__item  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
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
        <li class="c-breadcrumbs__item  " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="2020" href="{{ url('blog', $blog->category) }}">
            <span itemprop="name">{{ $blog->category }}</span>
          </a>
          <!--
						-->
          <i class="ip-breadcrumb c-breadcrumbs__separator">
            <!-- -->
          </i>
          <meta itemprop="position" content="3">
        </li>
        <li class="c-breadcrumbs__item   c-breadcrumbs__item--last " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" title="{{ $blog->title }}" href="{{ url('blogdetail',$blog->slug) }}">
            <span itemprop="name">{{ $blog->title }}</span>
          </a>
          <meta itemprop="position" content="6">
        </li>
      </ol>
    </nav>
  </header>
  <div class="woocommerce-notices-wrapper">
  </div>
  <div class="l-section l-section--container l-section--bottom-margin l-section--with-sidebar l-section--top-margin-80">
    <div class="l-section__content l-section__content--with-sidebar">
      <div class="js-sticky-sidebar-nearby">
        <article id="post-142" class="c-post c-post--standard c-post--sidebar post-142 post type-post status-publish format-standard has-post-thumbnail hentry category-cosmetic category-fashion tag-cosmetic tag-trends">
          <div class="c-post__thumb c-post__thumb--standard  c-post__thumb--image ">
            <img width="1120" height="630" class="c-post__img" src="{{ asset('storage/blogs/'.$blog->featured_image) }}" alt="{{ $blog->alt }}" title="{{ $blog->title }}" />
          </div>
          <div class="c-post__wrap  c-post__wrap--thumb   c-post__wrap--sidebar ">
            <div class="c-post__inner">
              <ul class="c-page__meta c-page__meta--sidebar">
                <li class="c-page__meta-item">By
                  Admin
                </li>
                <li class="c-page__meta-item">{{ date('M d, Y', strtotime($blog->publish_date)) }}</li>
                <li class="c-page__meta-item">
                  <a class="c-page__categories-item-link" href="{{ url('blog', $blog->category) }}" title="View all posts in Cosmetic">Cosmetic</a>
                </li>
                <li class="c-page__meta-item">Comments:2</li>
              </ul>
              <div class="c-post__content h-clearfix entry-content  entry-content--sidebar ">
                <?php echo $blog->description; ?>
              </div>
              <div class="c-post__bottom">
                <div class="c-post__tags">
                  <a href="https://parkofideas.com/luchiana/demo/tag/cosmetic/" rel="tag">cosmetic</a>
                </div>
                <div class="c-post__share">
                  <div class="c-post__bottom-title">Share post:</div>
                  <div class="c-post-share">
                    <a class="c-post-share__link" target="_blank" href="//www.facebook.com/sharer.php?u=https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/" title="Share on Facebook">
                      <i class="ip-facebook c-post-share__icon c-post-share__icon--facebook"></i>
                    </a>
                    <a class="c-post-share__link" target="_blank" href="//twitter.com/share?url=https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/" title="Share on Twitter">
                      <i class="ip-twitter c-post-share__icon c-post-share__icon--twitter"></i>
                    </a>
                    <a class="c-post-share__link" target="_blank" href="//pinterest.com/pin/create/button/?url=https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/&amp;media=https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418.jpg&amp;description=New+Trends+in+2020" title="Pin on Pinterest">
                      <i class="ip-pinterest c-post-share__icon c-post-share__icon--pinterest"></i>
                    </a>
                    <a class="c-post-share__link" target="_blank" href="whatsapp://send?text=https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/" title="Share on Whatsapp" data-action="share/whatsapp/share">
                      <i class="ip-whatsapp c-post-share__icon c-post-share__icon--whatsapp"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="c-post__row-2">
            <!-- .navigation -->
            <!-- <div class="c-post__author">
              <div class="c-post__author-thumb">
                <img alt='' src='https://secure.gravatar.com/avatar/2d29f1a88cbfbf10e9241008d689d52c?s=155&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/2d29f1a88cbfbf10e9241008d689d52c?s=310&#038;d=mm&#038;r=g 2x' class='avatar avatar-155 photo' height='155' width='155' loading='lazy' />
              </div>
              <div class="c-post__author-content">
                <div class="c-post__author-header">Author</div>
                <div class="c-post__author-title">
                  <a href="https://parkofideas.com/luchiana/demo/author/admin_2719/" title="Posts by Luchiana" rel="author">Luchiana</a>
                </div>
                <div class="c-post__author-desc">For county now sister engage had season better had waited. Occasional mrs interested far expression. Engage had season better had waited. Occasional mrs interested far expression.</div>
                <div class="c-soc c-post__author-soc">
                  <a href="#" class="c-soc__link">
                    <i class="ip-facebook c-soc__icon c-soc__icon--facebook">
                    </i>
                  </a>
                  <a href="#" class="c-soc__link">
                    <i class="ip-instagram c-soc__icon c-soc__icon--instagram">
                    </i>
                  </a>
                  <a href="#" class="c-soc__link">
                    <i class="ip-whatsapp c-soc__icon c-soc__icon--whatsapp">
                    </i>
                  </a>
                  <a href="#" class="c-soc__link">
                    <i class="ip-youtube c-soc__icon c-soc__icon--youtube">
                    </i>
                  </a>
                </div>
              </div>
            </div> -->
            <!-- <div class="c-post__comments-wrap">
              <div id="comments" class="c-post__comments">
                <div class="c-post__comments-row c-post__comments-row--comments ">
                  <div>
                    <div class="comments-title">2 Comments</div>
                    <ol class="commentlist">
                      <li id="comment-2" class="comment byuser comment-author-admin_2719 bypostauthor even thread-even depth-1">
                        <article id="div-comment-2" class="comment-body ">
                          <header class="comment-meta">
                            <div class="comment-author vcard">
                              <div class="author-img">
                                <img alt='' src='https://secure.gravatar.com/avatar/2d29f1a88cbfbf10e9241008d689d52c?s=60&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/2d29f1a88cbfbf10e9241008d689d52c?s=120&#038;d=mm&#038;r=g 2x' class='avatar avatar-60 photo' height='60' width='60' loading='lazy' />
                              </div>
                              <strong class="author-name">
                                <a href='https://parkofideas.com/luchiana/demo' rel='external nofollow ugc' class='url'>Luchiana</a>
                              </strong>
                            </div>
                            <div class="comment-metadata">
                              <a href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/#comment-2">
                                <time datetime="2020-11-08T16:56:49+03:00">November 8, 2020 at 4:56 pm</time>
                              </a>
                            </div>
                          </header>
                          <div class="entry-content comment-content">
                            <p>Consequat eu purus tortor mauris vel neque vel tortor donec. Sed sit porttitor nisi, in aliquam velit ut dolor, nisi. Nec gravida ut tellus eu sit fermentum augue magna senectus. Vel congue faucibus in diam elit.</p>
                          </div>
                          <div class="buttons">
                            <a rel='nofollow' class='comment-reply-link' href='https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/?replytocom=2#respond' data-commentid="2" data-postid="142" data-belowelement="div-comment-2" data-respondelement="respond" data-replyto="Reply to Luchiana" aria-label='Reply to Luchiana'>
                              <i class="ip-reply reply-button"></i>Reply</a>
                          </div>
                        </article>
                      </li>
                      <li id="comment-3" class="comment byuser comment-author-admin_2719 bypostauthor odd alt thread-odd thread-alt depth-1">
                        <article id="div-comment-3" class="comment-body ">
                          <header class="comment-meta">
                            <div class="comment-author vcard">
                              <div class="author-img">
                                <img alt='' src='https://secure.gravatar.com/avatar/2d29f1a88cbfbf10e9241008d689d52c?s=60&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/2d29f1a88cbfbf10e9241008d689d52c?s=120&#038;d=mm&#038;r=g 2x' class='avatar avatar-60 photo' height='60' width='60' loading='lazy' />
                              </div>
                              <strong class="author-name">
                                <a href='https://parkofideas.com/luchiana/demo' rel='external nofollow ugc' class='url'>Luchiana</a>
                              </strong>
                            </div>
                            <div class="comment-metadata">
                              <a href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/#comment-3">
                                <time datetime="2020-11-08T16:57:13+03:00">November 8, 2020 at 4:57 pm</time>
                              </a>
                            </div>
                          </header>
                          <div class="entry-content comment-content">
                            <p>Pharetra, vivamus amet bibendum placerat vestibulum pulvinar viverra quis vitae. Pellentesque nec hac tincidunt molestie ut donec pretium tristique.</p>
                          </div>
                          <div class="buttons">
                            <a rel='nofollow' class='comment-reply-link' href='https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/?replytocom=3#respond' data-commentid="3" data-postid="142" data-belowelement="div-comment-3" data-respondelement="respond" data-replyto="Reply to Luchiana" aria-label='Reply to Luchiana'>
                              <i class="ip-reply reply-button"></i>Reply</a>
                          </div>
                        </article>
                      </li>
                    </ol>
                  </div>
                  <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Post a Comment
                      <small>
                        <a rel="nofollow" id="cancel-comment-reply-link" href="/luchiana/demo/2020/10/20/new-trends-2020/#respond" style="display:none;">Cancel reply</a>
                      </small>
                    </h3>
                    <form action="{{ url('storecomment') }}" method="post" id="commentform" class="comment-form" novalidate="">
                      @csrf
                      <p class="comment-notes">
                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked 
                        <span class="required">*</span>
                      </p>
                      <p class="comment-form-comment"> 
                        <textarea placeholder="Comment" id="comment" name="comment" cols="45" rows="8" required="required" class="@error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                        @error('comment')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </p>
                      <p class="comment-form-author"> 
                        <input placeholder="Name *" id="author" name="name" type="text" value="{{ old('name') }}" size="30" maxlength="245" required="required" class="@error('name') is-invalid @enderror">
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        @error('name')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </p>
                      <p class="comment-form-email"> 
                        <input placeholder="Email *" id="email" name="email" type="email" value="{{ old('email') }}" size="30" maxlength="100" aria-describedby="email-notes" required="required" class="@error('email') is-invalid @enderror">
                        @error('email')
                          <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </p>
                      <p class="comment-form-url"> 
                        <input placeholder="Website" id="url" name="website" type="url" value="{{ old('website') }}" size="30" maxlength="200">
                      </p>
                      <p class="form-submit">
                        <button type="submit" name="submit" id="submit" class="submit">Post Comment</button> 
                      </p>
                    </form>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </article>
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
                        <img width="115" height="115" loading="lazy" style="height: 3.75rem !important; width: auto;" class="c-lp-widget__thumb-img wp-post-image" src="{{ asset('storage/blogs/'.$blogs[$i]->featured_image) }}" alt="{{ $blogs[$i]->alt }}" title="{{ $blogs[$i]->title }}" />
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
              @foreach($tags as $tag)
                <a href="{{ url('blog/tag',$tag) }}" class="tag-cloud-link tag-link-44 tag-link-position-1" style="font-size: 22pt;">{{ $tag }}</a>
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