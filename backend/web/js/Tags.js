!$(function () {
    /**
     * @constructor
     */
    function PerformanceReviewPoint() {
        this.$modal = $('#modal_regulatory_hours_form');
        this.$gridPjax = $('#regulatory_hours_grid_pjax');
        this.$formPjax = $('#regulatory_hours_form_pjax');
    }

    /**
     * events
     */
    PerformanceReviewPoint.prototype.addEventListener = function () {
        var self = this;

        this.$gridPjax.on('click', function (event) {
            var _target = $(event.target).parent();

            /*if(_target.hasClass('update') || _target.hasClass('fa-pencil')) {
                $.pjax.reload({
                    push: false,
                    replace: false,
                    url: _target.attr('href'),
                    container: self.$formPjax,
                    timeout: 7000
                });
                self.$modal.modal('show');
                return false;
            }*/

            if($(event.target).hasClass('create')) {
                console.log('hello');
                $.pjax.reload({
                    push: false,
                    replace: false,
                    url: $(event.target).attr('link'),
                    container: '#regulatory_hours_form_pjax',
                    timeout: 7000
                });
                self.$modal.modal('show');
                return false;
            }

            if(_target.hasClass('delete')) {
                if(confirm('Are you sure you want to delete selected items?')){
                    $.pjax.reload({
                     method: 'post',
                     push: false,
                     replace: false,
                     url: _target.attr('href'),
                     container: self.$gridPjax,
                     timeout: 7000
                     });
                }
                return false;
            }
        });

        this.$formPjax.on('pjax:start', function (event, xhr, textStatus, options) {
            $('.loading_form').css({
                visibility: 'visible'
            });
            return false;
        });

        this.$formPjax.on('pjax:end', function (event, xhr, textStatus, options) {
            $('.loading_form').css({
                visibility: 'hidden'
            });
            if(textStatus.type.toLowerCase() == 'post') {
                self.$modal.modal('hide');
                $.pjax.reload({
                    container: '#regulatory_hours_grid_pjax',
                    timeout: 7000
                });
            }
            return false;
        });

        this.$gridPjax.on('pjax:start', function (event, xhr, textStatus, options) {
            $('.loading_grid').css({
                visibility: 'visible'
            });
            return false;
        });

        this.$gridPjax.on('pjax:end', function (event, xhr, textStatus, options) {
            $('.loading_grid').css({
                visibility: 'hidden'
            });
            return false;
        });
    };

    /**
     * start script
     */
    PerformanceReviewPoint.prototype.init = function () {
        /**
         * event
         */
        this.addEventListener();
    };

    (new PerformanceReviewPoint).init();
});