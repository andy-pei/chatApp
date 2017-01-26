var mn = require('backbone.marionette');

var templateView = mn.View.extend({
    template: require('../templates/welcome.tpl')
});

var templateV = new templateView();

var mainView = mn.View.extend({
    el: '#test1',
    template: false,
    regions: {
        region1: '#welcomeregion'
    }
});

var mainV = new mainView();

mainV.showChildView('region1', templateV);