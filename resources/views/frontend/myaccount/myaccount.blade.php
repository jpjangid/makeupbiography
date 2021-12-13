@extends('frontend.main.index')

@section('css')
<style>
	strong {
		color: red;
	}
</style>
@endsection

@section('content')
<div class="l-inner">
	<header class="l-section c-page-header c-page-header--header-type-1 c-page-header--default c-page-header--wc c-page-header--low">
		<div class="c-page-header__wrap">
			<h1 class="c-page-header__title">My account</h1>
		</div>
		<div class="c-page-header__login-info">
			<span class="c-page-header__login-text">Logged in as
				<span class="c-page-header__login-name">{{ auth()->user()->name }}</span>
			</span>
		</div>
	</header>
	<div class="woocommerce-notices-wrapper">
	</div>
	<div class="l-section l-section--container l-section--bottom-margin l-section--no-sidebar l-section--top-margin-60 l-section--white">
		<div class="l-section__content">
			<div class="woocommerce">
				<div class="c-account">
					<div class="c-account__col-menu">
						<nav>
							@include('frontend.myaccount.sidebar')
						</nav>
					</div>
					<div class="c-account__col-content">
						<form class="woocommerce-EditAccountForm edit-account" action="{{ route('profile',['id' => auth()->id()]) }}" method="post">
							@csrf
							@method('PATCH')
							<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
								<label for="account_first_name">First name&nbsp;
									<span class="required">*</span>
								</label>
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="name" autocomplete="name" value="{{ auth()->user()->name }}" />
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</p>
							<div class="clear">
							</div>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="account_display_name">Mobile No&nbsp;
									<span class="required">*</span>
								</label>
								<input type="number" class="woocommerce-Input woocommerce-Input--text input-text" name="mobile" id="mobile" value="{{ auth()->user()->mobile }}" />
								@error('mobile')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</p>
							<div class="clear">
							</div>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="account_email">Email address&nbsp;
									<span class="required">*</span>
								</label>
								<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email" autocomplete="email" value="{{ auth()->user()->email }}" />
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</p>
							<fieldset>
								<legend>Password change</legend>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password_1">New password (leave blank to leave unchanged)</label>
									<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password" id="password" autocomplete="off" />
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password_2">Confirm new password</label>
									<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_confirmation" id="password_confirmation" autocomplete="off" />
								</p>
							</fieldset>
							<div class="clear">
							</div>
							<p>
								<button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.l-inner -->
@endsection