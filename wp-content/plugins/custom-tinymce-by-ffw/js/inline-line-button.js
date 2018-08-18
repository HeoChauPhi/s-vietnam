(function() {
  tinymce.PluginManager.add('pdj_inline_line_mce_button', function(editor, url) {
    editor.addButton('pdj_inline_line_mce_button', {
      icon: false,
      text: "Inline Line",
      onclick: function() {
        editor.windowManager.open({
          title: "Insert Line",
          body: [
          {
            type   : 'listbox',
            name   : 'line_type',
            label  : 'Type',
            values : [
              { text: 'Horizontal', value: 'horizontal', selected: true },
              { text: 'Vertical', value: 'vertical' }
            ]
          },{
            type: 'textbox',
            name: 'line_width',
            label: 'Width',
            value: ''
          },
          {
            type: 'textbox',
            name: 'line_height',
            label: 'Height',
            value: ''
          },
          {
            type   : 'colorbox',
            name   : 'line_color',
            label  : 'Color',
            onaction: createColorPickAction(),
          }],
          onsubmit: function(e) {
            
              if (e.data.line_type == 'vertical') {
                editor.insertContent(
                  '<div class="inline-line inline-line-vertical" style="margin-left: 30px; display: inline-block; float: left; clear: both; width: '+e.data.line_width+'; height: '+e.data.line_height+'; background-color: '+e.data.line_color+'"></div>'
                );
              } else {
                editor.insertContent(
                  '<div class="inline-line inline-line-horizontal" style="display: block; clear: both; width: '+e.data.line_width+'; height: '+e.data.line_height+'; background-color: '+e.data.line_color+'"></div>'
                );
              }
            //$('.inline-line').parent().css({'position': 'reative'});
          }
        });
      }
    });
  });

  var editor = tinymce.activeEditor;
  function createColorPickAction() {
    var colorPickerCallback = editor.settings.color_picker_callback;

    if (colorPickerCallback) {
      return function() {
        var self = this;

        colorPickerCallback.call(
          editor,
          function(value) {
            self.value(value).fire('change');
          },
          self.value()
        );
      };
    }
  }
})();
