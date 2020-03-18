$(document).ready(function() {
	
});

$(document).on('click', '.toggle-search', function(event) {
	event.preventDefault();
	$(".row-search").toggle('slow/400/fast');
});

$(document).on('click', '.row-content', function(event) {
	event.preventDefault();
	var td1 = $(this).find('th:nth-child(1)');
	var td2 = $(this).find('td:nth-child(2)');
	var td3 = $(this).find('td:nth-child(3)');
	var td4 = $(this).find('td:nth-child(4)');
	var id = $(td1).text();
	var name_event = $(td2).text();
	var content_event = $(td3).text();
	var id_event = $(td4).find('.styled-checkbox').attr('id');
	var event = $(this).data('event');
	var template = "<tr class='row-edit-content' data-event='" + event + "'>"
	+ "<th width='5%'>"
	+ id
	+ "</th>"
	+ "<td width='15%'>"
	+ "<input type='text' class='form-control input-sm input-event' value='"
	+ name_event
	+ "'>"
	+ "</td>"
	+ "<td width='60%'>"
	+ "<input type='text' class='form-control input-sm input-event' value='"
	+ content_event
	+ "'>"
	+ "</td>"
	+ "<td width='5%' class='text-center'>"
	+ "<input class='styled-checkbox' id='"
	+ id_event
	+ "' type='checkbox' value='value1'>"
	+ "<label for='"
	+ id_event
	+ "'></label>"
	+ "</td>"
	+ "<td width='10%'>"
	+ "<i class='fas fa-check btn-save-event'></i>"
	+ "<i class='fas fa-times btn-remove'></i>"
	+ "</td>"
	+ "</tr>";

	$(template).insertBefore($(this));
	$(this).attr('hidden', 'true');
});

$(document).on('click', '.btn-remove', function(event) {
	event.preventDefault();
	$(this).parent('td').parent('.row-edit-content').next('.row-content').removeAttr('hidden');
	$(this).parent('td').parent('.row-edit-content').remove();
});

$(document).on('click', '.td-checkbox, i.fas.fa-trash-alt', function(event) {
	event.stopPropagation();
});

$(document).on('change', '.event-checkbox', function(event) {
	var number = $(".event-checkbox:checked").length;
	var number_list_checkbox = $('.event-checkbox').length;
	if (number > 0) {
		$(".btn-delete-events").removeAttr('disabled');
	} else {
		$(".btn-delete-events").attr('disabled', true);
	}
	if (number < number_list_checkbox) {
		$(".checkbox-all").prop('checked', false);
	} else {
		$(".checkbox-all").prop('checked', true);
	}
});

$(document).on('change', '.checkbox-all', function(event) {
	event.preventDefault();
	var list_checkbox = $(".event-checkbox");
	var number_list_checkbox = $(list_checkbox).length;
	var number_list_checked = $(".event-checkbox:checked").length;
	if (number_list_checked == number_list_checkbox) {
		$(".event-checkbox").prop('checked', false);
		$(".btn-delete-events").attr('disabled', true);
	} else {
		$(".event-checkbox").prop("checked", true);
		$(".btn-delete-events").removeAttr('disabled');
	}
});

$(document).on('click', '.btn-delete-events', function(event) {
	var list_checked = $(".event-checkbox:checked");
	var number_list_event = $(".event-checkbox").length;
	var number_list_checked = $(list_checked).length;
	if (number_list_checked > 1) {
		var title = 'Bạn có thực sự muốn xoá các sự kiện trên không?';
	} else {
		var title = 'Bạn có thực sự muốn xoá sự kiện trên không?';
	}
	var arr_event_id = [];
	var template = "<ul>";
	$(list_checked).toArray().forEach(function(item, index){
		var event = $(item).parent('.td-checkbox').parent('.row-content');
		var name_event = $(event).find('td:nth-child(2)').text();
		var content_event = $(event).find('td:nth-child(3)').text();
		template += "<li> <span>" + name_event + "</span> - <i>" + content_event + "</i></li>";
		var event_id = $(event).data('event');
		arr_event_id.push(event_id);
	});
	template += "</ul>";
	alertify.confirm(title, template,
		function(){
			$.ajax({
				url: '/delete-many-event',
				type: 'POST',
				dataType: 'json',
				data: {
					arr_event_id: arr_event_id
				},
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				success: function(res){
					if (res.status) {
						if (number_list_checked < number_list_event) {
							$(list_checked).toArray().forEach(function(item, index){
								$(item).parent('.td-checkbox').parent('.row-content').remove();
							});
							alertify.success(res.message);
						} else {
							alertify.success(res.message);
							setTimeout(function(){ window.location = 'list-event'; }, 1500);
						}
					} else {
						alertify.error(res.message);
					}
				}
			})
		},
		function(){
			alertify.error('Cancel');
		}
	).set('labels', {ok:'OK'});
});

$(document).on('click', '.fa-delete-event', function(event) {
	var this_event = $(this).parent('td').parent('.row-content');
	var id_event = $(this_event).data('event');
	var name_event = $(this_event).find('td:nth-child(2)').text();
	var content_event = $(this_event).find('td:nth-child(3)').text();
	var title = 'Bạn có thực sự muốn xoá sự kiện trên không?';
	var template = "<span>" + name_event + "</span> - <i>" + content_event +"</i>";
	alertify.confirm(title, template,
		function(){
			$.ajax({
				url: '/delete-event',
				type: 'POST',
				dataType: 'json',
				data: {
					id_event: id_event
				},
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				success: function(res){
					if (res.status) {
						$(this_event).remove();
						alertify.success(res.message);
					} else {
						alertify.error(res.message);
					}
				}
			})
		},
		function(){
			alertify.error('Cancel');
		});
});

