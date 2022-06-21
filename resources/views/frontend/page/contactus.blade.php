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
<style>
	.elementor-widget-container .elementor-column-wrap-contact .elementor-element-populated{
		width:100;
	}
	/* .fa {
		padding-left: 10px;
		padding-right: 40px;
		padding-top: 7px;
		padding-bottom: 7px;

		font-size: 30px;
		width: 30px;
		text-align: center;
		text-decoration: none;
		margin-left: 30px;
		border-radius: 50%;
	} */

	.error {
		color: red;
		font-size: 12px;
	}

	.fa:hover {
		opacity: 0.7;
	}

	.fa-facebook {
		background: #3B5998;
		color: white;
	}

	.fa-twitter {
		background: #55ACEE;
		color: white;
	}

	.fa-google {
		background: #dd4b39;
		color: white;
	}

	.fa-instagram {
		background: #125688;
		color: white;
	}

	.elementor-spacer {
		background: #ffff;

		padding: 0px 40px 58px 40px;

		margin-top: 40px;
		margin-right: 30px;
		margin-left: 30px;
	}

	.fa-facebook-f:before,
	.fa-facebook:before {
		content: "\f09a";
		padding-left: 5px;
	}

	.elementor-element-92aadb1 {
		background-image: url("{{ asset('images/contactus.png') }}");
	}
</style>
@endsection

