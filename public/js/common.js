$(document).ready(function() {
	// or just with selector string
	// const ps = new PerfectScrollbar('.scrollbar-sidebar');

	// const ps = new PerfectScrollbar('.scrollbar-sidebar', {
	// 	wheelSpeed: 2,
	// 	wheelPropagation: true,
	// 	minScrollbarLength: 20
	// });

	// ps.update();
	// 
	const demo = document.querySelector('.scrollbar-sidebar');
      const ps = new PerfectScrollbar(demo);

      // // Handle size change
      // document.querySelector('#resize').addEventListener('click', () => {
      //
      //   // Get updated values
      //   width = document.querySelector('#width').value;
      //   height = document.querySelector('#height').value;
      //
      //   // Set demo sizes
      //   demo.style.width = `${width}px`;
      //   demo.style.height = `${height}px`;
      //
      //   // Update Perfect Scrollbar
      //   ps.update();
      // });
});