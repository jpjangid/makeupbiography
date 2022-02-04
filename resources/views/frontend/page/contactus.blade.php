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
		background-image: url({{ asset('images/contactus.png')
	}
	}

	);
	}
</style>
@endsection

@section('content')
<?php echo $page->description; ?>
@endsection