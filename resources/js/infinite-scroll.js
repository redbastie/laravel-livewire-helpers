Livewire.onLoad(() => {
    if (document.getElementById('infinite-scroll')) {
        let infiniteScrolling = false;

        window.onscroll = () => {
            if (!infiniteScrolling && (window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                infiniteScrolling = true;
                Livewire.emit('infiniteScrolling');
            }
        };

        Livewire.on('infiniteScrolled', () => {
            infiniteScrolling = false;
        });
    }
});
