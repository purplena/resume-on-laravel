<section class="px-4 py-12" id="projects">
    <div class="max-w-maxScreenWidth mx-auto">
        <h2 class="text-h3 mb-4">My projects</h2>


        <div class="flex flex-col gap-8 md:grid md:grid-cols-3 md:gap-4">
            {{-- Illustration --}}
            <div class="relative md:col-span-1">
                <div class="absolute h-full w-full -z-50">
                    @include('components/svg')
                </div>
                <img src={{ asset('/images/assets/illustration-no-bg.png') }} alt="vector-illustration"
                    class="object-contain mx-auto w-[200px] max-w-[400px]">
            </div>

            {{-- Swiper --}}
            @if ($webProjects->count())
                <div class="swiper-container-main md:col-span-2 px-16">
                    <div class="h-[350px] relative">
                        <div class="swiper w-full h-full !pb-8" id="mySwiper">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < $webProjects->count(); $i++)
                                    <div
                                        class="swiper-slide relative rounded-3xl text-center !flex flex-col items-center justify-center bg-main-200 p-4">
                                        <div class="absolute">
                                            <x-svg-project :coordinates="$coordinates[$i]" />
                                        </div>
                                        <div class="z-10">
                                            <h3 class="text-[3rem]">
                                                {{ $webProjects[$i]->title }}
                                            </h3>
                                            <div class="flex flex-row items-center justify-center gap-4">
                                                <a href="{{ $webProjects[$i]->project_data['github'] }}"
                                                    class="block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">GitHub
                                                    Repo</a>
                                                <a href="{{ route('project', ['project' => $webProjects[$i]->id]) }}"
                                                    class="openModalBtn block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">See
                                                    More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-button-prev" id="page-swiper-button-prev" style="z-index: 0;"></div>
                        <div class="swiper-button-next" id="page-swiper-button-next" style="z-index: 0;"></div>
                    </div>
                </div>
            @else
                <div class="md:col-span-2 px-16">
                    <div class="h-[350px] flex justify-center items-center">
                        <h2 class="text-h2">{{ __('status.no.project') }}</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay, show/hide based on modal state. -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg md:max-w-2xl lg:max-w-4xl xs:w-full">

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-h2" id="modalTitle"></h3>
                            {{-- <div class="flex flex-col md:flex-row gap-4" id="modalImageContainer"></div> --}}
                            <div id="modalSwiper" class="swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper" id="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide w-[300px] h-[300px] bg-egg">1</div>
                                    <div class="swiper-slide w-[300px] h-[300px] bg-egg">2</div>

                                </div>
                                <!-- If we need pagination -->
                                {{-- <div class="swiper-pagination modal-swiper-pagination"></div> --}}
                                <div class="swiper-button-prev" id="modal-swiper-button-prev"></div>
                                <div class="swiper-button-next" id="modal-swiper-button-next"></div>

                                <!-- If we need navigation buttons -->
                            </div>

                            {{-- 
                            <div id="modalSwiper" class="swiper">
                                <div class="swiper-wrapper" id="swiper-wrapper">
                                </div>
                                <div class="swiper-button-prev" id="modal-swiper-button-prev"></div>
                                <div class="swiper-button-next" id="modal-swiper-button-next"></div>
                            </div> --}}

                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Your modal content goes here.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="closeModalBtn"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        onclick="closeModal()">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
