<!--begin::Aside-->
<div id="kt_aside" class="aside {{ theme()->printHtmlClasses('aside', false) }}" data-kt-drawer="true"
    data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

    <!--begin::Logo-->
    <div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
        <a href="{{ theme()->getPageUrl('') }}">
            <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/landing.png') }}" class="h-40px" />
        </a>
    </div>
    <!--end::Logo-->

    <!--begin::Nav-->
    <div class="aside-menu flex-column-fluid pt-0 pb-5 py-lg-5" id="kt_aside_menu">
        {{ theme()->getView('layout/aside/_menu') }}
    </div>
    <!--end::Nav-->

    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="d-flex flex-center w-100 scroll-px"">
            <a href="{{ route('logout') }}" class="btn btn-custom"
                onclick="event.preventDefault(); document.getElementById('logout').submit();">
                {!! theme()->getIcon('entrance-left') !!}
            </a>
            <form id="logout" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
