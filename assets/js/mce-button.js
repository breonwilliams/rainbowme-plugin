(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Shortcodes',
			icon: false,
			type: 'menubutton',
			menu: [




                {
                    text: 'Full Width Sections',
                    menu: [
                        {
                            text: 'Background Video Section',
                            onclick: function() {
                                editor.insertContent('[background_vid poster="" mp4="" padding=""][/background_vid]');
                            }
                        },
                        {
                            text: 'Background Section Color',
                            onclick: function() {
                                editor.insertContent('[color_section bgcolor="" class=""][/color_section]');
                            }
                        },
                        {
                            text: 'Background Section Image',
                            onclick: function() {
                                editor.insertContent('[img_section bgimg="" class="" overlay=""][/img_section]');
                            }
                        },
                        {
                            text: 'Background Parallax Image',
                            onclick: function() {
                                editor.insertContent('[parallax_section bgimg="" class="" overlay=""][/parallax_section]');
                            }
                        }

                    ]
                },

                {
                    text: 'Modal',
                    onclick: function() {
                        editor.insertContent('[boot_modal button="Modal button" title="Modal Title" class="btn btn-primary" target="modal1" closeclass="btn btn-default" modalsize="modal-lg"][/boot_modal]');
                    }
                },

                {
                    text: 'Popup Video',
                    onclick: function() {
                        editor.insertContent('[popup_video class="" url=""][/popup_video]');
                    }
                },

                {
                    text: 'Avatar',
                    onclick: function() {
                                editor.insertContent('[avatar_shortcode]');
                            }
                },

                {
                    text: 'Recent Posts',
                    onclick: function() {
                                editor.insertContent('[recent_videos posts="8" ptype="videos"]');
                            }
                },
                {
                    text: 'Custom Div',
                    onclick: function() {
                        editor.insertContent('[custom_div class=""][/custom_div]');
                    }
                }
				
				
				
			]
		});
	});
})();