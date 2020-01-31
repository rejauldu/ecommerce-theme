/*Number input should take only number. mozilla fix */
(function() {
	var selectors = document.querySelectorAll('input[type="number"]');
	for (i = 0; i < selectors.length; i++) {
		setInputFilter(selectors[i], function(value) {
			return /^\d*\.?\d*$/.test(value); /* Allow digits and '.' only, using a RegExp */
		});
	}
})();
/* Restricts input for the given textbox to the given inputFilter function. */
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}
/* Ajax uploader */
// this is the id of the form
$(".ajax-upload").submit(function(event){
	event.preventDefault();
	event.stopPropagation();
	var form = $(this);
	if(form.find('.list'))
		form.find('.list').fadeIn(100).css("width","0px");
    var data = new FormData();
	var fields = form.serializeArray();
	$.each(fields, function(i, field) {
        data.append(field.name, field.value);
    });
	$.each(form.find('[type="file"]'), function(i, file_field) {
		data.append(file_field.getAttribute("name"), file_field.files[0]);/* 0=>Only first file; For multiple remove index */
	});
	var url = form.attr('action');
    $.ajax({
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        xhr: function() {
		var xhr = new window.XMLHttpRequest();
		/* Upload progress*/
		xhr.upload.addEventListener("progress", function(evt){
			if (evt.lengthComputable) {
				var percentComplete = evt.loaded / evt.total;
				/* Do something with upload progress */
				if(form.find('.list')) {
					form.find('.list').fadeIn(100).css({"width":100*percentComplete+'%',
					"text-align":"center",
					"color":"#000"
					}).html(Math.floor(100*percentComplete)+'%');
				}
			}
		}, false);
		/* Download progress */
		xhr.addEventListener("progress", function(evt){
			if (evt.lengthComputable) {
				var percentComplete = evt.loaded / evt.total;
				/* Do something with download progress */
			}
		}, false);
		return xhr;
		},
        success: function(data2){
            if(form.find('.list')) {
				form.find('.list').css({
					"width":"100%"
				}).html("Upload Complete!");
			}
			$('#success-modal').modal('show');
		},
		error: function(data2) {
			$('#error-modal').modal('show');
		}
	});
    return false;
});
/* Display photo after selecting */
function displayPhotoOnSelect(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#display-photo-on-select').attr('src', e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
/* Form validation of the form with .needs-validation */
(function() {
	'use strict';
	window.addEventListener('load', function() {
		var forms = document.getElementsByClassName('needs-validation');
		Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				/* was-validated is a bootstrap class */
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
})();
/* View port height matching */
(function() {
	var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
	var vp_h_55_md = document.querySelector('.vp-h-55-md');
	if(w>768 && vp_h_55_md)
		vp_h_55_md.style.height = (h-55)+'px';
})();
/* Fancy Tabs starts */
(function() {
	var classname = document.querySelectorAll(".fancy-tab li");
	for (var i = 0; i < classname.length; i++) {
		classname[i].style.width = 100/classname.length+'%';
	}
	var myFunction = function(e) {
		document.querySelector('.fancy-tab li.active').classList.remove('active');
		e.currentTarget.classList.add('active');
	};

	for (var i = 0; i < classname.length; i++) {
		classname[i].addEventListener('click', myFunction, true);
	}
})();
/* Fancy Tabs ends */
/* Location control */
(function() {
	locationHandle('division', 'district', 'upazila', 'union', 'region');
	locationHandle('billing-division', 'billing-district', 'billing-upazila', 'billing-union', 'billing-region');
	locationHandle('shipping-division', 'shipping-district', 'shipping-upazila', 'shipping-union', 'shipping-region');
})();
function locationHandle(division, district, upazila, union, region) {
	var division_el = document.getElementById(division);
	var district_el = document.getElementById(district);
	var upazila_el = document.getElementById(upazila);
	var union_el = document.getElementById(union);
	var region_el = document.getElementById(region);
	if(division_el && district_el)
	division_el.addEventListener('change', function() {
		locationAjaxCall(division_el, district_el);
	});
	if(district_el && upazila_el)
	district_el.addEventListener('change', function() {
		locationAjaxCall(district_el, upazila_el);
	});
	if(division_el && region_el)
	division_el.addEventListener('change', function() {
		locationAjaxCall(division_el, region_el);
	});
	if(upazila_el && union_el)
	upazila_el.addEventListener('change', function() {
		locationAjaxCall(upazila_el, union_el);
	});
	if(union_el && region_el)
	union_el.addEventListener('change', function() {
		locationAjaxCall(union_el, region_el);
	});
}
function locationAjaxCall(item, child) {
	var base_url = $("meta[name=base-url]")[0].content;
	var id = item.id;
	id = id.replace("billing-", "");
	id = id.replace("shipping-", "");
	var c_id = child.id;
	c_id = c_id.replace("billing-", "");
	c_id = c_id.replace("shipping-", "");
	$.ajax({
		url: base_url+'/'+id+'s/'+item.value,
		success: function(result) {
			var options = result[0][c_id+'s'];
			var html = '<option value="0">--Select '+c_id+'--</option>';
			options.forEach(function(entry) {
				html += '<option value="'+entry.id+'">'+entry.name+'</option>';
			});
			child.innerHTML = html;
		}
	});
}