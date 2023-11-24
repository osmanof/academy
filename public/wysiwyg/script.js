var richTextEditor = {
  bindEvents: function() {
    this.bindDesignModeToggle();
    this.bindToolbarButtons();
  },

  bindDesignModeToggle: function() {

    $(document.body).on('click', function(e) {
      var $target = $(e.target);

      if ($target.is('body')) {
        document.designMode = 'off';
      }
    });
  },

  bindToolbarButtons: function() {
    $('.wysiwyg__toolbar').on('mousedown', '.icon', function(e) {
      e.preventDefault();
      var btnId = $(e.target).attr('id');
      this.editStyle(btnId);
    }.bind(this));
  },

  editStyle: function(btnId) {
    var value = null;

    if (btnId === 'createLink') {
      if (this.isSelection()) value = prompt('Enter a link:');
    }

    document.execCommand(btnId, true, value);
  },

  isSelection: function() {
    var selection = window.getSelection();
    return selection.anchorOffset !== selection.focusOffset
  },

  init: function() {
    this.bindEvents();
  },
}

richTextEditor.init();
