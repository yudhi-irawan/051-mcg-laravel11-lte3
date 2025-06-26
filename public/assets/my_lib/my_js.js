const inputs = document.querySelectorAll(".uppercase");
inputs.forEach(input => {
	input.addEventListener("keyup", function() {
		this.value = this.value.toUpperCase();
	});
});

$('.select2').select2({
	theme: 'bootstrap4'
})

$('input[type="number"].text-right').on('input', function(){
	this.style.textAlign = 'right';
});
