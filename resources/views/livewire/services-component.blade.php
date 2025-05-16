<div>
    <style>
        /* Hide scrollbar but keep functionality */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>

    <section class="bg-blue-700 py-12">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Layanan Kami</h2>
            <p class="text-blue-100 text-center text-gray-900 mt-2">Pilih layanan yang sesuai dengan kebutuhan bisnis Anda</p>
        </div>
    </section>

    <section class="py-8 md:py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8">
                <div class="flex justify-center">
                    <div class="relative">
<div class="bg-white rounded-lg shadow-sm p-1 overflow-x-auto max-w-full scrollbar-hide">
    <nav class="flex flex-wrap gap-2 justify-center" role="tablist">
        @foreach($categories as $category)
            <button 
                type="button"
                wire:click="selectCategory({{ $category->id_kategori }})"
                wire:key="tab-{{ $category->id_kategori }}"
                class="whitespace-nowrap px-4 py-2 text-sm font-medium rounded-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 {{ $selectedCategory == $category->id_kategori ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}"
                role="tab"
                aria-selected="{{ $selectedCategory == $category->id_kategori ? 'true' : 'false' }}"
                aria-controls="services-panel-{{ $category->id_kategori }}"
                id="tab-{{ $category->id_kategori }}">
                {{ $category->nama_kategori }}
            </button>
        @endforeach
    </nav>
</div>
                        <div class="absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-white to-transparent pointer-events-none"></div>
                        <div class="absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-white to-transparent pointer-events-none"></div>
                    </div>
                </div>
            </div>

<div wire:key="services-list" role="tabpanel" tabindex="0" aria-labelledby="tab-{{ $selectedCategory }}" class="max-w-7xl mx-auto flex justify-center">
    @if($services->isEmpty())
        <p class="text-center text-gray-500">Tidak ada layanan tersedia untuk kategori ini.</p>
    @else
        <div class="pricing-table-container overflow-x-auto">
            <div class="flex flex-col md:flex-row md:space-x-4">
                <div class="flex-1 hidden md:flex flex-col bg-gray-100 rounded-tl-lg rounded-bl-lg">
                    <div class="p-4 border-b border-gray-300 font-semibold">Fitur</div>
                    <div class="p-4 border-b border-gray-300">Harga</div>
                    <div class="p-4 border-b border-gray-300">Durasi</div>
                    <div class="p-4 border-b border-gray-300">Deskripsi</div>
                    <div class="p-4 border-b border-gray-300">Bonus</div>
                    <div class="p-4 border-b border-gray-300">Aksi</div>
                </div>
                @foreach($services as $service)
                    <div class="flex-1 bg-white rounded-lg shadow-md mb-4 md:mb-0">
                        <div class="pricing__head bg-blue-600 text-white p-6 rounded-t-lg text-center">
                            <h5 class="text-lg font-semibold">{{ $service->nama_service }}</h5>
                        </div>
                        <div class="p-4 border-b border-gray-300 text-center">
                            Rp {{ number_format($service->harga, 0, ',', '.') }}
                        </div>
                        <div class="p-4 border-b border-gray-300 text-center">
                            {{ $service->durasi ?? '-' }}
                        </div>
                        <div class="p-4 border-b border-gray-300 text-sm text-gray-700 whitespace-pre-line">
                            {{ str_replace(',', "\n• ", '• ' . $service->deskripsi) }}
                        </div>
                        <div class="p-4 border-b border-gray-300 text-center text-sm text-gray-700">
                            {{ $service->bonus ?? '-' }}
                        </div>
                        <div class="p-4 text-center">
                            <a href="https://wa.me/628816814751?text=Halo%20Legalify%2C%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($service->nama_service) }}" 
                               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                               target="_blank"
                               rel="noopener noreferrer">
                                Pilih Layanan
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
        </div>
    </section>
</div>
