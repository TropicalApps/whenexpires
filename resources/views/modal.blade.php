<!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                    <div class="mw6 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10">
                        <div class="tc mb4">
                            <h3 class="f4">We have some news !</h3>
                            <hr class="mw3 bb bw1 b--black-10">
                        </div>
                        <p class="lh-copy measure center f4 black-70 mb4">
                            The domain <a href="#" class="black">www.demo.com</a> expires on <strong>Nov. 27, 2019</strong>.
                        </p>
                        <p class="lh-copy measure center f4 black-70 mb4">
                             You can <a href="#" class="black">Activate notifications</a> on this domain and we'll send you an email to let you know when the domain is about to expire.
                        </p>

                        <button @click="$emit('close')" class="f5-l button-reset pv3 bn bg-animate bg-black-70 hover-bg-black white pointer dt center w-25-m w-20-l br2">
                            Close
                        </button>
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