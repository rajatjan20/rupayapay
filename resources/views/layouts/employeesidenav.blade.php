@php
    use App\Http\Controllers\EmployeeController;

    $filterlinks = EmployeeController::navigation();

    $selectedLinks=[
        'dashboard'=>'/rupayapay/dashboard',
        'myaccount'=>'/rupayapay/my-account',
        'workstatus'=>'/rupayapay/work-status'
    ];

    $icons = [
        "fa fa-calculator",
        "fa fa-inr",
        "fa fa-handshake-o",
        "fa fa-wrench",
        "fa fa-usb",
        "fa fa-ticket",
        "fa fa-bullhorn",
        "fa fa-tags",
        "fa fa-shield",
        "fa fa-gavel",
        "fa fa-search",
        "fa fa-group",
        "fa fa-sign-out" 
    ];

    $sublinks_names = [];

    $sublink_ids = [];
@endphp

<div class="row">
    <div class="page-wrapper toggled">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <a href="#" id="toggle-sidebar"><i class="fa fa-bars"></i></a>
                <div class="sidebar-brand">
                    <div class="text-center">
                        <img class="rupayapay-logo" src="{{asset('images/final-logo.png')}}" alt="final-logo.png"/>
                    </div>
                </div>
                <div class="sidebar-menu">
                    @if(!empty($filterlinks))
                    <ul>
                        <li class="sidebar-dropdown {{ (Request::path() === 'rupayapay/dashboard')?'active':''}}">
                            <a href="{{$selectedLinks['dashboard']}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        @foreach($filterlinks as $index => $link)
                        <li class="sidebar-dropdown">
                            @if(!empty($filterlinks[$index]["sublinks"]))
                            <a href="javascript:void(0)"><i class="{{$icons[$index]}}"></i><span></span><span>{{$filterlinks[$index]["link_name"]}}</span></a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @foreach($filterlinks[$index]["sublinks"] as $index => $sublink)
                                            @php 
                                                $sublink_array = explode("/",$sublink["hyperlink"]);
                                                $sublink_count = count($sublink_array);
                                                $sublinks_names[$sublink_array[$sublink_count-1]] = $sublink["link_name"];
                                                $sublink_ids[$sublink["id"]] = $sublink["hyperlinkid"];
                                            @endphp
                                            <li><a href="{{$sublink['hyperlink']}}">{{$sublink['link_name']}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                            @php 
                                $sublink_array = explode("/",$sublink["hyperlink"]);
                                $sublink_count = count($sublink_array);
                                $sublinks_names[$sublink_array[$sublink_count-1]] = $link["link_name"];
                            @endphp
                            <a href="{{$link['hyperlink']}}"><i class="{{$icons[$index]}}"></i><span>{{$link["link_name"]}}</span></a>
                            @endif
                        </li>
                        @endforeach
                        <li class="sidebar-dropdown {{ (Request::path() === 'rupayapay/my-account')?'active':''}}">
                            <a href="{{$selectedLinks['myaccount']}}"><i class="fa fa-user"></i> <span>My Account</span></a>
                        </li>
                        <li class="sidebar-dropdown {{ (Request::path() === 'rupayapay/work-status')?'active':''}}">
                            <a href="{{$selectedLinks['workstatus']}}"><i class="fa fa-tasks"></i> <span>Work Status</span></a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('rupayapay.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <a href="{{ route('rupayapay.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                    @endif
                </div>

            </div>
        </nav>
    </div>
</div>
@php
session(['sublinkNames'=>$sublinks_names])
@endphp

