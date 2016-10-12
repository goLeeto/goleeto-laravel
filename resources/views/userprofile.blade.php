@extends('layouts.homelayout')

@section('container')


<div class="container bodyContainer profile">
                <div class="row">
                    <div class="col-md-5 pull-left">
                        <div>
                            <div class="profile_image"><img src="https://wrapbootstrap.com/static/users/pictures/StartBootstrap.png" width="120" height="120" alt="StartBootstrap" title="StartBootstrap"></div>
                            <div >
                                <p><strong>Signed up:</strong><br>2 years ago</p>
                                <p><strong>Location:</strong><br>Orlando, FL</p>
                            </div>
                        </div>
                        <p class="website"><strong>Website:</strong><br><a href="http://startbootstrap.com" target="_blank" rel="nofollow">http://goleeto.com</a></p>
                    </div>
                    <div class="col-md-7 pull-right">
                        <div id="about">
                            <div class="image">
                            <div><img src="https://wrapbootstrap.com/static/users/banners/StartBootstrap.png" width="580" height="200" title="StartBootstrap" alt="StartBootstrap"></div>
                            </div>
                            <div class="bio">
                                <p>Hi there! We are Start Bootstrap, and we make functional, stylish Bootstrap themes! All of our themes come with dedicated email support, so please feel free to email us using the form on our profile page, or leave a comment on one of our themes and we will get back to you as soon as possible.</p>
<p>Thanks for choosing Start Bootstrap for your next project!</p>
                            </div>
                        </div>
                        <h2 >Contact</h2>
                        <div id="contact">
                            <p>You must <a href="/login/user/1" title="Sign in or sign up">sign in</a> to send a message to StartBootstrap</p>
                            <form method="post">
                                <fieldset>
                                    <div class="clearfix">
                                        <div class="input">
                                            <textarea disabled="disabled" tabindex="1" class="xxlarge" id="message" name="body" placeholder="Enter your message to the seller." rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <input disabled="disabled" tabindex="2" type="submit" class="btn primary large" value="Send message"> <span>Be polite and professional. <strong>Spam will not be tolerated.</strong></span>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row portfolio">
                <h2 >Portfolio</h2>
                        <div id="portfolio">
                        <div class="image col-md-3">
                            <a href="/theme/spectrum-multipurpose-parallax-theme-WB0317BRF" title="Spectrum - Multipurpose Parallax Theme"><img src="//d85wutc1n854v.cloudfront.net/live/products/600x375/WB0317BRF.png" title="Spectrum - Multipurpose Parallax Theme" alt="Spectrum - Multipurpose Parallax Theme"></a>
                        </div>
                        <div class="image col-md-3">
                            <a href="/theme/vitality-multipurpose-one-page-theme-WB02K3KK3" title="Vitality - Multipurpose One Page Theme"><img src="//d85wutc1n854v.cloudfront.net/live/products/600x375/WB02K3KK3.png" title="Vitality - Multipurpose One Page Theme" alt="Vitality - Multipurpose One Page Theme"></a>
                        </div>
                        <div class="image col-md-3">
                            <a href="/theme/flex-admin-responsive-admin-template-WB032SCB1" title="Flex Admin - Responsive Admin Template"><img src="//d85wutc1n854v.cloudfront.net/live/products/600x375/WB032SCB1.png"title="Flex Admin - Responsive Admin Template" alt="Flex Admin - Responsive Admin Template"></a>
                        </div>
                        </div>
                    
                </div>
            </div>

@endsection