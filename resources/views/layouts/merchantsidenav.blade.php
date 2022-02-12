
            @php($mainLinks=[
                'dashboard'=>'<a href="/merchant/dashboard"><span class="fa fa-dashboard fa-lg" style="color:rgb(122, 255, 255)"></span>&nbsp;Dashboard</a>',
                'transactions'=>'<a href="/merchant/transactions"><span class="fa fa-exchange fa-lg" style="color:lightgreen"></span>&nbsp;Transactions</a>',
                'paylinks'=>'<a href="/merchant/paylinks"><span class="fa fa-link fa-lg" style="color:yellow"></span>&nbsp;RPaylinks</a>',
                'invoices'=>'<a href="/merchant/invoices"><span class="fa fa-file-text fa-lg" style="color:#b6b6b6"></span>&nbsp;Invoices</a>',
                'adjustments'=>'<a href="/merchant/settlements"><span class="fa fa-handshake-o fa-lg" style="color:orange"></span>&nbsp;Adjustments</a>',
                'settings'=>'<a href="/merchant/settings"><span class="fa fa-cog fa-lg" style="color:rgb(250, 144, 144)"></span>&nbsp;Settings</a>',
                'resolution'=>'<a href="/merchant/resolution-center"><span class="fa fa-university fa-lg" style="color:lightgreen"></span>&nbsp;Conclusion Center</a>',
                'feed-back'=>'<a href="/merchant/feed-back"><span class="fa fa-comments fa-lg" style="color:#b6b6b6"></span>&nbsp;Feed back</a>',
                'help-support'=>'<a href="/merchant/help-support"><span class="fa fa-ticket fa-lg" style="color:#fff"></span>&nbsp;Help & Support</a>',
                'refer-earn'=>'<a href="/merchant/refer-earn"><span class="fa fa-money fa-lg" style="color:rgb(107, 245, 233)"></span>&nbsp;Refer & Earn</a>',
                'tools'=>'<a href="/merchant/tools" ><span class="fa fa fa-wrench fa-lg" style="color:rgb(247, 72, 72)"></span>&nbsp;Utilities</a>',
                'users'=>'<a href="/merchant/employee" ><span class="fa fa fa-users fa-lg" style="color:lightgreen"></span>&nbsp;Users</a>',
                'my-account'=>'<a href="/merchant/my-account" ><span class="fa fa-user-circle-o fa-lg" style="color:yellow"></span>&nbsp;My Account</a>'
            ])
            
            @php($selectedLinks=[
                'dashboard'=>['merchant/dashboard'],
                //'transactions'=>['merchant/payments'],
                'transactions'=>['merchant/transactions'],
                'paylinks'=>['merchant/paylinks'],
                'invoices'=>['merchant/invoices'],
                'adjustments'=>['merchant/settlements'],
                'settings'=>['merchant/settings'],
                'resolution'=>['merchant/resolution-center'],
                'feed-back'=>['merchant/feed-back'],
                'help-support'=>['merchant/help-support'],
                'refer-earn'=>['merchant/refer-earn'],
                'tools'=>['merchant/tools'],
                'users'=>['merchant/employee'],
                'my-account'=>['merchant/my-account']
            ])
            <div class="row">
                <nav id="sidebar">
                    <div class="custom-menu">
                    </div>
                    <ul class="list-unstyled components mb-5">
                        <li>
                            <div class="text-center">
                                <img class="rupayapay-logo" src="{{asset('images/final-logo.png')}}" alt="final-logo.png"/>
                            </div>
                        </li>
                        @foreach($mainLinks as $index=>$value)
                            @switch($index)
                                @case ("users")
                                    @if(Auth::user()->create_user_enabled == 'Y' && Auth::user()->app_mode == '1')
                                    <li class="{{ in_array(Request::path(),$selectedLinks[$index])?'active' : '' }}">{!! $value !!}</li>
                                    @endif
                                    @break
                                @default 
                                    <li class="{{ in_array(Request::path(),$selectedLinks[$index])?'active' : '' }}">{!! $value !!}</li>
                            @endswitch
                        @endforeach
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa fa-sign-out fa-lg" style="color:#b6b6b6"></span>&nbsp;Log Out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> 


            
            