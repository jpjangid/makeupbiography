@extends('frontend.layouts.app')

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

@section('css')
<link rel="stylesheet" href="{{ asset('wp-content/uploads/elementor/css/post-8.css')  }}">
@endsection

@section('content')
<div class="l-inner">
	<div data-elementor-type="wp-page" data-elementor-id="8" class="elementor elementor-8" data-elementor-settings="[]">
		<div class="elementor-inner">
			<div class="elementor-section-wrap">
				<section class="elementor-section elementor-top-section elementor-element elementor-element-ae248c4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ae248c4" data-element_type="section">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6b92c4e" data-id="6b92c4e" data-element_type="column">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-b369bce elementor-widget elementor-widget-ideapark-page-header" data-id="b369bce" data-element_type="widget" data-widget_type="ideapark-page-header.default">
											<div class="elementor-widget-container">
												<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--page c-page-header--high c-page-header--custom-bg" style="background-color:#bebfc1;background-image:url(https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2058254205.jpg);background-size: cover; background-repeat: no-repeat; background-position: center;">
													<div class="c-page-header__wrap">
														<h1 class="c-page-header__title">About us</h1>
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
																<a itemprop="item" title="About us" href="{{ url('about-us') }}">
																	<span itemprop="name">About us</span>
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
				<section class="elementor-section elementor-top-section elementor-element elementor-element-f7b080a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="f7b080a" data-element_type="section">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-484697d" data-id="484697d" data-element_type="column">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-91fe4a5 elementor-widget elementor-widget-ideapark-heading" data-id="91fe4a5" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--small c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-after">
													<span class="c-ip-heading__inner">Our</span>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-4fbfb12 elementor-widget elementor-widget-ideapark-heading" data-id="4fbfb12" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--medium c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
													<span class="c-ip-heading__inner">Mission</span>
												</div>
											</div>
										</div>
										<section class="elementor-section elementor-inner-section elementor-element elementor-element-2943bc4 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2943bc4" data-element_type="section">
											<div class="elementor-container elementor-column-gap-no">
												<div class="elementor-row">
													<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-9fbe0ef" data-id="9fbe0ef" data-element_type="column">
														<div class="elementor-column-wrap elementor-element-populated">
															<div class="elementor-widget-wrap">
																<div class="elementor-element elementor-element-bc4e9cd elementor-widget elementor-widget-ideapark-heading" data-id="bc4e9cd" data-element_type="widget" data-widget_type="ideapark-heading.default">
																	<div class="elementor-widget-container">
																		<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
																			<span class="c-ip-heading__inner">
																				From the widest selection of genuine beauty products from around the world to beauty advice,
																				Makeup Biography is truly passionate about catering to your every beauty and wellness need.
																				Because after all, Your Beauty is Our Passion.
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4f469bf" data-id="4f469bf" data-element_type="column">
														<div class="elementor-column-wrap elementor-element-populated">
															<div class="elementor-widget-wrap">
																<div class="elementor-element elementor-element-8c1e177 elementor-widget elementor-widget-ideapark-heading" data-id="8c1e177" data-element_type="widget" data-widget_type="ideapark-heading.default">
																	<div class="elementor-widget-container">
																		<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
																			<span class="c-ip-heading__inner">
																				With 100% authentic brands Makeup Biography offers a well curated comprehensive selection of makeup,
																				skincare, haircare, bath and body, fragrance, grooming appliances, personal care, and health & wellness categories.
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-d5aa12f h-banner-1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d5aa12f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b62dc98 h-banner-1__column-left" data-id="b62dc98" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-9661e9e elementor-widget elementor-widget-spacer" data-id="9661e9e" data-element_type="widget" data-widget_type="spacer.default">
											<div class="elementor-widget-container">
												<div class="elementor-spacer">
													<div class="elementor-spacer-inner">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-c6794bc" style="margin-top:80px; background-color: white;" data-id="c6794bc" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-c2649d2 elementor-widget elementor-widget-ideapark-heading" data-id="c2649d2" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--small c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-after">
													<span class="c-ip-heading__inner">Hello from</span>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-29ffde5 elementor-widget elementor-widget-ideapark-heading" data-id="29ffde5" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--medium c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
													<span class="c-ip-heading__inner">CEO</span>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-90893ef elementor-widget elementor-widget-ideapark-heading" data-id="90893ef" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--default c-ip-heading--justify c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
													<span class="c-ip-heading__inner">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit nobis culpa nostrum error totam voluptatibus saepe quae. Quibusdam dicta incidunt modi, eos eum veniam nemo voluptatibus, dolore consequatur ex option
														<br>
														<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel officiis quod doloribus est necessitatibus totam quia nesciunt enim, itaque rerum cum, a tenetur excepturi! Sint officiis iure pariatur quae rerum.</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-542f32c elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="542f32c" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-de2cdd8" data-id="de2cdd8" data-element_type="column">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-5254ab8 elementor-absolute elementor-widget__width-auto elementor-widget elementor-widget-image" data-id="5254ab8" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
											<div class="elementor-widget-container">
												<div class="elementor-image">
													<img width="100" height="100" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2242231634.png" class="attachment-full size-full" alt="" loading="lazy" />
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-5a826ba elementor-widget elementor-widget-ideapark-icon-list-1" data-id="5a826ba" data-element_type="widget" data-widget_type="ideapark-icon-list-1.default">
											<div class="elementor-widget-container">
												<div class="c-ip-icon-list-1">
													<ul class="c-ip-icon-list-1__list">
														<li class="c-ip-icon-list-1__item">
															<i aria-hidden="true" class="c-ip-icon-list-1__icon fibd21- fi-bd21-natural"></i>
															<div class="c-ip-icon-list-1__title">All Natural</div>
															<i class="ip-romb c-ip-icon-list-1__romb"></i>
															<div class="c-ip-icon-list-1__description">For county now sister engage had season better had waited. Occasional mrs interested far expression.</div>
														</li>
														<li class="c-ip-icon-list-1__item">
															<i aria-hidden="true" class="c-ip-icon-list-1__icon fibd21- fi-bd21-crown"></i>
															<div class="c-ip-icon-list-1__title">TOP Quality</div>
															<i class="ip-romb c-ip-icon-list-1__romb"></i>
															<div class="c-ip-icon-list-1__description">Service get met adapted matters offence for. Principles man any insipidity age you simplicity.</div>
														</li>
														<li class="c-ip-icon-list-1__item">
															<i aria-hidden="true" class="c-ip-icon-list-1__icon fibd21- fi-bd21-cashback"></i>
															<div class="c-ip-icon-list-1__title">10% Cashback</div>
															<i class="ip-romb c-ip-icon-list-1__romb"></i>
															<div class="c-ip-icon-list-1__description">Use securing confined his shutters. Delightful as he it acceptance an solicitude discretion reasonably.</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-f2808b7 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="f2808b7" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
											<div class="elementor-widget-container">
												<div class="elementor-image">
													<img width="80" height="80" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2359558945.png" class="attachment-full size-full" alt="" loading="lazy" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-b3539fd elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="b3539fd" data-element_type="section">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bdd41c1" data-id="bdd41c1" data-element_type="column">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-631c2cd elementor-widget elementor-widget-ideapark-heading" data-id="631c2cd" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--small c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-after">
													<span class="c-ip-heading__inner">Our latest</span>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-09e011a elementor-widget elementor-widget-ideapark-heading" data-id="09e011a" data-element_type="widget" data-widget_type="ideapark-heading.default">
											<div class="elementor-widget-container">
												<div class="c-ip-heading c-ip-heading--medium c-ip-heading--center c-ip-heading--tablet- c-ip-heading--mobile- c-ip-heading--bullet-hide">
													<span class="c-ip-heading__inner">News</span>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-element-631bae1 elementor-widget elementor-widget-ideapark-news-carousel" data-id="631bae1" data-element_type="widget" data-widget_type="ideapark-news-carousel.default">
											<div class="elementor-widget-container">
												<div class="c-ip-news-carousel">
													<div class="c-ip-news-carousel__wrap">
														<div class="c-ip-news-carousel__list c-ip-news-carousel__list--3 js-news-carousel h-carousel h-carousel--default-dots h-carousel--flex h-carousel--outside h-carousel--round-light c-ip-news-carousel__list--dots">
															<article id="post-142" class="c-post-list c-post-list--standard c-post-list--grid c-post-list--no-sidebar c-post-list--with-thumb c-post-list--post js-post-item post-142 post type-post status-publish format-standard has-post-thumbnail hentry category-cosmetic category-fashion tag-cosmetic tag-trends">
																<div class="c-post-list__thumb c-post-list__thumb--standard c-post-list__thumb--grid">
																	<div class="c-post-list__thumb-inner c-post-list__thumb-inner--grid">
																		<a href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/">
																			<img width="760" height="428" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-760x428.jpg" class="c-post-list__img wp-post-image" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-760x428.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-460x259.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-920x518.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-258x145.jpg 258w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418-516x290.jpg 516w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959487418.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" />
																		</a>
																	</div>
																</div>
																<div class="c-post-list__wrap c-post-list__wrap--standard c-post-list__wrap--grid   c-post-list__wrap--no-sidebar ">
																	<div class="c-post-list__meta-date  c-post-list__meta-date--with-thumb   c-post-list__meta-date--no-sidebar  c-post-list__meta-date--grid">October 20, 2020</div>
																	<a class="c-post-list__header-link" href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/">
																		<h2 class="c-post-list__header">New Trends in 2020</h2>
																	</a>
																	<div class="c-post-list__except">
																		<p>For county now sister engage had season better had waited. Occasional mrs interested far expression.</p>
																	</div>
																	<div class="c-post-list__meta-category">
																		<a class="c-post-list__categories-item-link" href="https://parkofideas.com/luchiana/demo/category/cosmetic/" title="View all posts in Cosmetic">Cosmetic</a>
																		<span class="h-bullet">
																		</span>
																		<a class="c-post-list__categories-item-link" href="https://parkofideas.com/luchiana/demo/category/fashion/" title="View all posts in Fashion">Fashion</a>
																	</div>
																	<a class="c-button c-button--outline c-post-list__continue" href="https://parkofideas.com/luchiana/demo/2020/10/20/new-trends-2020/">Read More</a>
																</div>
															</article>
															<article id="post-141" class="c-post-list c-post-list--video c-post-list--grid c-post-list--no-sidebar c-post-list--with-thumb c-post-list--post js-post-item post-141 post type-post status-publish format-video has-post-thumbnail hentry category-beauty category-fashion tag-cosmetic tag-make-up tag-video post_format-post-format-video">
																<div class="c-post-list__thumb c-post-list__thumb--video c-post-list__thumb--grid">
																	<div class="c-post-list__thumb-inner c-post-list__thumb-inner--grid">
																		<a href="https://www.youtube.com/watch?v=Miu0NHPr8T4" class="js-video c-post-list__video" onclick="return false;" data-autoplay="true" data-vbtype="video">
																			<img width="760" height="428" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-760x428.jpg" class="c-post-list__img wp-post-image" alt="" loading="lazy" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-760x428.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-460x259.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-920x518.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-258x145.jpg 258w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579-516x290.jpg 516w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959282579.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" />
																			<i class="c-play c-play--large c-play--disabled"></i>
																		</a>
																	</div>
																</div>
																<div class="c-post-list__wrap c-post-list__wrap--video c-post-list__wrap--grid   c-post-list__wrap--no-sidebar ">
																	<div class="c-post-list__meta-date  c-post-list__meta-date--with-thumb   c-post-list__meta-date--no-sidebar  c-post-list__meta-date--grid">October 20, 2020</div>
																	<a class="c-post-list__header-link" href="https://parkofideas.com/luchiana/demo/2020/10/20/video-post/">
																		<h2 class="c-post-list__header">Video post</h2>
																	</a>
																	<div class="c-post-list__except">
																		<p>For county now sister engage had season better had waited. Occasional mrs interested far expression.</p>
																	</div>
																	<div class="c-post-list__meta-category">
																		<a class="c-post-list__categories-item-link" href="https://parkofideas.com/luchiana/demo/category/beauty/" title="View all posts in Beauty">Beauty</a>
																		<span class="h-bullet">
																		</span>
																		<a class="c-post-list__categories-item-link" href="https://parkofideas.com/luchiana/demo/category/fashion/" title="View all posts in Fashion">Fashion</a>
																	</div>
																	<a class="c-button c-button--outline c-post-list__continue" href="https://parkofideas.com/luchiana/demo/2020/10/20/video-post/">Read More</a>
																</div>
															</article>
															<article id="post-140" class="c-post-list c-post-list--gallery c-post-list--grid c-post-list--no-sidebar c-post-list--with-thumb c-post-list--post js-post-item post-140 post type-post status-publish format-gallery has-post-thumbnail hentry category-cosmetic category-fashion tag-gallery tag-slider post_format-post-format-gallery">
																<div class="c-post-list__thumb c-post-list__thumb--gallery c-post-list__thumb--grid">
																	<div class="c-post-list__carousel-list js-post-image-carousel h-carousel h-carousel--inner h-carousel--flex h-carousel--dots-hide">
																		<div class="c-post-list__carousel-item">
																			<div class="c-post-list__thumb-inner c-post-list__thumb-inner--grid">
																			</div>
																			<a href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/" class="c-post-list__carousel-link">
																				<img class="c-post-list__carousel-img" width="760" height="428" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-760x428.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-760x428.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-460x259.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-920x518.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-258x145.jpg 258w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882-516x290.jpg 516w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-1959718882.jpg 1120w" sizes="(max-width: 760px) 100vw, 760px" alt="blog-3" loading="lazy" />
																			</a>
																		</div>
																		<div class="c-post-list__carousel-item">
																			<div class="c-post-list__thumb-inner c-post-list__thumb-inner--grid">
																			</div>
																			<a href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/" class="c-post-list__carousel-link">
																				<img class="c-post-list__carousel-img" width="760" height="507" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-760x507.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-760x507.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-460x307.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-1520x1014.jpg 1520w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-1536x1025.jpg 1536w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-920x614.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-217x145.jpg 217w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369-435x290.jpg 435w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2048038369.jpg 1800w" sizes="(max-width: 760px) 100vw, 760px" alt="shutterstock-666239902 copy" loading="lazy" />
																			</a>
																		</div>
																		<div class="c-post-list__carousel-item">
																			<div class="c-post-list__thumb-inner c-post-list__thumb-inner--grid">
																			</div>
																			<a href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/" class="c-post-list__carousel-link">
																				<img class="c-post-list__carousel-img" width="760" height="552" src="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-760x552.jpg" srcset="https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-760x552.jpg 760w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-460x334.jpg 460w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-1520x1104.jpg 1520w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-1536x1116.jpg 1536w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-920x668.jpg 920w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-200x145.jpg 200w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850-399x290.jpg 399w, https://parkofideas.com/luchiana/demo/wp-content/uploads/2020/10/luchiana-2047024850.jpg 2000w" sizes="(max-width: 760px) 100vw, 760px" alt="shutterstock-72552235 copy" loading="lazy" />
																			</a>
																		</div>
																	</div>
																</div>
																<div class="c-post-list__wrap c-post-list__wrap--gallery c-post-list__wrap--grid   c-post-list__wrap--no-sidebar ">
																	<div class="c-post-list__meta-date  c-post-list__meta-date--with-thumb   c-post-list__meta-date--no-sidebar  c-post-list__meta-date--grid">October 20, 2020</div>
																	<a class="c-post-list__header-link" href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/">
																		<h2 class="c-post-list__header">Gallery post</h2>
																	</a>
																	<div class="c-post-list__except">
																		<p>For county now sister engage had season better had waited. Occasional mrs interested far expression.</p>
																	</div>
																	<div class="c-post-list__meta-category">
																		<a class="c-post-list__categories-item-link" href="https://parkofideas.com/luchiana/demo/category/cosmetic/" title="View all posts in Cosmetic">Cosmetic</a>
																		<span class="h-bullet">
																		</span>
																		<a class="c-post-list__categories-item-link" href="https://parkofideas.com/luchiana/demo/category/fashion/" title="View all posts in Fashion">Fashion</a>
																	</div>
																	<a class="c-button c-button--outline c-post-list__continue" href="https://parkofideas.com/luchiana/demo/2020/10/20/gallery-post/">Read More</a>
																</div>
															</article>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- /.l-inner -->
@endsection