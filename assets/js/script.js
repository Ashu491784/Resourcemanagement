// Add this to your app.js to handle scroll behavior
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    
    // Remember scroll position
    sidebar.addEventListener('scroll', function() {
        localStorage.setItem('sidebarScroll', this.scrollTop);
    });
    
    // Restore scroll position
    const savedScroll = localStorage.getItem('sidebarScroll');
    if (savedScroll) {
        sidebar.scrollTop = savedScroll;
    }
    
    // Smooth scroll to active item
    function scrollToActiveItem() {
        const activeItem = document.querySelector('.nav-item.active');
        if (activeItem) {
            activeItem.scrollIntoView({
                block: 'center',
                behavior: 'smooth'
            });
        }
    }
    
    // Call this after changing active item
    scrollToActiveItem();
});