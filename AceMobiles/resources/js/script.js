// get all the filter buttons
var filterBtns = document.querySelectorAll('.filter-btn');

// get all the filter items
var filterItems = document.querySelectorAll('.filter-item');

// add click event listeners to each filter button
filterBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // remove active class from all filter buttons
    filterBtns.forEach(function(otherBtn) {
      otherBtn.classList.remove('active');
    });

    // add active class to the clicked button
    btn.classList.add('active');

    // get the brand name from the clicked button's id attribute
    var brandName = btn.id;

    // loop through all filter items and show/hide them based on the brand name
    filterItems.forEach(function(item) {
      if (brandName === 'all' || item.classList.contains(brandName)) {
        item.style.display = 'flex';
      } else {
        item.style.display = 'none';
      }
    });
  });
});



