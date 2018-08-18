(function() {
  tinymce.PluginManager.add('pdj_title_line_mce_button', function(editor, url) {
    editor.addButton('pdj_title_line_mce_button', {
      icon: false,
      text: "Title Line",
      onclick: function() {
        editor.windowManager.open({
          title: "Insert Title text",
          body: [{
            type: 'textbox',
            name: 'titleline',
            label: 'Title',
            value: ''
          }],
          onsubmit: function(e) {
            editor.insertContent(
              '<div class="title-line" style="align-items:center;display:flex;justify-content:center;"><span class="title-content" style="margin-right:7px;">'+e.data.titleline+'</span><span class="line" style="flex:1;text-indent:-999em;background-color:#000;height:1px;">line</span></div>'
            );
          }
        });
      }
    });
  });
})();
