define([
    'Magento_Ui/js/form/element/ui-select'
    ], function (Select) {
    'use strict';
    return Select.extend({
        
        setParsed: function (data) {
            var option = this.parseData(data);
            if (data.error) {
                return this;
            }
            this.options([]);
            this.setOption(option);
            this.set('newOption', option);
        },
       
        parseData: function (data) {
            return {
                value: data.category_faq_id.category_id,
                label: data.category_faq_id.name
            };
        }
    });
});