var NiceModal = {
    Action: {
        Show: function () {
           $('.nice-modal').modal('show')
        }
    }
};

$(document).ready(function () {
    NiceModal.Action.Show();
});