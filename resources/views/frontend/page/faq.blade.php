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


@section('content')
<?php echo $page->description; ?>
<!-- /.l-inner -->
@endsection