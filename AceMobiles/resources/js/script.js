// get all the filter buttons
var filterBtns = document.querySelectorAll('.filter-btn');

// get all the filter items
var filterItems = document.querySelectorAll('.filter-item');

// add click event listener to each filter button
filterBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    // remove the active class from all the filter buttons
    filterBtns.forEach(function(fBtn) {
      fBtn.classList.remove('active');
    });
    // add the active class to the clicked filter button
    btn.classList.add('active');

    // loop through all the filter items
    for (var i = 0; i < filterItems.length; i++) {
      // if the filter button is 'All', show all the filter items
      if (btn.id === 'all') {
        filterItems[i].style.display = 'flex';
      }
      // if the filter button matches the filter item's brand, show the filter item
      else if (filterItems[i].classList.contains(btn.id)) {
        filterItems[i].style.display = 'flex';
      }
      // if the filter button does not match the filter item's brand, hide the filter item
      else {
        filterItems[i].style.display = 'none';
      }
    }
  });
});

