<!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div  class="mw6 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10">
                    <div v-if="isCompleted">
                        <div v-if="status" id="success-message">
                            <div class="tc mb4">
                                <h3 class="f4">We have some news !</h3>
                                <hr class="mw3 bb bw1 b--black-10">
                            </div>
                            <p class="lh-copy measure center f4 black-70 mb4">
                                The domain <a class="black" v-text="domainName" :href="link"></a> expires on <strong><span v-text="expires"></span></strong>
                            </p>
                        </div>
                        <div v-else>
                            <div class="tc mb4">
                                <h3 class="f4">Error on domain name!</h3>
                                <hr class="mw3 bb bw1 b--black-10">
                            </div>
                            <p class="lh-copy measure center f4 black-70 mb4" v-text="errorMessage"></p>
                        </div>
                    </div>
                    <div v-else-if="isValid" class="flex justify-center mb4">
                        <img src="{{ asset('images/loading.gif') }}" alt="Loaging">
                    </div>
                    <div v-else>
                        <p class="lh-copy measure center f4 black-70 mb4">Domain name is required</p>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('subscribe') }}" v-if="expires" class="f5-l button-reset pv3 bn bg-animate bg-black-70 hover-bg-black white pointer dt w-25-m w-20-l br2 sans-serif tc mr2 no-underline">Subscribe</a>
                        <button @click="$emit('close')" class="f5-l button-reset pv3 bn bg-animate bg-black-70 hover-bg-black white pointer dt w-25-m w-20-l br2">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</script>

<!-- app -->
<div id="app">
    <!-- use the modal component, pass in the prop -->
    <modal v-if="showModal" @close="showModal = false">
        <!--
            you can use custom content here to overwrite
            default content
        -->
        <h3 slot="header">custom header</h3>
    </modal>
</div>