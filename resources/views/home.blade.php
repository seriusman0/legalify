@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="cover cover-features imagebg space--lg" data-scrim-bottom="9">
    <div class="background-image-holder">
        <img alt="background" src="{{ asset('assets/template/img/construction-1.jpg') }}" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-7">
                <h1>
                    Legalify - Legal Services You Can Trust
                </h1>
                <p class="lead">
                    Legalify provides comprehensive legal solutions to help your business thrive. From business incorporation to intellectual property protection, we've got you covered.
                </p>
                <a class="btn btn--primary type--uppercase" href="#">
                    <span class="btn__text">
                        Explore Our Services
                    </span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="feature feature--featured feature-1 boxed boxed--border bg--white">
                    <h5>Business Incorporation</h5>
                    <p>
                        We handle the entire process of setting up your company, from registration to compliance.
                    </p>
                    <a href="#">
                        Learn More
                    </a>
                    <span class="label">New</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature feature-1 boxed boxed--border bg--white">
                    <h5>Intellectual Property</h5>
                    <p>
                        Protect your brand, inventions, and creative works with our IP services.
                    </p>
                    <a href="#">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature feature-1 boxed boxed--border bg--white">
                    <h5>Compliance & Regulations</h5>
                    <p>
                        Stay on top of legal and regulatory requirements for your business.
                    </p>
                    <a href="#">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h2>Latest News</h2>
                <p class="lead">
                    Stay up-to-date with the latest news and updates from Legalify.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="masonry masonry-blog-list">
                    <div class="masonry-filter-container text-center d-flex justify-content-center align-items-center">
                        <span>Category:</span>
                        <div class="masonry-filter-holder">
                            <div class="masonry__filters" data-filter-all-text="All Categories"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="masonry__container">
                        @foreach ($blogs as $blog)
                        <article class="masonry__item" data-masonry-filter="{{ $blog->category }}">
                            <div class="article__title text-center">
                                <a href="#">
                                    <h2>{{ $blog->title }}</h2>
                                </a>
                                <span>{{ $blog->created_at->format('M jS, Y') }} in </span>
                                <span>
                                    <a href="#">{{ $blog->category }}</a>
                                </span>
                            </div>
                            <div class="article__body">
                                <a href="#">
                                    <img alt="Image" src="{{ asset('storage/' . $blog->image) }}" />
                                </a>
                                <p>
                                    {{ $blog->content }}
                                </p>
                                <a href="#">Continue reading &raquo;</a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <div class="pagination">
                        <a class="pagination__prev" href="#" title="Previous Page">&laquo;</a>
                        <ol>
                            <li>
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li class="pagination__current">3</li>
                            <li>
                                <a href="#">4</a>
                            </li>
                        </ol>
                        <a class="pagination__next" href="#" title="Next Page">&raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="switchable bg--secondary">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-8 col-lg-7">
                <h2>Comprehensive Legal Solutions</h2>
                <p class="lead">
                    Legalify offers a wide range of legal services to cater to the diverse needs of businesses, from startups to established enterprises. Our team of experienced attorneys and legal professionals are dedicated to providing tailored solutions to help your business thrive.
                </p>
                <p class="lead">
                    Whether you need assistance with business incorporation, intellectual property protection, regulatory compliance, or any other legal matter, Legalify is your trusted partner.
                </p>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="text-block">
                    <h5>Contact Us</h5>
                    <p>
                        E: andreassina9a@gmail.com<br>
                        P: +62 851-7301-0820
                    </p>
                </div>
                <div class="text-block">
                    <h5>Our Offices</h5>
                    <p>
                        Jakarta, Indonesia<br>
                        Surabaya, Indonesia<br>
                        Bandung, Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="feature">
                    <div class="radial" data-value="33" data-size="208" data-bar-width="8" data-color="#4a90e2">
                        <span class="h3 radial__label">Business Setup</span>
                    </div>
                    <p>
                        Legalify guides you through the entire process of setting up your business, from registration to compliance.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="feature">
                    <div class="radial" data-value="66" data-size="208" data-bar-width="8" data-color="#4a90e2">
                        <span class="h3 radial__label">IP Protection</span>
                    </div>
                    <p>
                        Safeguard your intellectual property, including trademarks, patents, and copyrights.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="feature">
                    <div class="radial" data-value="100" data-size="208" data-bar-width="8" data-color="#4a90e2">
                        <span class="h3 radial__label">Regulatory Compliance</span>
                    </div>
                    <p>
                        Stay compliant with all relevant laws and regulations, so you can focus on growing your business.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="imageblock switchable feature-large bg--dark">
    <div class="imageblock__content col-lg-6 col-md-4 pos-right">
        <div class="background-image-holder">
            <img alt="image" src="{{ asset('assets/template/img/construction-2.jpg') }}" />
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-7">
                <h2>Trusted Legal Partner for Your Business</h2>
                <p class="lead">
                    Legalify is committed to providing exceptional legal services to help your business succeed. Our team of legal experts will work closely with you to understand your unique needs and develop tailored solutions to address your challenges.
                </p>
                <p class="lead">
                    Whether you're a startup or an established enterprise, Legalify is here to support you every step of the way.
                </p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h2>Get in Touch</h2>
                <p class="lead">
                    Have a legal question or need assistance with your business? Contact Legalify today to schedule a consultation.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="switchable">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <p class="lead">
                    E: andreassina9a@gmail.com<br>
                    P: +62 851-7301-0820
                </p>
                <p class="lead">
                    Our team is available to assist you Monday to Friday, 9am to 5pm.
                </p>
            </div>
            <div class="col-md-6 col-12">
                <form class="form-email row" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                    <div class="col-md-6 col-12">
                        <label>Your Name:</label>
                        <input type="text" name="Name" class="validate-required" />
                    </div>
                    <div class="col-md-6 col-12">
                        <label>Email Address:</label>
                        <input type="email" name="email" class="validate-required validate-email" />
                    </div>
                    <div class="col-md-12 col-12">
                        <label>Message:</label>
                        <textarea rows="4" name="Message" class="validate-required"></textarea>
                    </div>
                    <div class="col-md-5 col-lg-4 col-6">
                        <button type="submit" class="btn btn--primary type--uppercase">Send Enquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection