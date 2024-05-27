@extends('layouts.customer')

@section('title')
    How It Works - Bliss Interior Design
@endsection

@section('content')
<div class="py-5"></div>
<div class="container p-2 my-2">
        <h2 class="p-2">How It Works</h2>
        <p>Welcome to Bliss, your destination for interior design solutions. Here's how our process works:</p>

        <h3>1. Explore Projects</h3>
        <p>Start by exploring our residential and commercial projects. Choose the category that best fits your needs.</p>

        <h3>2. View Projects</h3>
        <p>Take a look at the projects under your selected category. Each project showcases our expertise and style.</p>

        <h3>3. Contact Us</h3>
        <p>If you find a project that inspires you or matches your requirements, click on the "Contact Us" button associated with that project.</p>

        <h3>4. Submit Your Requirements</h3>
        <p>Fill out the contact form with your details and project requirements. Be sure to provide as much information as possible to help us understand your needs.</p>

        <h3>5. Message Sent</h3>
        <p>Once you submit your requirements, a message will be sent to our team. We'll review your information and get in touch with you shortly to discuss your project further.</p>

        <h3>6. Await Approval</h3>
        <p>After receiving your message, we'll carefully review your requirements and contact you for any additional details if necessary. Once everything is finalized, we'll proceed with the project.</p>

        <p>At Bliss, we're dedicated to creating beautiful and functional spaces that exceed your expectations. Let us bring your interior design dreams to life.</p>

        <p>Have more questions? Feel free to reach out to us directly via our <a href="{{ url('contact') }}">Contact Us</a> page.</p>
    </div>
    </div>
<div class="py-5"></div>
@endsection

