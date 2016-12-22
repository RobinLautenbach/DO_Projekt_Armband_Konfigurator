var bConfigurator = (function($){
	var bc = {};
	var baseURI = 'http://localhost:8080/BraceletConfiguratorRestfulService/resources/bracelets';
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
						console.log(textStatus + ': ' + errorThrown);
					},
					complete: function(resp){
						removeLoadingDiv();
						console.log("Bracelets in DB:" + resp.getResponseHeader('braceletsInDB'));
						listBracelets(resp.responseXML);
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
			complete: function(resp){
				console.log("Bracelets in DB:" + resp.getResponseHeader('braceletsInDB'));
				listBracelets(resp.responseXML);
			}
		});		
	};
	bc.getAllBracelets = function(){
		$.ajax({
			type: 'GET',
			url: baseURI,
			complete: function(resp){
				console.log("Bracelets in DB:" + resp.getResponseHeader('braceletsInDB'));
				listBracelets(resp.responseXML);
			}
		});		
	};
	bc.addBracelet = function(id){
		console.log('Add Bracelet with ID: ' + id);
	};
	bc.deleteBracelet = function(id){
		console.log('Delete Bracelet with ID: ' + id);
	};
	function addPagination(items){
		var show_per_page = 10;
		var number_of_items = items.length;
		var number_of_pages = Math.ceil(number_of_items/show_per_page);
		return number_of_pages;
		/*Coming Soon*/
	}
	function template(){
		/*Coming Soon*/
	}
	function listBracelets(xml){
		var $xml = $(xml);
		var bracelets = $xml.find('bracelet');
		console.log('Number of Pages: ' + addPagination(bracelets));
		$.each(bracelets, function(i,b){console.log(b);});
		
	}
	function setLoadingDiv(){
		$('#data-container').append('<div id="loadingDiv"><span>Loading Data...</span></div>');
	}
	function removeLoadingDiv(){
		$('#loadingDiv').remove();
	}
	return bc;	
})(jQuery);
