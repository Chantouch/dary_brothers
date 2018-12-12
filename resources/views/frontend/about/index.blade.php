@extends('frontend.layouts.app')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url({!! asset(config('settings.about_background')) !!});">
        <h2 class="l-text2 t-center">
            About
        </h2>
    </section>
    <section class="bgwhite p-t-66 p-b-38">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-b-30">
                    <div class="hov-img-zoom">
                        <img src="{!! asset('images/banner-14.jpg') !!}" alt="IMG-ABOUT">
                    </div>
                </div>

                <div class="col-md-8 p-b-30">
                    @if(app()->getLocale()==='en')
                        <h3 class="m-text26 p-t-15 p-b-16">
                            About Us
                        </h3>
                        <p class="p-b-28">
                            Darybrothers was established primarily to provide Cambodian people natural products with
                            health
                            and beauty benefits with quality, effectiveness and safety from plant and health expert. In
                            addition, Darybrother’s mission is to promote the use of local natural resources as the 1st
                            priority. Our products are sold at the reasonable price with attractive and hygiene
                            packaging
                            and they were all approved by Ministry of Industry & Handicraft. The life of these national
                            products relies on the support from its own citizens. Thank you for your support.
                        </p>
                    @else
                        <h3 class="m-text26 p-t-15 p-b-16">
                            អំពីពួកយើង
                        </h3>
                        <p class="p-b-28">សិប្បកម្ម Darybrothers
                            ត្រូវបានបង្កើតឡើងក្នុងគោលបំណងផ្តល់ជូននូវប្រជាពលរដ្ឋកម្ពុជានូវផលិតផលធម្មជាតិដែលមានប្រយោជន៏ដល់សុខភាព
                            និង សម្រស់ប្រកបដោយគុណភាព សុវត្ថិភាព ប្រសិទ្ឋភាព ពីអ្នកជំនាញរុក្ខជាតិឱសថ និងសុខាភិបាល និង
                            មានគោលបំណងលើកស្ទួយសេដ្ឋកិច្ចជាតិដោយប្រើប្រាស់ធនធានក្នុងស្រុកជាធំ។ ផលិតផលយើងខ្ញុំតម្លៃសមរម្យ
                            ការវេចខ្ចប់មានអនាម័យ និង មានការអនុញ្ញាតិពីក្រសួងសិប្បកម្ម និង
                            ឩស្សាហកម្មនៃព្រះរាជាណាចក្រកម្ពុជា។
                            ក្តីសង្ឃឹមផលិតផលជាតិពឹងផ្អែកលើការគាំទ្រពីសំណាក់ប្រជាជាតិយើងខ្លួនឯងជាធំ។
                            សូមអរគុណសម្រាប់ការគាំទ្រ។</p>
                    @endif
                    <div class="bo13 p-l-29 m-l-9 p-b-10">
                        <p class="p-b-11">
                            Creativity is just connecting things. When you ask creative people how they did
                            something,
                            they feel a little guilty because they didn't really do it, they just saw something. It
                            seemed obvious to them after a while.
                        </p>

                        <span class="s-text7">
							- Steve Job’s
						</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
