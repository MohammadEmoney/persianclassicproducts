<div>
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ __('Contact Us') }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row ">
                <div class="col-lg-4 col-xl-5">
                    <div class="card border-0">
                        <div class="card-body p-3">
                            <div>
                                <h5><i class="fa fa-location-dot"></i> {{ __('messages.company_location') }}</h5>
                                <p>
                                    {{ __('messages.address_1') }}
                                    <br />
                                    <br />
                                    {{ __('messages.address_2') }}
                                </p>
                            </div>
                            <div>
                                <p><span class="text-info">{{ __('Phone') }}:</span> +982632554120 ({{ __('Iran') }})</p>
                                <p><span class="text-info">{{ __('Phone') }}:</span> +39097122999  ({{ __('Italy') }})</p>
                                <p><span class="text-info">{{ __('Mobile No.') }}:</span> +989127179262 ({{ __('Iran') }})</p>
                                <p><span class="text-info">{{ __('Mobile No.') }}:</span> +393516520568 ({{ __('Italy') }})</p>
                                <p><span class="text-info">{{ __('Email') }}:</span> persianfoodproduct@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" wire:submit.prevent="store">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" wire:model="fullname" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">{{ __('Full name') }}</label>
                            @error('fullname')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" wire:model="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">{{ __('Email address') }}</label>
                            @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" wire:model="phone" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">{{ __('Phone number') }}</label>
                            @error('phone')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" wire:model="message" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">{{ __('Message') }}</label>
                            @error('message')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
