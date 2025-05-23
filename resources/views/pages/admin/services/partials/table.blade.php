<!--begin::Table container-->
<div class="table-responsive">
    <!--begin::Table-->
    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
        <!--begin::Table head-->
        <thead>
            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                <th class="p-0 pb-3 min-w-50px text-start">Bild</th>
                <th class="p-0 pb-3 min-w-150px text-start">Titel</th>
                <th class="p-0 pb-3 min-w-100px text-end">Preis</th>
                <th class="p-0 pb-3 min-w-100px text-end">Dauer</th>
                <th class="p-0 pb-3 min-w-100px text-center">Methode</th>
                <th class="p-0 pb-3 min-w-100px text-center">Dienstleistungsoption</th>
                <th class="p-0 pb-3 min-w-100px text-center">Vorteilsoption</th>
                <th class="p-0 pb-3 min-w-100px text-center">Status</th>
                <th class="p-0 pb-3 min-w-100px text-center">Hervorgehoben</th>
                <th class="p-0 pb-3 min-w-100px text-center">Hotline</th>
                <th class="p-0 pb-3 min-w-100px text-center">Live Chat</th>
                <th class="p-0 pb-3 min-w-100px text-end">Aktionen</th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>
                        <div class="symbol symbol-50px me-2">
                            @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" class="object-fit-contain"
                                    alt="{{ $service->title }}" />
                            @else
                                <div class="symbol-label bg-light">
                                    <i class="ki-duotone ki-photo fs-2x text-gray-400">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start flex-column">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                                {{ $service->title }}
                            </a>
                            <span class="text-gray-400 fw-semibold d-block fs-7">
                                {{ Str::limit($service->description, 50) }}
                            </span>
                        </div>
                    </td>
                    <td class="text-end">
                        <span class="text-gray-800 fw-bold fs-6">@chf($service->price)</span>
                    </td>
                    <td class="text-end">
                        <span class="text-gray-800 fw-bold fs-6">{{ $service->duration }} min</span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-{{ $service->method === 'online' ? 'info' : ($service->method === 'in-person' ? 'success' : 'warning') }} fs-7 fw-bold">
                            {{ ucfirst($service->method) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-{{ $service->service_option === 'payment' ? 'primary' : 'success' }} fs-7 fw-bold">
                            {{ ucfirst($service->service_option) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-{{ $service->benefit_option === 'month' ? 'primary' : ($service->benefit_option === 'pro' ? 'success' : 'info') }} fs-7 fw-bold">
                            {{ ucfirst($service->benefit_option) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.services.toggle-active', $service) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-{{ $service->is_active ? 'success' : 'danger' }}">
                                {{ $service->is_active ? 'Aktiv' : 'Inaktiv' }}
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.services.toggle-featured', $service) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-{{ $service->is_featured ? 'primary' : 'secondary' }}">
                                {{ $service->is_featured ? 'Hervorgehoben' : 'Nicht hervorgehoben' }}
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-{{ $service->hotline_active ? 'success' : 'danger' }} fs-7 fw-bold">
                            {{ $service->hotline_active ? 'Aktiv' : 'Inaktiv' }}
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-light-{{ $service->is_live_chat ? 'success' : 'danger' }} fs-7 fw-bold">
                            {{ $service->is_live_chat ? 'Aktiv' : 'Inaktiv' }}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-duotone ki-pencil fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                    onclick="return confirm('Sind Sie sicher, dass Sie diese Dienstleistung löschen möchten?')">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <div class="text-gray-500 fw-semibold fs-6">Keine Dienstleistungen gefunden.</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
<!--end::Table container-->

<!--begin::Pagination-->
<div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-semibold text-gray-700">
        Zeige {{ $services->firstItem() ?? 0 }} bis {{ $services->lastItem() ?? 0 }} von {{ $services->total() }}
        Einträgen
    </div>
    {{ $services->links('vendor.pagination.index') }}
</div>
<!--end::Pagination-->
