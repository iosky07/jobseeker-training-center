@php
    $links = [
        [
            "href" => "admin.dashboard",
            "section_icon" => "fa fa-fire",
            "text" => "Dashboard",
            "is_multi" => false,
        ],
        ];

    if (Auth::user()->role==2) {
        $add = [
            "href" => [
                [
                    "section_text" => "Jadwal",
                    "section_icon" => "fa fa-calendar",
                    "section_list" => [
                        ["href" => "admin.interview.index", "text" => "Jadwal Interview"],
//                        ["href" => "admin.test.index", "text" => "Jadwal Tes"]
                    ]
                ],
            ],
            "text" => "User",
            "is_multi" => true,
    ];
        array_push($links, $add);
    }

    if (Auth::user()->role==1) {
        $add = [
            "href" => [
                [

                    "section_text" => "User",
                    "section_icon" => "fa fa-users",
                    "section_list" => [
                        ["href" => "admin.user-regular.index", "text" => "Jobseeker Reguler"],
                        ["href" => "admin.user-premium.index", "text" => "Jobseeker Premium"],
                        ["href" => "admin.user-hrd.index", "text" => "HRD"],
                        ["href" => "admin.user.create", "text" => "Buat User"]
                    ]
                ],
                [
                    "section_text" => "Info Loker",
                    "section_icon" => "fa fa-briefcase",
                    "section_list" => [
                        ["href" => "admin.job-info.index", "text" => "Data Loker"],
                        ["href" => "admin.job-info.create", "text" => "Tambah Info"]
                    ]
                ],
                [
                   "section_text" => "Soal",
                   "section_icon" => "fa fa-file",
                    "section_list" => [
                        ["href" => "admin.test.index", "text" => "Soal TKD, TPA, TBI"],
//                        ["href" => "admin.question-detail.create", "text" => "Tambah Soalmu"]
                  ]
                ],
                [
                    "section_text" => "Jadwal",
                    "section_icon" => "fa fa-calendar",
                    "section_list" => [
//                        ["href" => "admin.interview-verification.index", "text" => "Verifikasi Jadwal"],
                        ["href" => "admin.interview.index", "text" => "Jadwal Interview"]
                    ]
                ],
                [
                    "section_text" => "Pembayaran",
                    "section_icon" => "fa fa-money",
                    "section_list" => [
                        ["href" => "admin.payment-verification.index", "text" => "Verifikasi Pembayaran"],
                        ["href" => "admin.payment.index", "text" => "Riwayat Pembayaran"],
                    ]
                ]
            ],
            "text" => "User",
            "is_multi" => true,
    ];
        array_push($links, $add);
        }
        if (Auth::user()->role==1) {
        $add = [
            "text" => "Forum",
            "section_icon" => "far fa-comments",
            "href" => "admin.forum.index",
           "section_text" => "Forum",
           "is_multi" => false
    ];
        array_push($links, $add);
        }

    if (Auth::user()->role==3) {
        $add = [
            "href" =>   [
                [
                    "section_text" => "Info Loker",
                    "section_icon" => "fa fa-briefcase",
                    "section_list" => [
                        ["href" => "admin.job-info.index", "text" => "Data Loker"],
                    ]
                ],
                [
                   "section_text" => "Soal",
                   "section_icon" => "fa fa-file",
                    "section_list" => [
                        ["href" => "admin.test.index", "text" => "Latihan Soal"],
//                        ["href" => "admin.question-detail.create", "text" => "Tambah Soalmu"]
                  ]
                ],
                [
                    "section_text" => "Jadwal",
                    "section_icon" => "fa fa-calendar",
                    "section_list" => [
                        ["href" => "admin.interview.index", "text" => "Jadwal Interview"],
 //                       ["href" => "admin.test.index", "text" => "Jadwal Tes"]
                    ]
                ],
            ],
            "text" => "Menu",
            "is_multi" => true,
    ];
        array_push($links, $add);
    $add = [
            "text" => "Forum",
            "section_icon" => "far fa-comments",
            "href" => "admin.forum.index",
           "section_text" => "Forum",
           "is_multi" => false
    ];
        array_push($links, $add);
    }

    if (Auth::user()->role==4) {
        $add = [
            "href" => [
                [
                    "section_text" => "Info Loker",
                    "section_icon" => "fa fa-briefcase",
                    "section_list" => [
                        ["href" => "admin.job-info.index", "text" => "Data Loker"],
                    ]
                ],
                 [
                   "section_text" => "Soal",
                   "section_icon" => "fa fa-file",
                    "section_list" => [
                        ["href" => "admin.test.index", "text" => "Soal TKD, TPA, TBI"],
                  ]
                ],
                [
                     "section_icon" => "fa fa-money",
                    "section_text" => "Pembayaran",
                    "section_list" => [
                        ["href" => "admin.payment.index", "text" => "Riwayat Pembayaran"],
                        ["href" => "admin.payment.create", "text" => "Tambah Pembayaran"]
                    ]
                ]
            ],
            "text" => "Menu",
            "is_multi" => true,
    ];
        array_push($links, $add);
    $add = [
            "text" => "Forum",
            "section_icon" => "far fa-comments",
            "href" => "admin.forum.index",
           "section_text" => "Forum",
           "is_multi" => false
    ];
        array_push($links, $add);
    }

    $navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">JTC</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{$link->section_icon}}"></i><span>{{$link->text}}</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{$section->section_icon}}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
