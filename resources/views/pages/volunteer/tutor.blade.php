@extends('layouts.master')
@section('content')

<div class="text-center">
	<h1>Tutors</h1>
</div>

<br><br>
<h3>
	Materials, Books and Lesson plans
</h3>
<p>
	All books are provided to tutor and student at no charge. We assign the main
	study books but optional books, materials and specific lesson materials are available.
</p>

<br>

<h3>What books do we have?</h3>
<p>
	Our library contents (books) are on www.librarything.com. You may search our content
	by visiting LibraryThing.com. If you can’t find what you are looking for 
	<a href="{{url('/contact')}}" title="Contact Us">contact us</a> and we will help!
</p>
<br>

<h3>Where can you and your student meet?</h3>
<p>You can meet at The Literacy Center, librarie or any other public location that you and
	your student agree on.&nbsp; We can help arrange special locations just ask. Click here to
	see an <a href="{{url('/tutoringlocation')}}">idea list</a>.
</p>
<p>To schedule the tutor room at TLC you may self-schedule the Tutor Room by 
	clicking <a target="_blank" href="http://www.google.com/calendar/hosted/litcenter.org" title="Google Calendar">here</a>. 
	The first time you use, call us for username and password, contact the Literacy Center at 429-1222.
</p>

@stop



