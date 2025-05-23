<x-landing-layout>
    @section('title', 'Über mich – Seelenflüsterin mit Herz und Erfahrung')
    @section('description', 'Lerne mich und meine Arbeitsweise kennen – transparent, achtsam und mit dem Fokus auf individuelle Entwicklung.')
    @include('pages.landing._partials._background')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <div class="cloud">
            <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
                data-framer-background-image-wrapper="true">
                <img decoding="async" loading="lazy"
                    src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png" alt=""
                    style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
            </div>
        </div>
        <!--begin::Heading-->
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">{!! \App\Models\PageContent::getContent('ueber-mich', 'hero') !!}
                <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                    {{-- <span id="kt_landing_hero_text"></span> --}}
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">{!! \App\Models\PageContent::getContent('ueber-mich', 'quote') !!}</p>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo">{!! \App\Models\PageContent::getContent('ueber-mich', 'signature') !!}</p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <div class="d-flex w-100 px-9 z-index-1 position-relative">
        <div class="clouds-1"></div>
        <div class="w-100 container z-index-2">
            <div class="d-flex flex-column flex-center text-center z-index-2">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-down-right" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card-body p-0 h-100">
                                <div class="row g-0 h-100">
                                    <!-- Image Column -->
                                    <div class="col-12 col-lg-6">
                                        <div class="image-container">
                                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/sarah-barone-seelenfluesterin-businessportrait.webp') }}"
                                                class="w-100 h-100 object-fit-cover rounded-start rounded-0 rounded-lg-start"
                                                alt="Sarah, die Seelenflüsterin, im Business-Outfit – Porträtaufnahme">
                                        </div>
                                    </div>
                                    <!-- Content Column -->
                                    <div class="col-12 col-lg-6">
                                        <div class="content-container">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                {!! \App\Models\PageContent::getContent('ueber-mich', 'signature') !!}
                                            </h1>
                                            <div data-aos="fade-up">
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    {!! \App\Models\PageContent::getContent('ueber-mich', 'sarah_intro') !!}
                                                </div>
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    {!! \App\Models\PageContent::getContent('ueber-mich', 'sarah_description') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-down-left" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card-body p-0 h-100">
                                <div class="row g-0 h-100">
                                    <!-- Image Column -->
                                    <div class="col-12 col-lg-6">
                                        <div class="image-container">
                                            <img src="{{ asset(theme()->getMediaUrlPath() . 'landing/sulana-hund-seelenfluesterin-paddington-begleiterin.webp') }}"
                                                class="w-100 h-100 object-fit-cover rounded-start rounded-0 rounded-lg-start"
                                                alt="Sulana, die treue Begleiterin von Seelenflüsterin Sarah, liegt mit einem Paddington-Stofftier auf einer Decke">
                                        </div>
                                    </div>
                                    <!-- Content Column -->
                                    <div class="col-12 col-lg-6">
                                        <div class="content-container">
                                            <h1 class="fs-2 mb-5 font-cinzel">
                                                Sulana
                                            </h1>
                                            <div data-aos="fade-up">
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    {!! \App\Models\PageContent::getContent('ueber-mich', 'sulana_intro') !!}
                                                </div>
                                                <div class="text-gray-600 fs-4 mb-5">
                                                    {!! \App\Models\PageContent::getContent('ueber-mich', 'sulana_description') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-up-right" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card-body p-10 h-100 d-flex flex-column justify-content-center">
                                <h1 class="fs-2 mb-5 font-cinzel">
                                    {!! \App\Models\PageContent::getContent('ueber-mich', 'attitude') !!}
                                </h1>
                                <div class="text-gray-600 fs-4 mb-5">
                                    {!! \App\Models\PageContent::getContent('ueber-mich', 'attitude_description') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mt-10">
                        <div class="card shadow w-100 h-100" data-aos="fade-up-left" data-aos-easing="linear"
                            data-aos-duration="500" data-aos-delay="0">
                            <div class="card-body p-10 h-100 d-flex flex-column justify-content-center">
                                <h1 class="fs-2 mb-5 font-cinzel">
                                    Berufliche Ausbildung & Qualifikationen
                                </h1>
                                <div class="d-flex flex-column h-100 justify-content-center">
                                    @foreach(json_decode(\App\Models\PageContent::getContent('ueber-mich', 'qualifications')) as $qualification)
                                        <div class="text-gray-600 fs-4 mb-5">
                                            {!! $qualification !!}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
        </div>
    </div>

    <!--begin::About me-->
    <div class="d-flex w-100 px-9 z-index-1 position-relative">
        <div class="clouds-2"></div>
        <div class="w-100 container z-index-2">
            <!--begin::Heading-->
            <div class="d-flex flex-column flex-center text-center z-index-2">
                <!--begin::Title-->
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel mt-10">Meine Aus- und</h1>
                <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Weiterbildungen</h1>
                <!--end::Title-->

                <!--begin::Row-->
                <div class="row w-100">
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="0">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Medialität
                                </h1>
                                @php
                                    $trainings = json_decode(\App\Models\PageContent::getContent('ueber-mich', 'trainings'), true);
                                @endphp
                                @foreach($trainings['mediumship'] as $training)
                                    <div class="mb-5">
                                        <div class="text-gray-800 fs-2">
                                            {!! $training !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="0">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Quantenheilung
                                </h1>
                                @foreach($trainings['quantum_healing'] as $training)
                                    <div class="mb-5">
                                        <div class="text-gray-800 fs-2">
                                            {!! $training !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="0">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Heiler Ausbildung
                                </h1>
                                @foreach($trainings['healer_training'] as $training)
                                    <div class="mb-5">
                                        <div class="text-gray-800 fs-2">
                                            {!! $training !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row w-100 mb-5">
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="0">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Tierkommunikation Tierenergetik
                                </h1>
                                @foreach($trainings['animal_communication'] as $training)
                                    <div class="mb-5">
                                        <div class="text-gray-800 fs-2">
                                            {!! $training !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="0">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Chakren, Reiki & Channeling
                                </h1>
                                @foreach($trainings['chakras_reiki'] as $training)
                                    <div class="mb-5">
                                        <div class="text-gray-800 fs-2">
                                            {!! $training !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 mt-10" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500"
                        data-aos-delay="0">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 d-flex flex-column">
                                <h1 class="mb-15 mb-md-10 mb-sm-5 mt-10 fs-2x">
                                    Sonstiges
                                </h1>
                                @foreach($trainings['other'] as $training)
                                    <div class="mb-5">
                                        <div class="text-gray-800 fs-2">
                                            {!! $training !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Heading-->
    </div>
    </div>
    <!--end::About me-->
</x-landing-layout>

<style>
    /* Mobile view */
    .image-container {
        height: 50vh;
    }

    .content-container {
        padding: 2rem;
        height: auto;
    }

    /* Desktop view */
    @media (min-width: 992px) {
        .image-container {
            height: 100%;
        }

        .content-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
        }
    }
</style>
