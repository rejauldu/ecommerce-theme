(function() {
	let division_id = document.getElementById('division_id');
	let district_id = document.getElementById('district_id');
	let upazila_id = document.getElementById('upzila_id');
	let union_id = document.getElementById('union_id');
	let region_id = document.getElementById('region_id');
	let innerHTML = '';
	district_id.innerHTML = innerHTML;
	if(division_id) {
		innerHTML = '<option value="-1">--- Select Division ---</option>';
		divisions.forEach(function(division){
			innerHTML += '<option value="'+division.id+'">'+division.name+'</option>';
		});
		division_id.innerHTML = innerHTML;
		
		division_id.addEventListener('change', function() {
			innerHTML = '<option value="-1">--- Select District ---</option>';
			let _this = this;
			if(typeof districts !== 'undefined')
				districts.forEach(function(district){
					if(_this.value == district.division_id)
						innerHTML += '<option value="'+district.id+'">'+district.name+'</option>';
				});
			if(district_id)
				district_id.innerHTML = innerHTML;
		});
	}
	if(district_id) {
		district_id.addEventListener('change', function() {
			innerHTML = '<option value="-1">--- Select Upazila ---</option>';
			let _this = this;
			if(typeof upazilas !== 'undefined')
				upazilas.forEach(function(upazila){
					if(_this.value == upazila.district_id)
						innerHTML += '<option value="'+upazila.id+'">'+upazila.name+'</option>';
				});
			if(upazila_id)
				upazila_id.innerHTML = innerHTML;
		});
	}
	if(upazila_id) {
		upazila_id.addEventListener('change', function() {
			innerHTML = '<option value="-1">--- Select Union ---</option>';
			let _this = this;
			if(typeof unions !== 'undefined')
				unions.forEach(function(union){
					if(_this.value == union.upazila_id)
						innerHTML += '<option value="'+union.id+'">'+union.name+'</option>';
				});
			if(union_id)
				union_id.innerHTML = innerHTML;
		});
	}
	if(union_id) {
		union_id.addEventListener('change', function() {
			innerHTML = '<option value="-1">--- Select Region ---</option>';
			let _this = this;
			if(typeof regions !== 'undefined')
				regions.forEach(function(region){
					if(_this.value == region.district_id)
						innerHTML += '<option value="'+region.id+'">'+region.name+'</option>';
				});
			if(region_id)
				region_id.innerHTML = innerHTML;
		});
	}
	if(typeof selected_division !== 'undefined') {
		division_id.querySelector('[value="'+selected_division+'"]').selected = true;
		division_id.dispatchEvent(new Event('change'));
	}
	if(typeof selected_district !== 'undefined') {
		district_id.querySelector('[value="'+selected_district+'"]').selected = true;
		district_id.dispatchEvent(new Event('change'));
	}
	if(typeof selected_upazila !== 'undefined') {
		upazila_id.querySelector('[value="'+selected_upazila+'"]').selected = true;
		upazila_id.dispatchEvent(new Event('change'));
	}
	if(typeof selected_union !== 'undefined') {
		union_id.querySelector('[value="'+selected_union+'"]').selected = true;
		union_id.dispatchEvent(new Event('change'));
	}
})();