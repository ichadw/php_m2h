
	'use strict';
	
	var TinyMce = {
		init: function(options){
			tinymce.init({
				selector: "textarea.form-control",
				menubar: "format edit table tools",
				plugins: "image table searchreplace code link responsivefilemanager",
				convert_newlines_to_brs: false,
				force_p_newlines: true,
				force_br_newlines : false,
				remove_redundant_brs : true,
				remove_linebreaks : true,
				forced_root_block : "", 
				toolbar: [
					"undo redo | styleselect | bold italic | link image | alignleft | aligncenter | alignright | sizeselect | fontselect | fontsizeselect | responsivefilemanager",
				], 
				font_size_style_values: "12px, 16px, 20px, 24px, 28px, 32px, 36px",
				relative_urls: false,
				filemanager_crossdomain: true,
				filemanager_title:"Responsive Filemanager",
				external_filemanager_path: options.baseUrl + "assets/admin/plugins/filemanager/",
				external_plugins: { "filemanager" : options.baseUrl +  "assets/admin/plugins/filemanager/plugin.min.js"},
				//tab key
				setup: function(ed) {
					ed.on('keydown', function(event) {
						if (event.keyCode == 9){ // tab pressed
							ed.execCommand('mceInsertContent', false, '&emsp;&emsp;'); // inserts tab
							event.preventDefault();
							event.stopPropagation();
							return false;
						}
					});
					
					ed.on('keyup', function(e) {
						//console.debug('Key up event: ' + e.keyCode);
					});
				}
				//tab key
			});
		}
	}