<!DOCTYPE html>
<html>
    @include('head')
<body>



<div class="md-modal md-effect-9 form md-show" id="modal-9">
    <div class="md-content">
        <div class="panel-heading">
            <div class="row closeModal"><span class="md-close"><i class="fa fa-times" aria-hidden="true"></i></span></div>
            <ul class="tab-group">
                <li class="tab active"><a href="#login">Log In</a></li>
                <li class="tab"><a href="#signup">Sign Up</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                
                @include('login')
                
                @include('signup')
            </div>
        </div>
    </div>
</div>
<div class="md-overlay"></div>


@include('scripts')




</body>
</html>