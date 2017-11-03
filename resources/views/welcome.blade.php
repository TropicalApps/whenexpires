<!DOCTYPE html>
<html lang="en">
	<head>
		<title>When Expires? | Find out the expiration date of any domain in the web!</title>
		<meta name="description" content="Tachyons Component">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="author" content="@mrmrs">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
	</head>
	<body class="w-100 roboto bg-white">
		<nav class="db dt-l w-100 border-box pa3 ph5-l absolute">
			<a class="db dtc-l v-mid mid-gray link dim w-100 w-25-l tc tl-l mb2 mb0-l" href="{{ route('welcome') }}" title="Home">
				<span class="uppercase tracked">whenexpires.com</span>
			</a>
			<div class="db dtc-l v-mid w-100 w-75-l tc tr-l">
				<a class="link dim dark-gray f5-l dib mr3 mr4-l" href="{{ route('login')}}" title="Blog"><i class="fa fa-sign-in"></i> Sign In</a>
				<a class="link dim dark-gray f5-l dib mr3 mr4-l" href="#" title="Blog"><i class="fa fa-paper-plane"></i> Subscribe</a>
				<a class="link dim dark-gray f5-l dib mr3 mr4-l" href="#" title="Press"><i class="fa fa-twitter-square"></i> Twitter</a>
				<a class="link dim dark-gray f5-l dib" href="{{ config('social.accounts.project-source') }}" title="Contact"><i class="fa fa-github-square"></i> Source code</a>
			</div>
		</nav>
		<main id="app">
			<div data-name="component">
				<article>
					<header class="bg-banner roboto pb6 pt5">
						<div class="mw9 center pa4 pt5-ns ph7-l">
							<h3 class="f1 dt center">
								<span class="lh-copy black pa2 tracked">
									When expires?
								</span>
							</h3>
							<h4 class="f3 fw1 georgia i center dt">Find out the expiration date of your domain.</h4>
							<p class="f6 ttu tracked black-80 center dt">A <a href="{{ config('social.accounts.github') }}" class="black" target="_blank" > TropicalApps</a>  Project</p>
						</div>
					</header>
					<div class="pa4-l n-mt-6">
						<form class="mw7 center pa4 br2-ns ba b--black-10 bg-white shadow-4">
							<fieldset class="cf bn ma0 pa0">
								<div class="cf">
									<label class="clip" for="email-address">Domain</label>
									<input class="f6 f5-l input-reset bn fl black-80 bg-near-white pa3 lh-solid w-100 w-75-m w-80-l br2-ns br--left-ns" placeholder="yourdomain.com" type="text" name="email-address" value="" id="email-address">
									<input class="f6 f5-l button-reset fl pv3 tc bn bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l br2-ns br--right-ns" type="submit" value="When expires?" id="show-modal" @click.prevent="showModal = true">
								</div>
							</fieldset>
						</form>
					</div>
					<div class="pa4 ph7-l georgia center">
						<h2>how does it work?</h2>
						<p class="f5 f3-ns lh-copy justify georgia">
							By entering the desired domain address an clicking in the "when expire" button you'll get the information related o the expiration date of the domain. By the moment we only support gTLD site domains.
						</p>

						<img src="{{ asset('images/modal1.png') }}" alt="Hot does it work? - WhenExpires.com" class="mw-100 dt center">

						<h2>Do you want to be notified about the domain expiration date?</h2>
						<p class="f5 f3-ns lh-copy justify georgia">
							You can register and activate the notifications tool, and we'll send you an email closest to the expiration date, so you don't worry about it.
						</p>
					</div>
					@include('sign-up')
				</article>
			</div>
			@include('modal')
		</main>
		<footer class="bg-near-black white-80 pv5 pv6-l ph4">
			<p class="f6 center dt"><span class="dib mr4 mr5-ns">©{{ date('Y') }} TropicalApps</span>
				<a class="link white-80 hover-light-purple" href="{{ config('social.accounts.github') }}">GitHub</a> /
			</p>
		</footer>
		<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
	</body>
</html>


