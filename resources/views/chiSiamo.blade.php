<x-layout>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">{{__('ui.weAre')}}</h1>
			</div>
		</div>
	</div>

    <div class="container-fluid my-5">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-lg-3 my-5">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/storage/staff/staff.png" class="rounded" />
                        </div>
                        <div class="swiper-slide">
                            <img src="/storage/staff/vin.png" class="rounded" />
                        </div>
                        <div class="swiper-slide">
                            <img src="/storage/staff/ale.png" class="rounded" />
                        </div>
                        <div class="swiper-slide">
                            <img src="/storage/staff/benny.png" class="rounded" />
                        </div>
                        <div class="swiper-slide">
                            <img src="/storage/staff/fabio.png" class="rounded" />
                        </div>
                        <div class="swiper-slide">
                            <img src="/storage/staff/fili.png" class="rounded" />
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="row" id="person-info-wrapper">
                    <div class="card p-5">
                        <h1 class="text-center fst-italic">Vieni a conoscere il nostro fantastico team</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</x-layout>