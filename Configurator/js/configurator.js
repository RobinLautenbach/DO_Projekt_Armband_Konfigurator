var bConfigurator = (function($){
	var bc = {};
	var baseURI = 'http://localhost:8080/BraceletConfiguratorRestfulService/resources/bracelets';
	var pagination_set = false;
	var show_per_page = 10;
	bc.getBraceletsPaginated = function(start, size){
			if(start >= 0 && size >= 0){
				$.ajax({
					type: 'GET',
					url: baseURI + '?start=' + start + '&size=' + size,
					beforeSend: function(xhr, options){
						setLoadingDiv();
					},
					error: function(xhr, textStatus, errorThrown){
						removeLoadingDiv();
						if(xhr.getResponseHeader('braceletsInDB') == null || xhr.getResponseHeader('braceletsInDB') == 0){
							setNoDataDiv();
						}
						console.log(textStatus + ': ' + errorThrown);
					},
					success: function(data, status, xhr){
						removeLoadingDiv();
						if(xhr.getResponseHeader('braceletsInDB') == null || xhr.getResponseHeader('braceletsInDB') == 0){
							setNoDataDiv();
						}else
						{
							listBracelets(xhr.responseXML, xhr.getResponseHeader('braceletsInDB'));
						}
					}
				});
			}
	};
	bc.getBracelet = function(id){
		$.ajax({
			type: 'GET',
			url: baseURI + '/' + id,
			error: function(xhr, textStatus, errorThrown){
				removeLoadingDiv();
				console.log(textStatus + ': ' + errorThrown);
			},
			success: function(data, status, xhr){
				console.log("Bracelets in DB:" + xhr.getResponseHeader('braceletsInDB'));
				listBracelets(xhr.responseXML);
			}
		});		
	};
	bc.getAllBracelets = function(){
		$.ajax({
			type: 'GET',
			url: baseURI,
			success: function(data, status, xhr){
				console.log("Bracelets in DB:" + xhr.getResponseHeader('braceletsInDB'));
				listBracelets(xhr.responseXML);
			}
		});		
	};
	bc.editBracelet = function(id){
		$.ajax({
					type: 'GET',
					url: baseURI + '/' + id,
					contentType: 'application/xml',
					error: function(xhr, textStatus, errorThrown){
						console.log(textStatus + ': ' + errorThrown);
					},
					success: function(data, status, xhr){
						window.location.href = '../../frontend/index.php?braceletToEdit=' + xhr.responseXML.toString();
					}
				});
	};
	bc.deleteBracelet = function(id){
		$.ajax({
			type: 'DELETE',
			url: baseURI + '/' + id,
			contentType: 'application/xml',
			error: function(xhr, textStatus, errorThrown){
				console.log(textStatus + ': ' + errorThrown);
			},
			success: function(data, status, xhr){
				var current_page = parseInt($('#current_page').val());
				var start;
				if($('#data-container > table > tbody tr').length == 2 && current_page != 1){
					pagination_set = false;
					current_page-=1;
					$('#current_page').val(current_page);
				}
				start = (current_page == 1) ? 0 : (current_page - 1) * show_per_page;
				bc.getBraceletsPaginated(start, show_per_page);
			}
		});		
	};
	bc.addPagination = function(items, itemsInDB){
		var number_of_pages = Math.ceil(itemsInDB/show_per_page);
		var current_page;
		$('#current_page').length == 0 ? current_page = 1 : current_page = parseInt($('#current_page').val());
		var html = '<ul>';
		html += '<li><a href="javascript:bConfigurator.prev();" id="prev_link">&lt;&lt;</a></li>';
		for(var i=1;i<=number_of_pages;i++){
			html += '<li class="pagination_page_li"><a href="javascript:bConfigurator.goToPage(' + i + ');" longdesc="' + i + '">' + i + '</a></li>';
		}
		html += '<li><a href="javascript:bConfigurator.next();" id="next_link">&gt;&gt;</a></li>';
		html += '</ul><input type="hidden" id="current_page" /><input type="hidden" id="show_per_page" />';
		$('#pagination-container').html(html);
		$('#current_page').val(current_page);
		$('#show_per_page').val(show_per_page);
		current_page == 1 ? $('#pagination-container .pagination_page_li:first').addClass('active_page') : $('#pagination-container li:nth-child(' + (current_page + 1) + ')').addClass('active_page');		
		pagination_set = true;
	}
	bc.prev = function(){
		var new_page = parseInt($('#current_page').val()) - 1;
		if($('.active_page').prev('li.pagination_page_li').length == true) bc.goToPage(new_page);
	}
	bc.next = function(){	
		var new_page = parseInt($('#current_page').val()) + 1;
		if($('.active_page').next('li.pagination_page_li').length == true) bc.goToPage(new_page);
	}
	bc.goToPage = function(page){
		var start = (page == 1) ? 0 : (page - 1) * show_per_page;
		$('#pagination-container ul li.active_page').removeClass('active_page');
		$('.pagination_page_li a[longdesc=' + page + ']').parent('li').addClass('active_page');
		$('#current_page').val(page);
		bc.getBraceletsPaginated(start, show_per_page);
	}
	function template(item){
		var html = '<tr>';
				html += '<td>' + $(item).attr('id') + '</td>';
				html += '<td>' + $(item).attr('name') + '</td>';
				html += '<td>' + $(item).attr('size') + '</td>';
				html += '<td>' + $(item).attr('model') + '</td>';
				html += '<td>' + $(item).attr('created') + '</td>';
				html += '<td><a href="javascript:bConfigurator.editBracelet('+ $(item).attr('id') +');">Edit</a> | <a href="javascript:bConfigurator.deleteBracelet('+ $(item).attr('id') +');">Delete</a></td>';
			html += '</tr>';
		return html;
	}
	function listBracelets(xml, braceletsInDB){
		var $xml = $(xml);
		var bracelets = $xml.find('bracelet');
		if(!pagination_set) bc.addPagination(bracelets, braceletsInDB);
		var html = '<table>';
				html += '<tr>';
					html += '<th>#ID</th>';
					html += '<th>Name</th>';
					html += '<th>Size</th>';
					html += '<th>Model</th>';
					html += '<th>Created</th>';
					html += '<th></th>';
				html += '</tr>';
		$.each(bracelets, function(i,b){
			html += template(b);
		});
		html += '</table>';
		document.getElementById('data-container').innerHTML = html;
	}
	function setLoadingDiv(){
		$('#data-container').append('<div id="loadingDiv"><span>Loading Data...</span></div>');
	}
	function removeLoadingDiv(){
		$('#loadingDiv').remove();
	}
	function setNoDataDiv(){
		$('#bracelets').empty();
		$('#bracelets').append('<div id="noDataDiv"><span>No Bracelets in DB.</span></div>');
	}
	return bc;	
})(jQuery);
