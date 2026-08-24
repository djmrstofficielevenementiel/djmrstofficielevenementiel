function switchTab(tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    const tabButtons = document.querySelectorAll('.tab-btn');

    tabContents.forEach(function(tab) {
        tab.classList.remove('active');
    });

    tabButtons.forEach(function(button) {
        button.classList.remove('active');
    });

    const selectedTab = document.getElementById(tabName + 'Tab');

    if (selectedTab) {
        selectedTab.classList.add('active');
    }

    if (tabName === 'photos') {
        tabButtons[0].classList.add('active');
    }

    if (tabName === 'videos') {
        tabButtons[1].classList.add('active');
    }
}

function scrollToSection(event, sectionId) {
    event.preventDefault();

    const section = document.querySelector(sectionId);

    if (section) {
        section.scrollIntoView({
            behavior: "smooth"
        });
    }
}