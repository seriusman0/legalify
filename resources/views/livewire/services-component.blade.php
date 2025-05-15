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
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-bold text-white text-center">Layanan Kami</h1>
            <p class="text-blue-100 text-center mt-2">Pilih layanan yang sesuai dengan kebutuhan bisnis Anda</p>
        </div>
    </section>

    <section class="py-8 md:py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8">
                <div class="flex justify-center">
                    <div class="relative">
                        <div class="bg-white rounded-lg shadow-sm p-1 overflow-x-auto max-w-full scrollbar-hide">
                            <nav class="flex space-x-1 min-w-max" role="tablist">
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

            <div wire:key="services-list" role="tabpanel" tabindex="0" aria-labelledby="tab-{{ $selectedCategory }}">
                @if($services->isEmpty())
                    <p class="text-center text-gray-500">Tidak ada layanan tersedia untuk kategori ini.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($services as $service)
                            <article 
                                wire:key="service-{{ $service->id_service }}"
                                class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-200 hover:shadow-md hover:-translate-y-1">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $service->nama_service }}</h3>
                                    <div class="mt-3 flex items-baseline gap-2">
                                        <span class="text-2xl font-bold text-blue-600">
                                            Rp {{ number_format($service->harga, 0, ',', '.') }}
                                        </span>
                                        @if($service->durasi)
                                            <span class="text-sm text-gray-500 border-l border-gray-200 pl-2">
                                                {{ $service->durasi }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <p class="mt-4 text-sm text-gray-600">{{ $service->deskripsi }}</p>
                                    
                                    @if($service->bonus)
                                        <div class="mt-4 flex items-start gap-2">
                                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-sm text-gray-600">{{ $service->bonus }}</span>
                                        </div>
                                    @endif

                                    <div class="mt-6 flex items-center justify-between">
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                            Aktif
                                        </span>
                                        
                                        <a href="https://wa.me/628816814751?text=Halo%20Legalify%2C%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($service->nama_service) }}" 
                                           class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all duration-200 group"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            <span>Pilih Layanan</span>
                                            <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