@section('content')
<div class="l-inner">
	<div data-elementor-type="wp-page" data-elementor-id="9" class="elementor elementor-9" data-elementor-settings="[]">
		<div class="elementor-inner">
			<div class="elementor-section-wrap">
				<section class="elementor-section elementor-top-section elementor-element elementor-element-f995139 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="f995139" data-element_type="section">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-39a8339" data-id="39a8339" data-element_type="column">
								<div class="elementor-column-wrap-contact elementor-element-populated" style="width: 100%;>
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-8b2fbe9 elementor-widget elementor-widget-ideapark-page-header" data-id="8b2fbe9" data-element_type="widget" data-widget_type="ideapark-page-header.default">
											<div class="elementor-widget-container">
												<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--page c-page-header--low">
													<div class="c-page-header__wrap">
														<h1 class="c-page-header__title">Contact</h1>
													</div>
													<nav class="c-breadcrumbs">
														<ol class="c-breadcrumbs__list c-breadcrumbs__list--default" itemscope="" itemtype="http://schema.org/BreadcrumbList">
															<li class="c-breadcrumbs__item c-breadcrumbs__item--first" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
																<a itemprop="item" title="Home" href="https://parkofideas.com/luchiana/demo/"><span itemprop="name">Home</span></a>
																<!--
						-->
																<i class="ip-breadcrumb c-breadcrumbs__separator">
																	<!-- -->
																</i>
																<meta itemprop="position" content="1">
															</li>
															<li class="c-breadcrumbs__item c-breadcrumbs__item--last" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
																<a itemprop="item" title="Contact" href="https://parkofideas.com/luchiana/demo/contact/"><span itemprop="name">Contact</span></a>
																<meta itemprop="position" content="2">
															</li>
														</ol>
													</nav>
												</header>

												<div class="woocommerce-notices-wrapper"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-72a0178 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="72a0178" data-element_type="section">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-73dc191" data-id="73dc191" data-element_type="column">
								<div class="elementor-column-wrap elementor-element-populated">
									<div class="elementor-widget-wrap">
										<div class="elementor-element elementor-element-d4b88fa elementor-widget elementor-widget-ideapark-tabs" data-id="d4b88fa" data-element_type="widget" data-widget_type="ideapark-tabs.default">
											<div class="elementor-widget-container">
												<div class="c-ip-tabs__list">
													<div class="c-ip-tabs__item visible active" id="tab-d4b88fa-1" style="margin-top: 40px;">
														<div class="c-ip-tabs__content">
															<div data-elementor-type="wp-post" data-elementor-id="360" class="elementor elementor-360" data-elementor-settings="[]">
																<div class="elementor-inner">
																	<div class="elementor-section-wrap">
																		<section class="elementor-section elementor-top-section elementor-element elementor-element-31731fa elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="31731fa" data-element_type="section">
																			<div class="elementor-container elementor-column-gap-no">
																				<div class="elementor-row">
																					<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-79e7aa8" data-id="79e7aa8" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
																						<div class="elementor-element-populated" style="background-color:white;padding: 50px 60px 50px 60px;">
																							<div class="elementor-widget-wrap">
																								<div class="elementor-element elementor-element-1b3ba0a elementor-widget elementor-widget-ideapark-heading" data-id="1b3ba0a" data-element_type="widget" data-widget_type="ideapark-heading.default">
																									<div class="elementor-widget-container">
																										<div class="c-ip-heading c-ip-heading--medium c-ip-heading--left c-ip-heading--bullet-hide">
																											<span class="c-ip-heading__inner">New York</span>
																										</div>
																									</div>
																								</div>
																								<section class="elementor-section elementor-inner-section elementor-element elementor-element-2252f12 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2252f12" data-element_type="section">
																									<div class="elementor-container elementor-column-gap-no">
																										<div class="elementor-row">
																											<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a5aad85" data-id="a5aad85" data-element_type="column">
																												<div class="elementor-column-wrap elementor-element-populated">
																													<div class="elementor-widget-wrap">
																														<div class="elementor-element elementor-element-3cdd25e elementor-widget elementor-widget-ideapark-heading" data-id="3cdd25e" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner">Phones</span>
																																</div>
																															</div>
																														</div>
																														<div class="elementor-element elementor-element-1a772f4 elementor-widget elementor-widget-ideapark-heading" data-id="1a772f4" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner">
																																		+91 81978 94448<br>

																																	</span>
																																</div>
																															</div>
																														</div>
																													</div>
																												</div>
																											</div>
																											<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-69e23fd" data-id="69e23fd" data-element_type="column">
																												<div class="elementor-column-wrap elementor-element-populated">
																													<div class="elementor-widget-wrap">
																														<div class="elementor-element elementor-element-c4777b0 elementor-widget elementor-widget-ideapark-heading" data-id="c4777b0" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner">Address</span>
																																</div>
																															</div>
																														</div>
																														<div class="elementor-element elementor-element-182dc73 elementor-widget elementor-widget-ideapark-heading" data-id="182dc73" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner">
																																		#45, Sri Complex, Sajjan Rao Circle
																																		Vishweshwarapura,
																																		<br>
																																		Bengaluru,<br>
																																		Karnataka 560004
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
																								<section class="elementor-section elementor-inner-section elementor-element elementor-element-89c9294 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="89c9294" data-element_type="section">
																									<div class="elementor-container elementor-column-gap-no">
																										<div class="elementor-row">
																											<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6e4913a" data-id="6e4913a" data-element_type="column">
																												<div class="elementor-column-wrap elementor-element-populated">
																													<div class="elementor-widget-wrap">
																														<div class="elementor-element elementor-element-88fe3ad elementor-widget elementor-widget-ideapark-heading" data-id="88fe3ad" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner">Email</span>
																																</div>
																															</div>
																														</div>
																														<div class="elementor-element elementor-element-12e7c1e elementor-widget elementor-widget-ideapark-heading" data-id="12e7c1e" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner"><a href="mailto:Info@makeupbiography.com">Info@makeupbiography.com</a></span>
																																</div>
																															</div>
																														</div>
																													</div>
																												</div>
																											</div>
																											<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5b7a298" data-id="5b7a298" data-element_type="column">
																												<div class="elementor-column-wrap elementor-element-populated">
																													<div class="elementor-widget-wrap">
																														<div class="elementor-element elementor-element-eee9e14 elementor-widget elementor-widget-ideapark-heading" data-id="eee9e14" data-element_type="widget" data-widget_type="ideapark-heading.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-heading c-ip-heading--default c-ip-heading--left c-ip-heading--bullet-hide">
																																	<span class="c-ip-heading__inner">Social Networks</span>
																																</div>
																															</div>
																														</div>
																														<div class="elementor-element elementor-element-bd7f840 elementor-widget elementor-widget-ideapark-social" data-id="bd7f840" data-element_type="widget" data-widget_type="ideapark-social.default">
																															<div class="elementor-widget-container">
																																<div class="c-ip-social">
																																	<a href="#" class="c-ip-social__link">
																																		<i class="ip-facebook c-ip-social__icon c-ip-social__icon--facebook">
																																			<!-- -->
																																		</i>
																																	</a>
																																	<a href="#" class="c-ip-social__link">
																																		<i class="ip-instagram c-ip-social__icon c-ip-social__icon--instagram">
																																			<!-- -->
																																		</i>
																																	</a>
																																	<a href="#" class="c-ip-social__link">
																																		<i class="ip-twitter c-ip-social__icon c-ip-social__icon--twitter">
																																			<!-- -->
																																		</i>
																																	</a>
																																	<a href="#" class="c-ip-social__link">
																																		<i class="ip-youtube c-ip-social__icon c-ip-social__icon--youtube">
																																			<!-- -->
																																		</i>
																																	</a>
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
																					<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-57d6fa3" data-id="57d6fa3" data-element_type="column" style="margin-top:10px;">
																						<div class="elementor-column-wrap elementor-element-populated">
																							<div class="elementor-widget-wrap">
																								<div class="elementor-element elementor-element-02d85eb elementor-widget elementor-widget-html" data-id="02d85eb" data-element_type="widget" data-widget_type="html.default">
																									<div class="elementor-widget-container">
																										<div style="max-width: 100%; list-style: none; transition: none; overflow: hidden; width: 100%; height: 500px;">
																											<div id="gmapdisplay" style="height: 100%; width: 100%; max-width: 100%;">
																												<iframe style="height: 100%; width: 100%; border: 0;" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.2993212235515!2d77.57493951482178!3d12.952688690868268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae159b82cd0c23%3A0xc79b90db20ce5cb9!2sMakeup%20Biography!5e0!3m2!1sen!2sin!4v1632812167616!5m2!1sen!2sin"></iframe>
																											</div>
																											<a class="embed-maphtml" href="https://www.embed-map.com" id="authmaps-data">https://www.embed-map.com</a>
																											<style>
																												#gmapdisplay img.text-marker {
																													max-width: none !important;
																													background: none !important;
																												}

																												img {
																													max-width: none;
																												}
																											</style>
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

			<section class="elementor-section elementor-top-section elementor-element elementor-element-8d14aaa elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8d14aaa" data-element_type="section" style="margin-top: 40px;margin-bottom: 75px;">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-92aadb1 elementor-hidden-tablet elementor-hidden-phone" data-id="92aadb1" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">

								</div>
							</div>
						</div>
						<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-bff3154" data-id="bff3154" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-column-wrap elementor-element-populated" style="background-color:white;padding: 50px 60px 50px 60px;">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-89ddc69 elementor-widget elementor-widget-ideapark-heading" data-id="89ddc69" data-element_type="widget" data-widget_type="ideapark-heading.default">
										<div class="elementor-widget-container">
											<div class="c-ip-heading c-ip-heading--medium c-ip-heading--left c-ip-heading--bullet-hide">
												<span class="c-ip-heading__inner">Send Your Question</span>
											</div>
										</div>
									</div>
									<div class="elementor-element elementor-element-8f467ac elementor-widget elementor-widget-shortcode" data-id="8f467ac" data-element_type="widget" data-widget_type="shortcode.default">
										<div class="elementor-widget-container">
											<div class="elementor-shortcode">
												<div class="wpcf7" id="wpcf7-f5-p9-o1" lang="en-US" dir="ltr">
													<div class="screen-reader-response">
														<p role="status" aria-live="polite" aria-atomic="true"></p>
														<ul></ul>
													</div>
													<form action="{{ url('contact') }}" method="post" class="wpcf7-form init">
														@csrf
														<p>
															<span class="wpcf7-form-control-wrap your-name">
																<input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required  @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Your Name" value="{{ old('name') }}">
																@error('name')
																<span class="error invalid-feedback">{{ $message }}</span>
																@enderror
															</span>
															<br>
															<span class="wpcf7-form-control-wrap your-email">
																<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Your Email" value="{{ old('email') }}">
																@error('email')
																<span class="error invalid-feedback">{{ $message }}</span>
																@enderror
															</span>
															<br>
															<span class="wpcf7-form-control-wrap your-mobile">
																<input type="number" name="mobile" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-mobile wpcf7-validates-as-required wpcf7-validates-as-mobile @error('mobile') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Your Mobile" value="{{ old('mobile') }}">
																@error('mobile')
																<span class="error invalid-feedback">{{ $message }}</span>
																@enderror
															</span>
															<br>
															<span class="wpcf7-form-control-wrap your-message">
																<textarea name="message" cols="40" rows="4" size="40" class="wpcf7-form-control wpcf7-textarea @error('message') is-invalid @enderror" aria-invalid="false" value="{{ old('message') }}" placeholder="Your Message"></textarea>
																@error('message')
																<span class="error invalid-feedback">{{ $message }}</span>
																@enderror
															</span>
															<br>
															<!-- <input type="submit" class="wpcf7-form-control wpcf7-submit c-button--full"> -->
															<button class="wpcf7-form-control wpcf7-submit c-button--full">Submit</button>
														</p>
														@if(Session::get('success'))
														<div class="wpcf7-response-output">Your Details Added Successfully!</div>
														@endif
													</form>
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
@endsection