<div x-data="{ scrollTop: true }">
    <button
        id="scroll-up"
        :class="{ 'scrolled' : !scrollTop }"
        @scroll.window="scrollTop = (window.pageYOffset > 0) ? false : true"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>
