<x-app-layout>
    <div id="frame">
        @include('layouts.sidebar')
        <div class="content">
            <div class="blank-wrap">
                <div class="inner-blank-wrap">Select a contact to start messaging</div>
            </div>
            <div class="loader" style="display: none">
                <div class="loader-inner">
                    <l-waveform
        size="35"
        stroke="3.5"
        speed="1"
        color="black" 
        ></l-waveform>
    </div>
            </div>
            <div class="contact-profile">
                <img src="{{ asset('default-images/default.jpg') }}" alt="" />
                <p class="contact-name"></p>
                <div class="social-media">
                   
                </div>
            </div>
            <div class="messages">
                <ul>
<!--Dynamic Content will go here--->
                </ul>
            </div>

            <x-slot name="scripts">
                @vite(['resources/js/app.js', 'resources/js/message.js'])
            </x-slot>

            <div class="message-input">
                <form action="" method="POST" class="message-form">
                    @csrf
                    <div class="wrap">
                        <input type="text" name="message" placeholder="Write your message..." class="message-box" />
                        <button type="submit" class="submit">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>            
        </div>
        
    </div>
</x-app-layout>