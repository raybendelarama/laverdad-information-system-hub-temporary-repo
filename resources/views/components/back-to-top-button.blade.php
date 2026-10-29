<button type="button" id="back-to-top" class="btn btn-outline-dark rounded-pill back-to-top" aria-label="Back to top"
    title="Back to top" hidden>
    <i class="ri-arrow-up-line" aria-hidden="true"></i>
    <span>Back to top</span>
</button>
<script>
    const backToTopButton = document.getElementById('back-to-top');

    function updateBackToTopButton() {
        backToTopButton.hidden = window.scrollY <= window.innerHeight;
    }

    window.addEventListener('scroll', updateBackToTopButton, { passive: true });
    window.addEventListener('resize', updateBackToTopButton);
    updateBackToTopButton();

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
        });
    });

</script>