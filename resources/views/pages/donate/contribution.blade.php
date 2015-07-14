@extends('layouts.master')
@section('content')


<h1 class="text-center">Contribution</h1>

<br><br>

<p>Help us to keep our work and help people to reach their gols.</p>

<br>

<h3>PayPal</h3>
<a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&amp;SESSION=J9P2aVzxziHIBEc0ikzJL-T8liOjdc03LyKDPQ0RkrnQ6Jr1KhCkmr1R1Wq&amp;dispatch=5885d80a13c0db1f8e263663d3faee8de6030e9239419d79c3f52f70a3ed57ec">
	{!! HTML::image('images/paypaldonate.png', '', ['style' => 'width: 300px;']) !!}
</a>

<br><br>

<h3>GuideStar</h3>
<p>See our {!! HTML::link('http://www.guidestar.org/organizations/35-2088005/literacy-center.aspx' ,'Form 990') !!} and related info on GuideStar. The Literacy Center is a 501(C)3 organization. Our tax identification number is 35-2088005.</p>

<a href="http://www.guidestar.org/organizations/35-2088005/literacy-center.aspx">
	{!! HTML::image('images/guidestar.png', '', ['style' => 'width: 300px;', 'class' => 'text-right;']) !!}
</a>

<br><br>

<h3>Mail or money order</h3>
<p>You can mail your tax deductible donation via check or money order to the following address:</p>
<p>
	<strong>The Literacy Center</strong><br>
	Attn: Executive Director<br>
	3411a N. First Ave<br>
	Evansville IN 47710<br>
</p>


@stop



