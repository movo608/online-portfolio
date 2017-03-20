$(document).ready(function() {
	
	$.foreach('.treeview-menu ul li', function(index) {
		if (('.treeview-menu ul li a').attr(href) == window.location.href) {
			$(this).addClass('active');
		}
	});
	
});