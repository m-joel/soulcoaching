<x-landing-layout>
    @include('pages.landing._partials._background')
    <!--begin::Order Details Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Heading-->
                <div class="d-flex flex-column flex-center text-center py-10 py-lg-20 z-index-2 container">
                    <!--begin::Title-->
                    <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Bestelldetails
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        </span>
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow">
                            <div class="card-body p-10">
                                <!--begin::Order Header-->
                                <div class="d-flex justify-content-between align-items-center mb-10">
                                    <div>
                                        <h2 class="text-dark mb-1">Bestellung #{{ $order->order_number }}</h2>
                                        <span class="text-muted">Bestellt am
                                            {{ $order->created_at->format('d.m.Y') }}</span>
                                    </div>
                                    <div class="text-end">
                                        <span
                                            class="badge badge-light-{{ $order->status === 'completed' ? 'success' : ($order->status === 'processing' ? 'warning' : 'danger') }} fs-6">
                                            {{ $order->status === 'completed' ? 'Abgeschlossen' : ($order->status === 'processing' ? 'In Bearbeitung' : 'Storniert') }}
                                        </span>
                                    </div>
                                </div>
                                <!--end::Order Header-->

                                <div class="row g-5">
                                    <!--begin::Order Items-->
                                    <div class="col-lg-8">
                                        <div class="card shadow-sm">
                                            <div class="card-header">
                                                <h3 class="card-title">Bestellte Artikel</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table align-middle table-row-bordered table-row-gray-100 gy-3 gs-7">
                                                        <thead>
                                                            <tr class="fw-bold text-muted bg-light">
                                                                <th class="min-w-200px">Produkt</th>
                                                                <th class="min-w-100px">Preis</th>
                                                                <th class="min-w-100px">Menge</th>
                                                                <th class="min-w-100px">Gesamt</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->items as $item)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            @if ($item->product_type === 'course')
                                                                                <a href="{{ $item->options['download_link'] }}"
                                                                                    class="btn btn-primary">Herunterladen</a>
                                                                            @elseif ($item->product_type === 'service')
                                                                                <div class="symbol symbol-50px me-5">
                                                                                    <img src="{{ asset('storage/' . $item->service->image) }}"
                                                                                        class="object-fit-contain"
                                                                                        alt="" />
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-start flex-column">
                                                                                    <a href="{{ route('prices', ['service' => $item->name]) }}"
                                                                                        class="text-dark fw-bold text-hover-primary fs-6">{{ $item->name }}</a>
                                                                                </div>
                                                                            @else
                                                                                <div class="symbol symbol-50px me-5">
                                                                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                                                                        class="object-fit-contain"
                                                                                        alt="" />
                                                                                </div>
                                                                                <div
                                                                                    class="d-flex justify-content-start flex-column">
                                                                                    <span
                                                                                        class="text-dark fw-bold text-hover-primary fs-6">{{ $item->product->name }}</span>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>@chf($item->price)</td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td>@chf($item->price * $item->quantity)</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Order Items-->

                                    <!--begin::Order Summary-->
                                    <div class="col-lg-4">
                                        <div class="card shadow-sm">
                                            <div class="card-header">
                                                <h3 class="card-title">Bestellübersicht</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-5">
                                                    <span class="fw-bold">Zwischensumme:</span>
                                                    <span class="text-dark fw-bold">@chf($order->subtotal)</span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-5">
                                                    <span class="fw-bold">MwSt:</span>
                                                    <span class="text-dark fw-bold">@chf($order->tax)</span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-5">
                                                    <span class="fw-bold">Versand:</span>
                                                    <span class="text-dark fw-bold">Kostenlos</span>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <div class="d-flex justify-content-between mb-5">
                                                    <span class="fw-bold fs-5">Gesamtbetrag:</span>
                                                    <span class="text-dark fw-bold fs-5">@chf($order->total)</span>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <div class="d-flex justify-content-between mb-5">
                                                    <span class="fw-bold">Zahlungsmethode:</span>
                                                    <span
                                                        class="text-dark fw-bold">{{ ucfirst($order->payment_method) }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span class="fw-bold">Zahlungsstatus:</span>
                                                    <span
                                                        class="badge badge-light-{{ (strtolower($order->payment_status) === 'completed' or strtolower($order->payment_status) === 'succeeded') ? 'success' : (strtolower($order->payment_status) === 'pending' ? 'warning' : 'danger') }}">
                                                        {{ strtolower($order->payment_status) === 'completed' ? 'Bezahlt' : (strtolower($order->payment_status) === 'pending' ? 'Ausstehend' : 'Fehlgeschlagen') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!--begin::Shipping Details-->
                                        <div class="card shadow-sm mt-5">
                                            <div class="card-header">
                                                <h3 class="card-title">Lieferdetails</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-5">
                                                        <div class="symbol symbol-50px me-5">
                                                            <i class="ki-duotone ki-geolocation fs-2hx text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span
                                                                class="fw-bold fs-5">{{ $order->shipping_first_name }}
                                                                {{ $order->shipping_last_name }}</span>
                                                            <span
                                                                class="text-muted">{{ $order->shipping_address }}</span>
                                                            <span class="text-muted">{{ $order->shipping_postal_code }}
                                                                {{ $order->shipping_city }}</span>
                                                            <span
                                                                class="text-muted">{{ $order->shipping_country }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
                                                            <i class="ki-duotone ki-phone fs-2hx text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold fs-5">Kontaktinformationen</span>
                                                            <span
                                                                class="text-muted">{{ $order->shipping_email }}</span>
                                                            <span
                                                                class="text-muted">{{ $order->shipping_phone }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Shipping Details-->
                                    </div>
                                    <!--end::Order Summary-->
                                </div>

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-between mt-10">
                                    <a href="{{ route('account.orders') }}" class="btn btn-light">
                                        <i class="ki-duotone ki-arrow-left fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Zurück zu Bestellungen
                                    </a>
                                    @if ($order->status === 'processing')
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#trackOrderModal">
                                            Sendung verfolgen
                                        </button>
                                    @endif
                                </div>
                                <!--end::Actions-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Order Details Section-->

    <!--begin::Track Order Modal-->
    <div class="modal fade" id="trackOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Sendung verfolgen #{{ $order->order_number }}</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="trackOrderForm" action="{{ route('account.orders.track') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-2">Sendungsnummer</label>
                            <input type="text" name="tracking_number" class="form-control form-control-solid"
                                placeholder="Sendungsnummer eingeben" required />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sendung verfolgen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Track Order Modal-->
</x-landing-layout>

@push('styles')
    <style>
        .timeline {
            position: relative;
            padding: 0;
            list-style: none;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-line {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            border-left: 1px solid #E4E6EF;
        }

        .timeline-icon {
            position: relative;
            z-index: 1;
        }

        .timeline-content {
            position: relative;
            margin-left: 1rem;
        }
    </style>
@endpush
