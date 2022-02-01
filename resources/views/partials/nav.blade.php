<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->


<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-md-2 col-sm-4">
                        <h2 class="mb-0 site-logo animated jello"><a href="/"> <img src="{{asset('frontend-assets/external/images/logo.png')}}" alt=""></a></h2>
                    </div>
                    <div class="col-xl-10 col-md-10 col-sm-8">
                        <nav class=" site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">

                                   
                                    
                                    <li><a href="">For Student</a></li>
                                    <li><a href="">For Teacher</a></li>
                                    

                                    <li><a href="">Contact</a></li>

                                    <li><a href="">All Tutions</a></li>
                                    @if(!Auth::check())
                                    <li><a href="{{ route('login') }}"><span class="bg-primary text-white py-3 px-4 rounded"><span></span>Login</span></a></li>
                                    @endif


                                    @if(Auth::check())
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                            @if(Auth::user()->user_type=='employer')
                                            {{Auth::user()->company->cname}}

                                            @elseif(Auth::user()->user_type=='employee')
                                            {{Auth::user()->name}}
                                            @else
                                            {{Auth::user()->name}}
                                            @endif

                                            <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            @if(Auth::user()->user_type=='employer')
                                            <a class="dropdown-item" href="{{ route('company.view') }}">
                                                {{ __('Company') }}
                                            </a>

                                            <a class="dropdown-item" href="{{route('my.job')}}">
                                                MyJobs
                                            </a>
                                            <a class="dropdown-item" href="{{route('applicant')}}">
                                                Applicant
                                            </a>
                                            @endif

                                            @if(Auth::user()->user_type=='employee')
                                            <a class="dropdown-item" href="{{route('user.profile')}}">
                                                {{ __('Profile') }}
                                            </a>


                                            <a class="dropdown-item" href="{{route('home')}}">
                                                {{ __('Saved Job') }}
                                            </a>
                                            @endif

                                            @if(Auth::user()->user_type=='nulll')
                                            <a class="dropdown-item" href="{{route('dashboard')}}">
                                                {{ __('dashboard') }}
                                            </a>
                                            @endif



                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endif


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>