$(document).on('click', '.pagination a', function(event){
	event.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	var content = $(".search-event-content").val();
	var name = $(".search-event-name").val();
	search_events(page, content, name);
});

$(document).on('click', '.btn-save-event', function(e) {
	var event_edit = $(this).parent('td').parent('.row-edit-content');
	updateEvent(event_edit);
});

$(document).on('keyup', '.input-event', function(event) {
	if (event.keyCode == 13) {
		var event_edit = $(this).parent('td').parent('.row-edit-content');
		updateEvent(event_edit);
	}
});

function updateEvent(event_edit){
	var event = $(event_edit).next('.row-content');
	var id_event = $(event_edit).data('event');
	var name_event_new = $(event_edit).find('td:nth-child(2)').children('input').val();
	var content_event_new = $(event_edit).find('td:nth-child(3)').children('input').val();

	$.ajax({
		url: '/update-event',
		type: 'POST',
		dataType: 'json',
		data: {
			id_event: id_event,
			name: name_event_new,
			content: content_event_new
		},
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success: function(res){
			if (res.status) {
				alertify.success(res.message);
				$(event).find('td:nth-child(2)').text(name_event_new);
				$(event).find('td:nth-child(3)').text(content_event_new);
			} else {
				alertify.error(res.message);
			}
			$(event).removeAttr('hidden');
			$(event_edit).remove();
		}
	});
}

function search_events(page, content, name)
{
	$.ajax({
		url:"/list-event/search-event?page="+page+"&content="+content+"&name="+name,
		success:function(data)
		{
			$('.table-event').html(data);
		}
	})
}

$(document).on('keyup', '.search-event-name, .search-event-content', function(){
	if (event.keyCode == 13) {
		var content = $(".search-event-content").val();
		var name = $(".search-event-name").val();
		var page = 1;
		search_events(page, content, name);
	}
});

$(document).on('click', '.btn-add-event', function(event) {
	var template = "<form class='form-control-line'>"
		+ "<div class='alert alert-danger'>"
		+ "<h6 class='alert-heading'>Chú ý!</h6><hr>"
		+ "<span><i class='fas fa-ban mr-1'></i>Các tên sự kiện không được trùng nhau</span><br>"
		+ "<span><i class='fas fa-ban mr-1'></i>Sự kiện tích cực phải đặt tên bắt đầu bằng chữ cái 'b'</span><br>"
		+ "<span><i class='fas fa-ban mr-1'></i>Sự kiện tiêu cực phải đặt tên bắt đầu bằng chữ cái 'c'</span>"
		+ "</div>"
		+ "<div class='position-relative form-group'>"
		+ "<h5 class='card-title'>Name</h5>"
		+ "<input name='name' placeholder='Tên sự kiện' type='text' class='form-control input-name' autocomplete='off'>"
		+ "</div>"
		+ "<div class='position-relative form-group'>"
		+ "<h5 class='card-title'>Content</h5>"
		+ "<textarea class='form-control input-content' rows='5' placeholder='Nội dung sự kiện' autocomplete='off'></textarea>"
		+ "</div>"
		+ "</form>";
	var title = "Thêm sự kiện mới";
	alertify.confirm(title, template,
		function(){
			var self = this;
			var name = $(".input-name").val();
			var content = $(".input-content").val();
			if (name == '') {
				$('.input-name').addClass('form-control-warning');
				$(".input-name").parent('.position-relative').addClass('has-warning');
				$("<div class='form-control-feedback'>Trường này là bắt buộc!!</div>").insertAfter('.input-name');
			}
			if (content == '') {
				$('.input-content').addClass('form-control-warning');
				$(".input-content").parent('.position-relative').addClass('has-warning');
				$("<div class='form-control-feedback'>Trường này là bắt buộc!!</div>").insertAfter('.input-content');
			}
			if (name != '' && content != '') {
				$.ajax({
					url: '/create-event',
					type: 'POST',
					dataType: 'json',
					data: {
						name: name,
						content: content
					},
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					success: function(res){
						if (res.status) {
							alertify.success(res.message);
							setTimeout(function(){ window.location = 'list-event'; }, 1500);
						} else {
							self.set({ onclosing:function(){ return false; }});
							if (res.error) {
								$('.input-name').removeClass('form-control-warning');
								$('.input-content').removeClass('form-control-warning');
								$('.input-name').addClass('form-control-danger');
								$(".input-name").parent('.position-relative').removeClass('has-warning');
								$(".input-content").parent('.position-relative').removeClass('has-warning');
								$(".input-name").parent('.position-relative').addClass('has-danger');
								$("<div class='form-control-feedback'>Sự kiện này đã tồn tại!!</div>").insertAfter('.input-name');
							} else {
								$('.input-name').focus();
								alertify.confirm('Thêm sự kiện thất bại!!! Trang sẽ được tải lại sau 5s', function(){
									window.location = 'list-event';
								}).autoOk(5).set('labels', {ok:'OK'});
							}
						}
					}
				})
			}
		},
		function(){
			alertify.error('Cancel');
		}
	).set('labels', {ok:'Thêm'});
});