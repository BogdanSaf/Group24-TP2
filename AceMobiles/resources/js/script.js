  // Get all filter buttons
  const filterButtons = document.querySelectorAll('.filter-btn');

  // Add click event listener to each button
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      filterButtons.forEach(btn => {
        btn.classList.remove('active');
      });
      // Add active class to clicked button
      this.classList.add('active');
    });
  });