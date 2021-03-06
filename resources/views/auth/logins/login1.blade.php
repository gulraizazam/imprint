<!-- login Content -->
<div class="container-fuild">
	<nav aria-label="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="{{ URL::to('/')}}">@lang('website.Home')</a></li>
			  <li class="breadcrumb-item active" aria-current="page">@lang('website.Login')</li>

			</ol>
		</div>
	  </nav>
  </div> 

<section class="page-area pro-content">
	<div class="container">


			<div class="row">
				<div class="col-12 col-sm-12 col-md-6">
					@if(Session::has('loginError'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="">@lang('website.Error'):</span>
									{!! session('loginError') !!}

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
					@endif
					@if(Session::has('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="">@lang('website.success'):</span>
									{!! session('success') !!}

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
					@endif
					<div class="col-12"><h4 class="heading login-heading">@lang('website.LOGIN')</h4></div>
					<div class="registration-process">

						<form  enctype="multipart/form-data"   action="{{ URL::to('/process-login')}}" method="post">
							{{csrf_field()}}
								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup">@lang('website.Email')</label></div>
									<div class="input-group col-12">
										<input type="text" name="email" id="email" placeholder="@lang('website.Please enter your valid email address')"class="form-control email-validate">
										<span class="help-block" hidden>@lang('website.Please enter your valid email address')</span>
								 </div>
								</div>
								<div class="from-group mb-3">
										<div class="col-12"> <label for="inlineFormInputGroup">@lang('website.Password')</label></div>
										<div class="input-group col-12">
											<input type="password" name="password" id="password" placeholder="Please Enter Password" class="form-control field-validate">
											<span class="help-block" hidden>@lang('website.This field is required')</span>										</div>
									</div>

									<div class="col-12 col-sm-12">
										<button type="submit" class="btn btn-secondary">@lang('website.Login')</button>
									<a href="{{ URL::to('/forgotPassword')}}" class="btn btn-link">@lang('website.Forgot Password')</a>
									@if($result['checkout_button'] == 1)
									<p style="text-align:center; margin-top:30px;">
										<strong> @lang('website.OR')</strong>
									</p>
									<a href="{{url('/guest_checkout')}}" type="submit" class="btn btn-light swipe-to-top btn-block">
										@lang('website.Guest Checkout')
									</a>
									@endif
								</div>
						</form>
					</div>
				</div>

				<div class="col-12 col-sm-12 col-md-6">
						<div class="col-12"><h4 class="heading login-heading">@lang('website.NEW CUSTOMER')</h4></div>
						<div class="registration-process">
							@if( count($errors) > 0)
								@foreach($errors->all() as $error)
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										<span class="sr-only">@lang('website.Error'):</span>
										{{ $error }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								 @endforeach
							@endif

							@if(Session::has('error'))
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">@lang('website.Error'):</span>
									{!! session('error') !!}

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							@endif

							<form name="signup" enctype="multipart/form-data"  action="{{ URL::to('/signupProcess')}}" method="post">
								{{csrf_field()}}
								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.First Name')</label></div>
									<div class="input-group col-12">
										<input  name="firstName" type="text" class="form-control field-validate" id="firstName" placeholder="@lang('website.Please enter your first name')" value="{{ old('firstName') }}">
										<span class="help-block" hidden>@lang('website.Please enter your first name')</span>
									</div>
								</div>
								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.Last Name')</label></div>
									<div class="input-group col-12">										
										<input  name="lastName" type="text" class="form-control field-validate field-validate" id="lastName" placeholder="@lang('website.Please enter your first name')" value="{{ old('lastName') }}">
										<span class="help-block" hidden>@lang('website.Please enter your last name')</span>
									</div>
								</div>
								<div class="from-group mb-3">
									<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.Registration Method')</label></div>
									<div class="input-group col-12">
										<label for="inlineFormInputGroup">@lang('website.Email')</label>
										<input  name="regsitrationtype" type="radio"  id="radioEmail"  value="{{ old('regsitrationtype') }}" onclick="RegistrationType()">
										<label for="inlineFormInputGroup">@lang('website.Phone')</label>
										<input  name="regsitrationtype" type="radio"  id="radioPhone"  value="{{ old('regsitrationtype') }}" onclick="RegistrationType()">
										<span class="help-block" hidden>@lang('website.Please Select Registration Method')</span>
									</div>
								</div>
									<div class="from-group mb-3 " id="EmailAddress" style="display: none">
										<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.Email Adrress')</label></div>
										<div class="input-group col-12">
											<input  name="email" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Your Email or Username" value="{{ old('email') }}">
											<span class="help-block" hidden>@lang('website.Please enter your valid email address')</span>
										</div>
									</div>
									<div class="from-group mb-3 " id="PhoneNumber" style="display: none">
										<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.Phone Number')</label></div>
										<div class="input-group col-12">
											<input  name="phonenumber" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Your Phone Number" value="{{ old('phonenumber') }}">
											<span class="help-block" hidden>@lang('website.Please enter your valid Phone Number')</span>
										</div>
									</div>
									<div class="from-group mb-3">
											<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.Password')</label></div>
											<div class="input-group col-12">
												<input name="password" id="password" type="password" class="form-control"  placeholder="@lang('website.Please enter your password')">
												<span class="help-block" hidden>@lang('website.Please enter your password')</span>

											</div>
										</div>
										<div class="from-group mb-3">
												<div class="col-12"> <label for="inlineFormInputGroup"><strong style="color: red;">*</strong>@lang('website.Confirm Password')</label></div>
												<div class="input-group col-12">
													<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Enter Your Password">
													<span class="help-block" hidden>@lang('website.Please re-enter your password')</span>
													<span class="help-block" hidden>@lang('website.Password does not match the confirm password')</span>
												</div>
											</div>
											<div class="from-group mb-3">
												<div class="col-12" > <label for="inlineFormInputGroup"><strong  style="color: red;">*</strong>@lang('website.Gender')</label></div>
												<div class="input-group col-12">
													<select class="form-control field-validate" name="gender" id="inlineFormCustomSelect">
														<option selected value="">@lang('website.Choose...')</option>
														<option value="0" @if(!empty(old('gender')) and old('gender')==0) selected @endif)>@lang('website.Male')</option>
														<option value="1" @if(!empty(old('gender')) and old('gender')==1) selected @endif>@lang('website.Female')</option>
													</select>
													<span class="help-block" hidden>@lang('website.Please select your gender')</span>
												</div>
											</div>
											<div class="from-group mb-3">
													<div class="input-group col-12">
														<input required style="margin:4px;"class="form-controlt checkbox-validate" type="checkbox">
														@lang('website.Creating an account means you are okay with our')  @if(!empty($result['commonContent']['pages'][3]->slug))&nbsp;<a href="{{ URL::to('/page?name='.$result['commonContent']['pages'][3]->slug)}}">@endif @lang('website.Terms and Services')@if(!empty($result['commonContent']['pages'][3]->slug))</a>@endif, @if(!empty($result['commonContent']['pages'][1]->slug))<a href="{{ URL::to('/page?name='.$result['commonContent']['pages'][1]->slug)}}">@endif @lang('website.Privacy Policy')@if(!empty($result['commonContent']['pages'][1]->slug))</a> @endif &nbsp; and &nbsp; @if(!empty($result['commonContent']['pages'][2]->slug))<a href="{{ URL::to('/page?name='.$result['commonContent']['pages'][2]->slug)}}">@endif @lang('website.Refund Policy') @if(!empty($result['commonContent']['pages'][3]->slug))</a>@endif.
														<span class="help-block" hidden>@lang('website.Please accept our terms and conditions')</span>
													</div>
												</div>
										<div class="col-12 col-sm-12">
												<button type="submit" class="btn btn-light swipe-to-top">@lang('website.Create an Account')</button>

										</div>
							</form>
						</div>
				</div>
				<div class="col-12 col-sm-12 my-5">
						<div class="registration-socials">
					<div class="row align-items-center justify-content-between">
									<div class="col-12 col-sm-6">
										@lang('website.Access Your Account Through Your Social Networks')
									</div>
									<div class="col-12 col-sm-6 right">

											@if($result['commonContent']['setting'][61]->value==1)
												<a href="login/google" type="button" class="btn btn-google"><i class="fab fa-google-plus-g"></i>&nbsp; @lang('website.Google') </a>
											@endif
											@if($result['commonContent']['setting'][2]->value==1)
												<a  href="login/facebook" type="button" class="btn btn-facebook"><i class="fab fa-facebook-f"></i>&nbsp;@lang('website.Facebook')</a>
											@endif
									</div>
							</div>
					</div>
				</div>
			</div>

	</div>
</section>
<script type="text/javascript">
	function RegistrationType() {
		if (document.getElementById('radioEmail').checked) {
  			document.getElementById('EmailAddress').style.display="block";
  			document.getElementById('PhoneNumber').style.display="none";
		}else if(document.getElementById('radioPhone').checked){
			document.getElementById('PhoneNumber').style.display="block";
			document.getElementById('EmailAddress').style.display="none";
		}
	}
	
</script>
