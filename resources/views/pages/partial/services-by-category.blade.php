<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-3 service family">
	<div class="wrapper">
		<div class="banner">
			<div class="bg-img"></div>
		</div>
		
		<h3>{{ trans('services-list-items.family')["header"] }}</h3>
		
		<div class="content">
			
			<div class="prices">	  
				<p>{{ trans('services-list-items.family')["prices"]["studio"]["header"] }} {{ trans('services-list-items.family')["prices"]["studio"]["price"] }} CHF</p>
				<p>{{ trans('services-list-items.family')["prices"]["client"]["header"] }}: {{ trans('services-list-items.family')["prices"]["client"]["price"] }} CHF<span>*</span></p>
				<p>{{ trans('services-list-items.family')["prices"]["outdoor"]["header"] }}: {{ trans('services-list-items.family')["prices"]["outdoor"]["price"] }} CHF<span>*</span></p>
			</div>
			
			<ul class="whats-included">
				@foreach (trans('services-list-items.family')["what-is-included"] as $item)
					<li>{{ $item }}</li>
				@endforeach
			</ul>
			
			<div class="footer">
				<ul class="whats-not-included">
					@foreach (trans('services-list-items.family')["what-is-not-included"] as $item)
						<li>{{ $item }}</li>
					@endforeach
				</ul>
			</div>
		</div> {{-- ./content --}}
	</div>

</div> {{-- ./ family --}}

<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-3 service newborn">
	<div class="wrapper">
		<div class="banner">
			<div class="bg-img"></div>
		</div>

		<h3>{{ trans('services-list-items.newborn')["header"] }}</h3>

		<div class="content">

			<div class="prices">	  
				<p>{{ trans('services-list-items.newborn')["prices"]["studio"]["header"] }} {{ trans('services-list-items.newborn')["prices"]["studio"]["price"] }} CHF</p>
				<p>{{ trans('services-list-items.newborn')["prices"]["client"]["header"] }}: {{ trans('services-list-items.newborn')["prices"]["client"]["price"] }} CHF<span>*</span></p>
				<p>{{ trans('services-list-items.newborn')["prices"]["outdoor"]["header"] }}: {{ trans('services-list-items.newborn')["prices"]["outdoor"]["price"] }} CHF<span>*</span></p>
			</div>

			<ul class="whats-included">
				@foreach (trans('services-list-items.newborn')["what-is-included"] as $item)
					<li>{{ $item }}</li>
				@endforeach
			</ul>

			<div class="footer">
				<ul class="whats-not-included">
					@foreach (trans('services-list-items.newborn')["what-is-not-included"] as $item)
						<li>{{ $item }}</li>
					@endforeach
				</ul>
			</div>
		</div> {{-- ./content --}}
	</div>

</div> {{-- ./ newborn --}}

<div class="clearfix hidden-lg"></div>

<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-3 service maternity">

	<div class="wrapper">
		<div class="banner">
			<div class="bg-img"></div>
		</div>

		<h3>{{ trans('services-list-items.maternity')["header"] }}</h3>

		<div class="content">

			<div class="prices">	  
				<p>{{ trans('services-list-items.maternity')["prices"]["studio"]["header"] }} {{ trans('services-list-items.maternity')["prices"]["studio"]["price"] }} CHF</p>
				<p>{{ trans('services-list-items.maternity')["prices"]["client"]["header"] }}: {{ trans('services-list-items.maternity')["prices"]["client"]["price"] }} CHF<span>*</span></p>
				<p>{{ trans('services-list-items.maternity')["prices"]["outdoor"]["header"] }}: {{ trans('services-list-items.maternity')["prices"]["outdoor"]["price"] }} CHF<span>*</span></p>
			</div>

			<ul class="whats-included">
				@foreach (trans('services-list-items.maternity')["what-is-included"] as $item)
					<li>{{ $item }}</li>
				@endforeach
			</ul>

			<div class="footer">
				<ul class="whats-not-included">
					@foreach (trans('services-list-items.maternity')["what-is-not-included"] as $item)
						<li>{{ $item }}</li>
					@endforeach
				</ul>
			</div>
		</div> {{-- ./content --}}
	</div>

</div> {{-- ./ maternity --}}

<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-3 service artistic">
	
	<div class="wrapper">
		<div class="banner">
			<div class="bg-img"></div>
		</div>

		<h3>{{ trans('services-list-items.artistic')["header"] }}</h3>

		<div class="content">

			<div class="prices">	  
				<p>{{ trans('services-list-items.artistic')["prices"]["studio"]["header"] }} {{ trans('services-list-items.artistic')["prices"]["studio"]["price"] }} CHF<span>*</span></p>
				<p>{{ trans('services-list-items.artistic')["prices"]["outdoor"]["header"] }} {{ trans('services-list-items.artistic')["prices"]["outdoor"]["price"] }} CHF<span>*</span></p>
			</div>

			<ul class="whats-included">
				@foreach (trans('services-list-items.artistic')["what-is-included"] as $item)
					<li>{{ $item }}</li>
				@endforeach
			</ul>

			<div class="footer">
				<ul class="whats-not-included">
					@foreach (trans('services-list-items.artistic')["what-is-not-included"] as $item)
						<li>{{ $item }}</li>
					@endforeach
				</ul>
			</div>
		</div> {{-- ./ content --}}
	</div>

</div> {{-- ./ artistic --}}