var ConfirmationModal = {
    _Config: {},
    Action: {
        Buttons: {},
        ConfirmationModal: $('.confirmation-modal'),
        ApplyLogic: function (param) {
            if (param.criteria === false) {
                param.button.attr('type', 'button');
            } else {
                param.button.attr('type', 'submit');
            }
        },
        Show: function (param)
        {
            var $footer = this.ConfirmationModal.find('.modal-footer');
            this.ConfirmationModal.find('.modal-body').html(param.message);
            this.ConfirmationModal.find('.confirmation-header').html(param.header);
            $footer.empty().append(this.NoButton(param)).append(this.YesButton(param));
            this.ConfirmationModal.modal('show');
        },
        YesButton: function (param) {
            var $button = $('<input type="button" />');
            $button.attr({'type': 'button', 'class': 'btn ' + param.button.class, 'value': param.button.value});
            $button.click(function () {
                param.button.action();
            });
            return $button;
        },
        NoButton: function (param) {
            var $button = $('<input type="button" />');
            $button.attr({'type': 'button', 'class': 'btn btn-default', 'value': param.button.valueNo, 'data-dismiss': 'modal'});
            return $button;
        }
    }
};
